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
                            <h4 class="">Update Sub SubCategory</h4>
                        </div>

                        <!-- /.card-header -->
                        <form action="{{ route('admin.subsubcategory.update', $sub_subcategory) }}" method="post">

                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="required">Select Category</label>
                                    <select class="form-control select2" id="selectCategory" style="width: 100%;"
                                        name="category_id">
                                        <option selected='selected' disabled>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if ($category->id == $sub_subcategory->category_id) selected="selected" @endif>
                                                {{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="required">Select SubCategory</label>
                                    <select class="form-control select2" id="selectSubCategory" style="width: 100%;"
                                        name="subcategory_id">
                                        <option selected='selected' disabled>Select SubCategory</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}"
                                                @if ($subcategory->id == $sub_subcategory->subcategory_id) selected="selected" @endif>
                                                {{ $subcategory->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="">
                                    <label for="SubSubcategoryName" class="required">Sub SubCategory Name
                                    </label>
                                    <input type="text" name="name" class="form-control" id="SubSubcategoryName"
                                        value="{{ $sub_subcategory->name }}">
                                </div>
                            </div>


                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Category</button>
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
                $('.select2').select2();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#selectCategory').on('change', function() {
                    let subcateogry_id = this.value;
                    $.ajax({
                        type: 'GET',
                        url: "/admin/subcategory/ajax/" + subcateogry_id,
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
