@extends('backend.layouts.admin_master')
@section('title', 'Admin Profile')

@section('master_content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Admin Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                
                <div class="text-center">
                  
                      <div class="col-md-7 offset-md-5 admin-avatar">
                        <div class="">
                          <img class="profile-user-img img-fluid img-circle"
                           src="@if(admin()->avatar != null) {{ asset('uploads/backend/profile/'.admin()->avatar)}} @else {{ asset('backend/dist/img/profile.webp') }} @endif"
                           alt="User profile picture">
                           <h3 class="profile-username text-center">{{ $admin->name }}</h3>
                          <p class="text-muted text-center">{{ $admin->email }}</p>
                        </div>
                        <div class="">
                          <a href="{{ route('admin.edit_profile') }}" class="btn btn-primary">Edit Profile</a>
                        </div>
                      </div>
                      
                </div>

                

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection