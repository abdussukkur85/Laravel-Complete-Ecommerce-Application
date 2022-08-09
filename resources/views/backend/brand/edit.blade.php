@extends('backend.layouts.admin_master')
@section('title', 'Brand List')
@section('master_content')

    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="">Update Brand</h4>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('admin.brand.update', $brand) }}" method="post" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="brandName" class="required">Brand Name
                                    </label>
                                    <input type="text" name="name" class="form-control" id="brandName"
                                        value="{{ $brand->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="brandImage" class="required">Brand Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input"
                                                onchange="readURL(this);">
                                            <label class="custom-file-label" for="brandImage">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <img id="brandImage" src="{{ asset('uploads/backend/brand/' . $brand->image) }}"
                                        width="100" alt="">
                                </div>
                            </div>


                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Brand</button>
                            </div>
                    </div>
                    </form>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

    @push('js')
        <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#brandImage').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    @endpush
@endsection
