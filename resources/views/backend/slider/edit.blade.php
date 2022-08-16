@extends('backend.layouts.admin_master')
@section('title', 'Edit Slider')
@section('master_content')

    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="">Update Slider</h4>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('admin.slider.update', $slider) }}" method="post"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="sliderTitle" class="required">Slider Title
                                    </label>
                                    <input type="text" name="title" class="form-control" id="sliderTitle"
                                        value="{{ $slider->title }}">
                                </div>

                                <div class="form-group">
                                    <label for="sliderDescription" class="required">Slider Description
                                    </label>
                                    <input type="text" name="description" class="form-control" id="sliderDescription"
                                        value="{{ $slider->description }}">
                                </div>

                                <div class="form-group">
                                    <label for="sliderImage" class="required">Slider Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input"
                                                onchange="readURL(this);">
                                            <label class="custom-file-label" for="sliderImage">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <img id="sliderImage" src="{{ asset('uploads/backend/slider/' . $slider->image) }}"
                                        width="100" alt="">
                                </div>
                            </div>


                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Slider</button>
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
                        $('#sliderImage').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    @endpush
@endsection
