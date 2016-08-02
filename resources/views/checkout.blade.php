@extends('layout')

@section('contents')
    <?php $authuser1 = Auth::user(); ?>
    {{--{{dd($user->toArray())}}--}}
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h1>Kindly Check Your Deatils</h1>
                <form method="post" action="{{ route('shopping.order_place') }}">
                    {{ csrf_field() }}
                    <fieldset class="form-group">
                        <label for="Email1">Name</label>
                        <input type="text" class="form-control" name="name" id="Name1" value="{{$user[0]['name']}}">
                        {{--<small class="text-muted">We'll never share your email with anyone else.</small>--}}
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="Email1">Email</label>
                        <input type="email" class="form-control" name="email" id="Email1" value="{{$user[0]['email']}}">
                        <small class="text-muted">We'll never share your email with anyone else.</small>
                    </fieldset>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="exampleSelect2">Mobile</label>
                        <input type="number" class="form-control" name="mobile" id="Phone1" value="{{$user[0]['mobile']}}">

                    </fieldset>
                    <fieldset class="form-group">
                        <label for="exampleSelect2">Date</label>
                        <input type="date" class="form-control" name="dob" id="Date1" value="{{$user[0]['DOB']}}">

                    </fieldset>
                    <fieldset class="form-group">
                        <label for="exampleTextarea">Address</label>
                        <textarea class="form-control" id="Address1" name="address" rows="3">{{$user[0]['address']}}</textarea>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="File">Zip Code</label>
                        <input type="number" class="form-control" name="zipcode" value="{{$user[0]['zipcode']}}" id="Zip1">
                    </fieldset>
                    <input type="hidden" name="total" value="{{ $total }}">
                    <input type="hidden" name="user_id" value="{{ $authuser1['id'] }}">
                    <fieldset class="form-group">
                        <label for="File">City</label>
                        <input type="text" class="form-control" name="city" value="{{$user[0]['city']}}" id="City1">
                    </fieldset>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-default">Cancel</button>
                </form>
            </div>

    </div>
    </div>
@endsection