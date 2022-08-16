@extends('backend.layouts.admin_master')
@section('title', 'Add Product')
@push('css')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/dist/css/bootstrap-tagsinput.css">
@endpush
@section('master_content')

    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="">Edit Product</h3>
                        </div>
                        <form action="{{ route('admin.products.update', $product->id) }}" method="post"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <!-- Row Number 1 -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="required">Select Brand</label>
                                            <select class="form-control select2" id="selectBrand" style="width: 100%;"
                                                name="brand_id">
                                                <option selected='selected' disabled>Select Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}"
                                                        @if ($product->brand_id == $brand->id) selected = "selected" @endif>
                                                        {{ $brand->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="required">Select Cateogry</label>
                                            <select class="form-control select2" id="selectCategory" style="width: 100%;"
                                                name="category_id">
                                                <option selected='selected' disabled>Select Cateogry</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        @if ($product->category_id == $category->id) selected = "selected" @endif>
                                                        {{ $category->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="required">Select SubCateogry</label>
                                            <select class="form-control select2" id="selectSubcategory" style="width: 100%;"
                                                name="subcategory_id">
                                                <option selected='selected' disabled>Select SubCateogry</option>
                                                {{ $subcategories = App\Models\Subcategory::where('category_id', $product->category_id)->get() }}

                                                @foreach ($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}"
                                                        @if ($subcategory->id == $product->subcategory_id) selected="selected" @endif>
                                                        {{ $subcategory->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="required">Select Sub SubCateogry</label>
                                            <select class="form-control select2" id="selectSubSubcategory"
                                                style="width: 100%;" name="sub_subcategory_id">
                                                <option selected='selected' disabled>Select Sub SubCateogry</option>

                                                {{ $sub_subcategories = App\Models\SubSubcategory::where('category_id', $product->category_id)->where('subcategory_id', $product->subcategory_id)->get() }}
                                                @foreach ($sub_subcategories as $sub_subcategory)
                                                    <option value="{{ $sub_subcategory->id }}"
                                                        @if ($sub_subcategory->id == $product->sub_subcategory_id) selected="selected" @endif>
                                                        {{ $sub_subcategory->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Row Number 2 -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="productName" class="required">Product Name</label>
                                            <input type="text" class="form-control" id="productName" name="name"
                                                value="{{ $product->name }}">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="productCode" class="required">code</label>
                                            <input type="text" class="form-control" id="productCode" name="code"
                                                value="{{ $product->code }}">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="productQuantity" class="required">Product Quantity</label>
                                            <input type="text" class="form-control" id="productQuantity" name="quantity"
                                                value="{{ $product->quantity }}">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="productTags" class="required">Product Tag</label><br>
                                            <input type="text" class="form-control" id="productTags" name="tags"
                                                data-role="tagsinput" value="{{ $product->tags }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Row Number 3 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="productSize" class="required">Product Size</label><br>
                                            <input type="text" class="form-control" id="productSize" name="size"
                                                data-role="tagsinput" value="{{ $product->size }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="productColor" class="required">Product Color</label><br>
                                            <input type="text" class="form-control" id="productColor" name="color"
                                                data-role="tagsinput" value="{{ $product->color }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="SellingPrice" class="required">Selling Price</label>
                                            <input type="text" class="form-control" id="SellingPrice"
                                                name="selling_price" value="{{ $product->selling_price }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Row Number 4 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="DiscountPrice">Discount Price</label>
                                            <input type="text" class="form-control" id="DiscountPrice"
                                                name="discount_price" value="{{ $product->discount_price }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mainThumbnail" class="required">Main Thumbnail</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="thumbnail" class="custom-file-input"
                                                        onchange="readURL(this);">
                                                    <label class="custom-file-label" for="mainThumbnail">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                        </div>

                                        <img id="mainThumbnail"
                                            src="{{ asset('uploads/backend/thumbnail/' . $product->thumbnail) }}"
                                            width="100" alt="">
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mulitpleImage" class="required">Multiple Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="gallery_image[]"
                                                        class="custom-file-input" id="multiImg" multiple="">
                                                    <label class="custom-file-label" for="multipleImage">Choose
                                                        file</label>
                                                </div>
                                            </div>

                                            <div class="row mt-2" id="preview_img">
                                                @foreach ($product->galleryImages as $gallery_image)
                                                    <span class="gallery-image">
                                                        <img src="{{ asset('uploads/backend/gallery_images/' . $gallery_image->gallery_image) }}"
                                                            alt="Gallery Image" style="width: 100px; height:80px"><i
                                                            class="fas fa-times-circle gallery-image-delete"
                                                            data-gallery-id="{{ $gallery_image->id }}"></i>
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Row Number 5 -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="shortDescription" class="required">Short Description</label>

                                            <textarea name="short_description" class="form-control" id="shortDescription" cols="30" rows="4">{{ $product->short_description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="card card-outline card-info">
                                            <div class="card-header">
                                                <h3 class="card-title" class="required">
                                                    Product Description
                                                </h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <textarea id="summernote" name="long_description" style="min-height: 100px">
                                                {{ $product->long_description }}
                                            </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <!-- Row Number 6 -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hot_deals"
                                                    {{ $product->hot_deals ? 'checked' : '' }}>
                                                <label class="form-check-label">Hot Deals</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="featured"
                                                    {{ $product->featured ? 'checked' : '' }}>
                                                <label class="form-check-label">Featured</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="special_offer"
                                                    {{ $product->special_offer ? 'checked' : '' }}>
                                                <label class="form-check-label">Speical Offer</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="special_deal"
                                                    {{ $product->special_deal ? 'checked' : '' }}>
                                                <label class="form-check-label">Special Deals</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>

                        </form>

                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

    @push('js')
        <script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/summernote/summernote-bs4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"
            integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#mainThumbnail').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            // multiple image show before upload
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target
                                            .result).width(100)
                                        .height(80); //create image element 
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
            $(function() {

                //Initialize Select2 Elements
                $('.select2').select2();
                // $("#productTag").tagsinput('items');
                $('#summernote').summernote();

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
                            $('#selectSubcategory :not(:first-child)').remove();
                            $('#selectSubSubcategory :not(:first-child)').remove();
                            $.each(data, function(i, value) {
                                $('#selectSubcategory').append('<option value=' +
                                    value.id + '>' + value.name +
                                    '</option>');
                            });
                        }
                    });
                });

                $('#selectSubcategory').on('change', function() {
                    let sub_subcateogry_id = this.value;
                    $.ajax({
                        type: 'GET',
                        url: "/admin/subsubcategory/ajax/" + sub_subcateogry_id,
                        success: function(data) {
                            $('#selectSubSubcategory :not(:first-child)').remove();
                            $.each(data, function(i, value) {
                                $('#selectSubSubcategory').append('<option value=' +
                                    value.id + '>' + value.name +
                                    '</option>');
                            });
                        }
                    });
                });

                $('.gallery-image-delete').on('click', function() {
                    let gallery_image = $(this).closest('.gallery-image');
                    let gallery_id = $(this).attr("data-gallery-id");
                    $.ajax({
                        type: 'DELETE',
                        url: "/admin/product/" + gallery_id + "/gallery_image",
                        success: function(data) {
                            gallery_image.remove();
                            toastr.success(data.message);
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
