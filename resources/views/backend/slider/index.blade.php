@extends('backend.layouts.admin_master')
@section('title', 'Manage Slider')
@section('master_content')

    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="">Manage Slider</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1"
                                            class="table table-bordered table-striped dataTable dtr-inline"
                                            aria-describedby="example1_info">
                                            <thead>
                                                <tr>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Brand Name: activate to sort column descending">
                                                        Slider Image</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Brand Image: activate to sort column ascending">
                                                        Title</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Brand Image: activate to sort column ascending">
                                                        Description</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending">
                                                        Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sliders as $slider)
                                                    <tr class="odd">

                                                        <td><img class="brand-image"
                                                                src="{{ asset('uploads/backend/slider/' . $slider->image) }}"
                                                                alt="Slider Image"> </td>
                                                        <td class="dtr-control sorting_1 align-middle" tabindex="0">
                                                            {{ $slider->title }}
                                                        </td>
                                                        <td class="dtr-control sorting_1 align-middle" tabindex="0">
                                                            {{ $slider->description }}
                                                        </td>
                                                        <td class="align-middle">
                                                            @if ($slider->status == 1)
                                                                <span class="badge bg-success">Active</span>
                                                            @else
                                                                <span class="badge bg-danger">Inactive</span>
                                                            @endif
                                                        </td>
                                                        <td class="align-middle">
                                                            <div>
                                                                <a href="{{ route('admin.slider.edit', $slider) }}"
                                                                    class="btn btn-sm btn-primary">Edit</a>
                                                                <form method="POST"
                                                                    action="{{ route('admin.slider.destroy', $slider) }}"
                                                                    class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-sm d-inline btn-danger delete-data"
                                                                        data-toggle="tooltip" title='Delete'>Delete</button>
                                                                </form>

                                                                <form method="POST"
                                                                    @if ($slider->status == 1) action="{{ route('admin.slider.inactive', $slider) }}" @else action="{{ route('admin.slider.active', $slider) }}" @endif
                                                                    class="d-inline">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit"
                                                                        class="btn btn-sm d-inline btn-secondary"
                                                                        data-toggle="tooltip"
                                                                        @if ($slider->status == 1) title='Inactive' @else title='Active' @endif>
                                                                        @if ($slider->status == 1)
                                                                            <i class="fas fa-arrow-alt-circle-down"></i>
                                                                        @else
                                                                            <i class="fas fa-arrow-alt-circle-up"></i>
                                                                        @endif

                                                                    </button>
                                                                </form>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Slider Image</th>
                                                    <th rowspan="1" colspan="1">Title</th>
                                                    <th rowspan="1" colspan="1">Description</th>
                                                    <th rowspan="1" colspan="1">Action</th>
                                                </tr>

                                            </tfoot>

                                        </table>
                                        <div class="d-flex justify-content-end">
                                            {{ $sliders->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <div class="col-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="">Add Slider</h4>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('admin.slider.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="sliderTitle" class="required">Slider Title
                                    </label>
                                    <input type="text" name="title" class="form-control" id="sliderTitle"
                                        value="{{ old('title') }}">
                                </div>
                                <div class="form-group">
                                    <label for="sliderDescription" class="required">Slider Description
                                    </label>
                                    <input type="text" name="description" class="form-control" id="sliderDescription"
                                        value="{{ old('description') }}">
                                </div>

                                <div class="">
                                    <label for="sliderImage" class="required">Slider Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input"
                                                id="sliderImage">
                                            <label class="custom-file-label" for="sliderImage">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add New</button>
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

@endsection
