@extends('layout')

@section('contents')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php $user = Auth::user(); ?>
                <h1>{{ $user['name'] }}'s Cart</h1>
            </div>
        </div>
        <div class="row padding-top">
            <div class="col-sm-3">
                Product Image
            </div>
            <div class="col-sm-3">
                ITEM
            </div>
            <div class="col-sm-1">
                Quantity
            </div>
            <div class="col-sm-1">
                Price
            </div>
            <div class="col-sm-3">
                SubTotal
            </div>
        </div>
        <?php $total=0;?>
        @foreach($order_details as $cartkey => $cartvalue)
            @if($cartvalue['user_id']==$user['id'])
                @foreach($cartvalue['products'] as $child)
                    <div class="row padding-top">
                        <div class="col-sm-3">
                            <img class="cart_image" src={{$_ENV["IMAGE_PATH"].$child['image']}}>
                        </div>
                        <div class="col-sm-3">
                            {{ $child['name'] }}
                            <br>
                            {{$child['description']}}
                        </div>
                        <div class="col-sm-1 ">
                            <div class="quantity_value">
                                <input  class="form-control quantity" type="text" name="quantity" disabled value="{{ $cartvalue['quantity']}}">
                                {{--<a href="" class="update_quantity" quantity="{{ $cartvalue['quantity']}}" cart_id="{{$cartvalue['id']}}">Save</a>--}}
                            </div>
                        </div>
                        <div class="col-sm-1">
                            {{$child['price']}}
                        </div>
                        <div class="col-sm-2" id="subtotal">
                            <?php $price = $child['price'] * $cartvalue['quantity'] ?>
                            {{ $price }}
                            <?php  $total = $total + $price ?>
                        </div>
                    </div>
                @endforeach
            @endif
        @endforeach
        <div class="row padding-top" >
            <div class="col-md-8">
                <p align="center"><b>TOTAL</b></p>
            </div>
            <div class="col-md-3">
                {{ $total }}
            </div>
        </div>
        <br>
    </div>

@endsection