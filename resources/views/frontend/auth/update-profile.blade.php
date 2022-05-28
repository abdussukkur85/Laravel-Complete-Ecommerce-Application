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
                            <strong>Update Your Profile</strong>
                        </h3>

                        <div class="card-body">
                            <form class="register-form outer-top-xs" role="form"
                                action="{{ route('user-profile-information.update') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="info-title" for="">Name
                                        <span>*</span></label>
                                    <input type="text" name="name" class="form-control unicase-form-control text-input"
                                        id="" value="{{ old('name') ?? auth()->user()->name }}">
                                    @error('name', 'updateProfileInformation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Email <span>*</span></label>
                                    <input type="email" name="email" class="form-control unicase-form-control text-input"
                                        id="" value="{{ old('email') ?? auth()->user()->email }}">
                                    @error('email', 'updateProfileInformation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="">Phone <span>*</span></label>
                                    <input type="text" name="phone" class="form-control unicase-form-control text-input"
                                        id="" value="{{ old('phone') ?? auth()->user()->phone }} ">
                                    @error('phone', 'updateProfileInformation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Profile Image</label>
                                    <input type="file" name="profile_image">
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
