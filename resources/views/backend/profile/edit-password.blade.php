@extends('backend.layouts.admin_master')
@section('title', 'Admin Profile')

@section('master_content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Admin Password Change</li>
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

            <!-- card -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Admin Change Password</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.update_password') }}" method="post" >
                    @csrf
                  <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="currentPassword">Current Password</label>
                                    <input type="password" name="current_password" class="form-control" id="currentPassword">
                                </div>

                                <div class="form-group">
                                    <label for="newPassword">New Password</label>
                                    <input type="password" name="password" class="form-control" id="newPassword">
                                </div>

                                <div class="form-group">
                                    <label for="confirmPassword">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="confirmPassword">
                                </div>
                            </div>
                            
                        </div>
                    
                    </div>
                    <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
              </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection