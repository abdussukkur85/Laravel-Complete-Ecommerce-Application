@extends('frontend.layout.master')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class='active'>Update password</li>
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
                        <h4 class="">Update your password</h4>
                        <p class=""></p>
                        <form class="register-form outer-top-xs" role="form" action="{{ route('password.update') }}"
                            method="post">
                            @csrf
                            <input type="hidden" name="token" value="{{ request()->token }}">
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" name="email" value="{{ $email ?? old('email') }}"
                                    class="form-control unicase-form-control text-input" id="exampleInputEmail1">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input"
                                    id="exampleInputEmail1">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password
                                    <span>*</span></label>
                                <input type="password" name="password_confirmation"
                                    class="form-control unicase-form-control text-input" id="exampleInputEmail1">
                                @error('password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password
                                Link</button>
                        </form>
                    </div>
                    <!-- Sign-in -->
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div>
    </div>
@endsection
