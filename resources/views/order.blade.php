@extends('layout')

@section('contents')
    <?php $user = Auth::user() ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>MY ORDER</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-1">Date</div>
                    <div class="col-xs-1">ID</div>
                    <div class="col-xs-1">Name</div>
                    <div class="col-xs-2">Email</div>
                    <div class="col-xs-2">Address</div>
                    <div class="col-xs-1">No. Of Products</div>
                    <div class="col-xs-1">Total</div>
                </div>
            </div>
        </div>

        @foreach($orders as $orderkey => $ordervalue)
            <div class="row">
            <?php $date = getdate(date(strtotime($ordervalue['created_at']))) ?>
                <div class="col-xs-1 white-space">{{ $date['mday'].'-'.$date['month'].'-'.$date['year'] }}</div>
                <div class="col-xs-1 white-space">{{ $ordervalue['id'] }}</div>
                <div class="col-xs-1 white-space">{{ $user['name'] }}</div>
                <div class="col-xs-2 white-space">{{ $ordervalue['email'] }}</div>
                <div class="col-xs-2 white-space">{{ $ordervalue['address'] }}</div>
                <div class="col-xs-1 white-space">{{ $quantity }}</div>
                <div class="col-xs-1 white-space">{{ $ordervalue['total'] }}</div>
                <div class="col-xs-1 white-space"><a class="btn btn-default btn-xs" role="button" href="{{ route('shopping.order_details',$ordervalue['id']) }}">View Details</a></div>
            </div>
        @endforeach

    </div>

@endsection