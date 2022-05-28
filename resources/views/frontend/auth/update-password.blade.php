@extends('frontend.layout.master')
@section('content')
    <div class="body-content">
        <div class="container sign-in-page">
            <div class="row">
                <div class="col-md-2">
                    <br>
                    <img src="@if (auth()->user()->avatar != null) {{ asset('uploads/frontend/profile/' . auth()->user()->avatar) }} @else {{ asset('backend/dist/img/profile.webp') }} @endif"
                        style="border-radius: 100%" class="card-img-top" height="100%" width="100%" alt="">
                    <br>
                    <br>
                    <ul class="list-group list-group-flush text-center">
                        <a href="{{ url('/dashboard') }}" class="bnt btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user-profile-information.update') }}"
                            class="bnt btn-primary btn-sm btn-block">Profile
                            Update</a>
                        <a href="{{ route('user-password.update') }}" class="bnt btn-primary btn-sm btn-block">Change
                            Password</a>

                        <a href="{{ route('logout') }}" class="bnt btn-danger btn-sm btn-block"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">
                            <strong>Change Your Password</strong>
                        </h3>

                        <div class="card-body">
                            <form class="register-form outer-top-xs" role="form"
                                action="{{ route('user-password.update') }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="info-title" for="">Current Password
                                        <span>*</span></label>
                                    <input type="password" name="current_password"
                                        class="form-control unicase-form-control text-input" id="">
                                    @error('current_password', 'updatePassword')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                                    <input type="password" name="password"
                                        class="form-control unicase-form-control text-input" id="">
                                    @error('password', 'updatePassword')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Confirm Password
                                        <span>*</span></label>
                                    <input type="password" name="password_confirmation"
                                        class="form-control unicase-form-control text-input" id="">
                                    @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
