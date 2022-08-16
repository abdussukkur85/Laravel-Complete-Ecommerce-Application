@extends('backend.layouts.admin_master')
@section('title', 'Product List')
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
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="">Manage Product</h4>
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
                                                        aria-label="Product Image: activate to sort column descending">
                                                        Product Image</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Product Name: activate to sort column ascending">
                                                        Product Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Product Name: activate to sort column ascending">
                                                        Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending">
                                                        Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product)
                                                    <tr class="odd">
                                                        <td class="dtr-control sorting_1 align-middle" tabindex="0">
                                                            <img class="product-image"
                                                                src="{{ asset('uploads/backend/thumbnail/' . $product->thumbnail) }}"
                                                                alt="Product Thumbnail Image" width="100px">
                                                        </td>
                                                        <td class="align-middle">{{ $product->name }} </td>
                                                        <td class="align-middle">
                                                            @if ($product->status == 1)
                                                                <span class="badge bg-success">Active</span>
                                                            @else
                                                                <span class="badge bg-danger">Inactive</span>
                                                            @endif
                                                        </td>
                                                        <td class="align-middle">
                                                            <div>
                                                                <a class="btn btn-sm btn-info d-inline" title="View"><i
                                                                        class="fas fa-eye"></i></a>
                                                                <a href="{{ route('admin.products.edit', $product) }}"
                                                                    class="btn btn-sm btn-primary" title="Edit"><i
                                                                        class="fas fa-pen"></i></a>
                                                                <form method="POST"
                                                                    action="{{ route('admin.products.destroy', $product) }}"
                                                                    class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-sm d-inline btn-danger delete-data"
                                                                        data-toggle="tooltip" title='Delete'><i
                                                                            class="fas fa-trash"></i></button>
                                                                </form>

                                                                <form method="POST"
                                                                    @if ($product->status == 1) action="{{ route('admin.products.inactive', $product) }}" @else action="{{ route('admin.products.active', $product) }}" @endif
                                                                    class="d-inline">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit"
                                                                        class="btn btn-sm d-inline btn-secondary"
                                                                        data-toggle="tooltip"
                                                                        @if ($product->status == 1) title='Inactive' @else title="Active" @endif>
                                                                        @if ($product->status == 1)
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
                                                    <th rowspan="1" colspan="1">Brand Name</th>
                                                    <th rowspan="1" colspan="1">Brand Image</th>
                                                    <th rowspan="1" colspan="1">Status</th>
                                                    <th rowspan="1" colspan="1">Action</th>
                                                </tr>

                                            </tfoot>

                                        </table>
                                        <div class="d-flex justify-content-end">
                                            {{ $products->links() }}
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
