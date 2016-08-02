@extends('layout')

@section('contents')
    <div class="container">
            <div id="products" class="row list-group">
            @foreach($products as $productvalue)
                    <div class="item  col-xs-4 col-lg-4">
                        <div class="thumbnail">
                            <a href="{{ route('shopping.product',$productvalue['id'])}}"><img  class="product_image" src={{$_ENV["IMAGE_PATH"].$productvalue['image']}} alt={{$productvalue['image']}}></a>
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
            <!-- Button trigger modal -->

                <!-- Modal -->
                <div class="modal fade" id="notlogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Not Login</h4>
                            </div>
                            <div class="modal-body">
                                You Didn't Login!!!!
                                <br>
                                Please Login...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" id="#login" class="btn btn-primary cart-login">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection