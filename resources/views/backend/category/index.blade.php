@extends('backend.layouts.admin_master')
@section('title', 'Category List')
@push('css')
    <!-- Data Table -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush
@section('master_content')

    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="">All Category</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="dataTable"
                                            class="table table-bordered table-striped dataTable dtr-inline"
                                            aria-describedby="example1_info">
                                            <thead>
                                                <tr>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Cateogyr Icon: activate to sort column descending">
                                                        Category Icon</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Category Name: activate to sort column ascending">
                                                        Category Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending">
                                                        Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $category)
                                                    <tr class="odd">
                                                        <td class="dtr-control sorting_1 align-middle" tabindex="0">
                                                            <i class="{{ $category->icon }}"></i>
                                                        </td>
                                                        <td class="dtr-control sorting_1 align-middle" tabindex="0">
                                                            {{ $category->name }}
                                                        </td>
                                                        <td class="align-middle">
                                                            <div>
                                                                <a href="{{ route('admin.category.edit', $category) }}"
                                                                    class="btn btn-sm btn-primary">Edit</a>
                                                                <form method="POST"
                                                                    action="{{ route('admin.category.destroy', $category) }}"
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
                                                    <th rowspan="1" colspan="1">Category Icon</th>
                                                    <th rowspan="1" colspan="1">Category Name</th>
                                                    <th rowspan="1" colspan="1">Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="d-flex justify-content-end">
                                            {{ $categories->links() }}
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
                            <h4 class="">Add Category</h4>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('admin.category.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="CategoryName" class="required">Category Name
                                    </label>
                                    <input type="text" name="name" class="form-control" id="CategoryName"
                                        value="{{ old('name') }}">
                                </div>

                                <div class="">
                                    <label for="categoryIcon" class="required">Category Icon
                                    </label>
                                    <input type="text" name="icon" class="form-control" id="categoryIcon"
                                        placeholder="fas fa-address-book" value="{{ old('icon') }}">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add Category</button>
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
        <!-- Data Table -->
        <script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/jszip/jszip.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <script>
            $(function() {
                $('#dataTable').DataTable({
                    "searching": true,
                    "responsive": true,
                    "paging": false,
                    "info": false
                });
            });
        </script>
    @endpush
@endsection
