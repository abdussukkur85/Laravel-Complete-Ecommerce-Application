@extends('backend.layouts.admin_master')
@section('title', 'Sub Subcategory List')
@push('css')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
                            <h4 class="">All Sub <i class="fas fa-angle-double-right"></i> SubCategory</h4>
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
                                                        Category</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Category Name: activate to sort column ascending">
                                                        SubCategory</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Category Name: activate to sort column ascending">
                                                        Sub SubCategory</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending">
                                                        Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sub_subcategories as $sub_subcategory)
                                                    <tr class="odd">
                                                        <td class="dtr-control sorting_1 align-middle" tabindex="0">
                                                            {{ $sub_subcategory->category->name }}
                                                        </td>
                                                        <td class="dtr-control sorting_1 align-middle" tabindex="0">
                                                            {{ $sub_subcategory->subCategory->name }}
                                                        </td>
                                                        <td class="dtr-control sorting_1 align-middle" tabindex="0">
                                                            {{ $sub_subcategory->name }}
                                                        </td>

                                                        <td class="align-middle">
                                                            <div>
                                                                <a href="{{ route('admin.subsubcategory.edit', $sub_subcategory->id) }}"
                                                                    class="btn btn-sm btn-primary">Edit</a>
                                                                <form method="POST"
                                                                    action="{{ route('admin.subsubcategory.destroy', $sub_subcategory->id) }}"
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
                                                    <th rowspan="1" colspan="1">Category</th>
                                                    <th rowspan="1" colspan="1">SubCategory</th>
                                                    <th rowspan="1" colspan="1">Sub SubCategory</th>
                                                    <th rowspan="1" colspan="1">Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="d-flex justify-content-end">
                                            {{ $sub_subcategories->links() }}
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
                            <h5 class="">Add Sub <i class="fas fa-angle-double-right"></i> SubCategory</h5>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('admin.subsubcategory.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="required">Select Category</label>
                                    <select class="form-control select2" id="selectCategory" style="width: 100%;"
                                        name="category_id">
                                        <option selected='selected' disabled>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="required">Select Subcategory</label>
                                    <select class="form-control select2" id="selectSubCategory" style="width: 100%;"
                                        name="subcategory_id">
                                        <option selected='selected' disabled>Select SubCategory</option>
                                    </select>
                                </div>

                                <div class="">
                                    <label for="SubSubcategoryName" class="required">Sub SubCategory Name
                                    </label>
                                    <input type="text" name="name" class="form-control" id="SubSubcategoryName"
                                        value="{{ old('name') }}">
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add Sub <i
                                        class="fas fa-angle-double-right"></i> SubCategory</button>
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
        <script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>

        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2()

                $('#dataTable').DataTable({
                    "searching": true,
                    "responsive": true,
                    "paging": false,
                    "info": false
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#selectCategory').on('change', function() {
                    let subcateogry_id = this.value;
                    $.ajax({
                        type: 'GET',
                        url: "subcategory/ajax/" + subcateogry_id,
                        success: function(data) {
                            $('#selectSubCategory').empty();
                            $.each(data, function(i, value) {
                                $('#selectSubCategory').append('<option value=' +
                                    value.id + '>' + value.name +
                                    '</option>');
                            });
                        }
                    });
                });

            });
        </script>
    @endpush
@endsection
