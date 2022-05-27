@extends('frontend.layout.master')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page" style="margin-bottom: 20px">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Sign in</h4>
                        <p class="">Hello, Welcome to your account.</p>
                        <div class="social-sign-in outer-top-xs">
                            <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                            <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                        </div>
                        <form class="register-form outer-top-xs" role="form" action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input"
                                    id="exampleInputEmail1">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input"
                                    id="exampleInputPassword1">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="radio outer-xs">
                                <label style="padding-left: 0">
                                    <input type="checkbox" id="optionsRadios2" name="remember"
                                        {{ old('remember') ? 'checked' : '' }}><span style="margin-left: 8px">
                                        Remember
                                        me!
                                    </span>

                                    {{-- <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> --}}
                                </label>
                                @if (Route::has('password.reset'))
                                    <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot
                                        your Password?</a>
                                @endif
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                        </form>
                    </div>
                    <!-- Sign-in -->
                    <!-- create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">Create a new account</h4>
                        <p class="text title-tag-line">Create your new account.</p>
                        <form class="register-form outer-top-xs" role="form" method="post"
                            action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                <input type="email" name="register_email"
                                    class="form-control unicase-form-control text-input" id="exampleInputEmail2">
                                @error('register_email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                <input type="text" name="register_name" class="form-control unicase-form-control text-input"
                                    id="exampleInputEmail1">
                                @error('register_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                                <input type="text" name="register_phone"
                                    class="form-control unicase-form-control text-input" id="exampleInputEmail1">
                                @error('register_phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                                <input type="password" name="register_password"
                                    class="form-control unicase-form-control text-input" id="exampleInputEmail1">
                                @error('register_password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password
                                    <span>*</span></label>
                                <input type="password" name="register_password_confirmation"
                                    class="form-control unicase-form-control text-input" id="exampleInputEmail1">
                                @error('register_password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                        </form>
                    </div>
                    <!-- create a new account -->
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div>
    </div>
@endsection
