<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            @php
                $categories = App\Models\Category::with('subCategory')
                    ->latest()
                    ->get();
            @endphp
            @foreach ($categories as $category)
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon {{ $category->icon }}" aria-hidden="true"></i>{{ $category->name }}</a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                @foreach ($category->subCategory as $subcategory)
                                    @php
                                        $sub_subcategories = App\Models\SubSubcategory::where('category_id', $category->id)
                                            ->where('subcategory_id', $subcategory->id)
                                            ->get();
                                        
                                    @endphp
                                    <div class="col-sm-12 col-md-3">
                                        <h2 class="title">{{ $subcategory->name }}</h2>
                                        <ul class="links list-unstyled">
                                            @foreach ($sub_subcategories as $sub_subcategory)
                                                <li><a href="#">{{ $sub_subcategory->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- /.col -->
                                @endforeach
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                    <!-- /.dropdown-menu -->
                </li>
                <!-- /.menu-item -->
            @endforeach

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
