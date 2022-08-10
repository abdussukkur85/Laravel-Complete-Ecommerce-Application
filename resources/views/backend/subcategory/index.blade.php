@extends('backend.layouts.admin_master')
@section('title', 'Brand List')
@push('css')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush
@section('master_content')

    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="">All SubCategory</h4>
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
                                                        aria-label="Cateogyr Icon: activate to sort column descending">
                                                        Category Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Category Name: activate to sort column ascending">
                                                        SubCategory Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending">
                                                        Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($subcategories as $subcategory)
                                                    <tr class="odd">
                                                        <td class="dtr-control sorting_1 align-middle" tabindex="0">
                                                            {{ $subcategory->category->name }}
                                                        </td>
                                                        <td class="dtr-control sorting_1 align-middle" tabindex="0">
                                                            {{ $subcategory->name }}
                                                        </td>
                                                        <td class="align-middle">
                                                            <div>
                                                                <a href="{{ route('admin.subcategory.edit', $subcategory) }}"
                                                                    class="btn btn-sm btn-primary">Edit</a>
                                                                <form method="POST"
                                                                    action="{{ route('admin.subcategory.destroy', $subcategory) }}"
                                                                    class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-md d-inline btn-danger delete-data"
                                                                        data-toggle="tooltip" title='Delete'>Delete</button>
                                                                </form>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Category Name</th>
                                                    <th rowspan="1" colspan="1">SubCategory Name</th>
                                                    <th rowspan="1" colspan="1">Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
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
                            <h4 class="">Add SubCategory</h4>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('admin.subcategory.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Select Category</label>
                                    <select class="form-control select2" style="width: 100%;" name="category_id">
                                        @foreach ($categories as $category)
                                            <option @if ($loop->index == 0) selected="selected" @endif
                                                value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="">
                                    <label for="subCategoryName" class="required">SubCategory Name
                                    </label>
                                    <input type="text" name="name" class="form-control" id="subCategoryName"
                                        value="{{ old('name') }}">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add SubCategory</button>
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
        <script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>
        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2()

                //   //Initialize Select2 Elements
                //   $('.select2bs4').select2({
                //     theme: 'bootstrap4'
                //   })
            });
        </script>
    @endpush
@endsection
