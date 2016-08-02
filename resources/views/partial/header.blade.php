<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-xs-6" id="logo">
                <img src="/images/logo.png">WelCome!!!
            </div>
            <div class=" col-md-offset-7 col-md-3 col-xs-4" id="signup">
                <!-- Button trigger modal -->
                <a href="{{ route('shopping.mycart') }}" >My Cart</a>
                @if(Auth::check())
                    <a href="{{ route('shopping.myorderdetails') }}">My Orders</a>
                    <a href="myprofile">
                            <?php $user = Auth::user(); ?>
                            {{ $user['name'] }}
                    </a>
                    <a href="\logout">
                        Logout
                    </a>

                @else
                    <a href="" data-toggle="modal" data-target="#register">
                       Register
                    </a>
                    <a href="" data-toggle="modal" data-target="#login">
                        Login
                    </a>
                @endif
                <!-- Modal -->
                <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Sign Up</h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" id="register_form" action="{{ route('shopping.register') }}">
                                    {{ csrf_field() }}
                                    <fieldset class="form-group">
                                        <label for="Email1">Name</label>
                                        <input type="text" class="form-control" name="name" id="Name1" placeholder="Enter Your Name" >
                                        @if($errors -> has('name'))
                                        <small class="text-muted">{{ $errors->toArray()['name'][0] }}</small>
                                        @endif
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="Email1">Email</label>
                                        <input type="email" class="form-control" name="email" id="Email1" placeholder="Enter email" >
                                        @if($errors -> has('email'))
                                            <small class="text-muted">{{ $errors->toArray()['email'][0] }}</small>
                                        @else
                                        <small class="text-muted">We'll never share your email with anyone else.</small>
                                        @endif
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="Password1">Password</label>
                                        <input type="password" class="form-control" name="user_password" id="Password1" placeholder="Enter Password">
                                        @if($errors -> has('user_password'))
                                            <small class="text-muted">{{ $errors->toArray()['user_password'][0] }}</small>
                                        @endif
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="exampleSelect1">Gender</label>
                                        <select class="form-control" id="gender" name="gender">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>

                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="exampleSelect2">Mobile</label>
                                        <input type="number" class="form-control" name="mobile" id="Phone1">
                                        @if($errors -> has('mobile'))
                                            <small class="text-muted">{{ $errors->toArray()['mobile'][0] }}</small>
                                        @endif
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="exampleSelect2">Date</label>
                                        <input type="date" class="form-control" name="dob" id="Date1">
                                        @if($errors -> has('dob'))
                                            <small class="text-muted">{{ $errors->toArray()['dob'][0] }}</small>
                                        @endif
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="exampleTextarea">Address</label>
                                        <textarea class="form-control" id="Address1" name="address" rows="3"></textarea>
                                        @if($errors -> has('address'))
                                            <small class="text-muted">{{ $errors->toArray()['address'][0] }}</small>
                                        @endif
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="File">Zip Code</label>
                                        <input type="number" class="form-control" name="zipcode" id="Zip1">
                                        @if($errors -> has('zipcode'))
                                            <small class="text-muted">{{ $errors->toArray()['zipcode'][0] }}</small>
                                        @endif
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="File">City</label>
                                        <input type="text" class="form-control" name="city" id="City1">
                                        @if($errors -> has('city'))
                                            <small class="text-muted">{{ $errors->toArray()['city'][0] }}</small>
                                        @endif
                                    </fieldset>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                           I have accpet all the terms and conditions
                                        </label>
                                    </div>
                                    {{--<div class="checkbox">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox"> Check me out--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                    <button type="submit" class="btn btn-primary registration">Submit</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                            {{--<div class="modal-footer">--}}
                               {{----}}
                                {{--<button type="submit" class="btn btn-primary">Save changes</button>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-xs-2" id="loginpage">

                <!-- Modal -->
                <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Login Details</h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" name="login_form" action="{{ route('shopping.login') }}">
                                    {{ csrf_field() }}
                                    <fieldset class="form-group">
                                        <label for="Email1">Email address</label>
                                        <input type="email" class="form-control" id="Email1" name="emailid" placeholder="Enter email" >
                                        @if($errors -> has('emailid'))
                                            <small class="text-muted">{{ $errors->toArray()['emailid'][0] }}</small>
                                        @else
                                            <small class="text-muted">We'll never share your email with anyone else.</small>
                                        @endif
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="Password1">Password</label>
                                        <input type="password" class="form-control" name="login_password" id="Password1" placeholder="Password" >
                                        @if($errors -> has('login_password'))
                                            <small class="text-muted">{{ $errors->toArray()['login_password'][0] }}</small>
                                        @endif
                                    </fieldset>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Login</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="navigation">
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/home">My Account</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    @foreach($message as $parentkey => $parentvalue)
                        @if(count($parentvalue['children'])>0)
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $parentvalue['name'] }}<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach($parentvalue['children'] as $child)
                                        <li><a href={{route('shopping.subcategory',$child['id'])}}>{{ $child['name'] }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li>
                                <a href="{{route('shopping.subcategory',$parentvalue['id'])}}">{{ $parentvalue['name'] }}</a>
                            </li>
                        @endif

                        {{--@foreach($parentvalue as $childvalue)--}}
                        {{--{{ dd($parentvalue['children'][0]) }}--}}
                        {{--@endforeach--}}
                    @endforeach
                    {{--<li><a href="#">Link</a></li>--}}
                    {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li><a href="#">Action</a></li>--}}
                            {{--<li><a href="#">Another action</a></li>--}}
                            {{--<li><a href="#">Something else here</a></li>--}}
                            {{--<li role="separator" class="divider"></li>--}}
                            {{--<li><a href="#">Separated link</a></li>--}}
                            {{--<li role="separator" class="divider"></li>--}}
                            {{--<li><a href="#">One more separated link</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>