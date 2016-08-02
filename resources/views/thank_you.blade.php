@extends('layout')

@section('contents')
<?php $user = Auth::user();  ?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h1><b>{{ $user['name'] }}'s</b> Order Has been placed</h1>
            <br>
            Thank You
        </div>
    </div>
</div>

@endsection