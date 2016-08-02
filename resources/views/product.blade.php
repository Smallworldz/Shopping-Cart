@extends('layout')

@section('contents')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img  class="product_image" src={{$_ENV["IMAGE_PATH"].$products['image']}} alt={{$products['image']}}>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <h1>{{ $products['name'] }}</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3><b>Description: </b>  {{ $products['description'] }}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3><b>Manufacturer: </b>  {{ $products['manufacturer'] }}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3><b>Price: </b>    {{ $products['price'] }}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @if(Auth::check())
                            <p><a class="btn btn-primary" id="addtocart" role="button" product-id="{{ $products['id'] }}" price="{{ $products['price'] }}" href="">Add To Cart</a></p>
                        @else
                            <a href="" data-toggle="modal" data-target="#notlogin" class="btn btn-primary" role="button">Add To Cart</a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection