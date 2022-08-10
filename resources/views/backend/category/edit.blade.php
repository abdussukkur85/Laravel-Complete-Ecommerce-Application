@extends('backend.layouts.admin_master')
@section('title', 'Brand List')
@section('master_content')

    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="">Update Category</h4>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('admin.category.update', $category) }}" method="post">

                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="categoryName" class="required">Category Name
                                    </label>
                                    <input type="text" name="name" class="form-control" id="categoryName"
                                        value="{{ $category->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="categoryIcon" class="required">Category Icon
                                    </label>
                                    <input type="text" name="icon" class="form-control" id="categoryIcon"
                                        value="{{ $category->icon }}">
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
