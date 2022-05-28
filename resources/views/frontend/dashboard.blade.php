@extends('frontend.layout.master')
@section('content')
    <div class="body-content">
        <div class="container">
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
                <div class="col-md-8">
                    <div class="card">
                        <h3 class="text-center">
                            <span class="text-danger">Hi....</span>
                            <strong>{{ Auth::user()->name }}</strong> Welcome To Easy Online Shop
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
