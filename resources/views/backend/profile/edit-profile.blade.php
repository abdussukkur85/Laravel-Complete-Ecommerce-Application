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

            <!-- card -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Admin Profile Edit</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.update_profile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="adminUserName">Admin User Name</label>
                                <input type="text" name="name" class="form-control" id="adminUserName" value="{{ $admin->name }}">
                              </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="adminEmail">Admin Email</label>
                                <input type="text" class="form-control" id="adminEmail" value="{{ $admin->email }}" readonly>
                            </div>
                          </div>
                    
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputFile">Profile Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                    <input type="file" name="profile_image" class="custom-file-input" id="profileAvatar" onchange="readURL(this);">
                                    <label class="custom-file-label" for="profileAvatar">Choose file</label>
                                    </div>
                                </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                              <img id="profileImage" src="{{ asset('backend/dist/img/no-image.png') }}" width="100" alt="">
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
    @push('js')
        <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                    $('#profileImage').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    @endpush
@endsection