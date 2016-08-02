@extends('layout')

@section('contents')
    <div class="container">
        <div class="row">
            <div class="well well-sm col-md-2 col-md-offset-9">
                <strong>Display</strong>
                <div class="btn-group">
                    <a href="#" id="list" class="btn btn-default btn-sm">
            List</a>
                    <a href="#" id="grid" class="btn btn-default btn-sm">Grid</a>
                </div>
            </div>
        </div>
            <div id="products" class="row list-group">
                @foreach($product as $productkey => $productvalue)
                    <div class="item  col-xs-4 col-lg-4">

                        <div class="thumbnail">
                            <div class="row">
                                <div class="col-md-11">
                                    <a href="{{ route('shopping.product',$productvalue['id'])}}"><img  id="product_image" src="{{$_ENV["IMAGE_PATH"].$productvalue['image']}}" alt={{$productvalue['image']}}></a>
                                </div>
                                @if(Auth::check() AND $productvalue['carts']['order_id']==0)
                                <div class="col-md-1 no-margin color-code">
                                    <span class="text-right"><b>{{ $productvalue['carts']['quantity'] }}</b></span>
                                </div>
                                @endif
                            </div>
                            <div class="caption">
                                <h4 class="group inner list-group-item-heading">
                                    {{ $productvalue['name'] }}</h4>
                                <p class="group inner list-group-item-text">
                                    {{ $productvalue['description'] }}</p>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <p class="lead">
                                            Price: Rs {{ $productvalue['price'] }}</p>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        @if(Auth::check())
                                            <p><a class="btn btn-primary" id="addtocart" role="button" product-id="{{ $productvalue['id'] }}" price="{{ $productvalue['price'] }}" href="">Add To Cart</a></p>
                                        @else
                                            <a href="" data-toggle="modal" data-target="#notlogin" class="btn btn-primary" role="button">Add To Cart</a>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
                <script type="text/javascript">
                    $(document).ready(function () {
                        var digit = 5;
                        var offset =6;
                        $(window).on("scroll", page_bottom_reach);
                        function page_bottom_reach () {
                            if ($(window).scrollTop() + $(window).height() == $(document).height()) {
                                $(this).off('scroll',page_bottom_reach);
                                console.log(digit+offset);
                                $.ajax({
                                    url: '/fetch_data',
                                    method: 'get',
                                    dataType: 'json',
                                    data: {quantity: digit,offset:offset},
                                    success: function (data) {
                                        $.each(data, function (index, element) {
                                            console.log(element['name']);
                                            var details = "<div class='item col-xs-4 col-lg-4'><div class='thumbnail'><div class='row'><div class='col-md-11'>" +
                                                    "<a href={{ route('shopping.product',"+element['id']+")}}><img  id='product_image'" +
                                                    "src='\\images\\" + element['image'] + "' alt={{"+element['image']+"}}></a></div></div> <div class='caption'>" +
                                                    "<h4 class='group inner list-group-item-heading'>" + element['name'] +
                                                    "</h4><p class='group inner list-group-item-text'>" + element['description'] + "</p><p class='lead'> " + element['price'] +
                                                    "</p></div><div class='col-xs-12 col-md-6'><p><a class='btn btn-primary' id='addtocart' role='button' product-id='"+element['id']+"' price='"+ element['price']+"' href=''>Add To Cart</a></p>";
                                            $(".list-group").append(details);
                                        });
                                        offset+=5;
                                        $(window).on('scroll',page_bottom_reach);
                                    },
                                    error: function () {
                                        console.log("Error");
                                    }
                                });

                            }
                        }
                    });
                </script>
            </div>
</div>

@endsection
