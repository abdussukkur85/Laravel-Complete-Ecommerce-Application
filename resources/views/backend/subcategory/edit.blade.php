@extends('backend.layouts.admin_master')
@section('title', 'Brand List')
@section('master_content')

    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="">Update SubCategory</h4>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('admin.subcategory.update', $subcategory) }}" method="post">

                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Select Category</label>
                                    <select class="form-control select2" style="width: 100%;" name="category_id">
                                        @foreach ($categories as $category)
                                            <option @if ($category->id == $subcategory->category_id) selected="selected" @endif
                                                value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="">
                                    <label for="subCategoryName" class="required">SubCategory Name
                                    </label>
                                    <input type="text" name="name" class="form-control" id="subCategoryName"
                                        value="{{ $subcategory->name }}">
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
@endsection
