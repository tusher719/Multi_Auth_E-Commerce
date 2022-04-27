

@php

    $categories = \App\Models\Category::orderBy('category_name_en', 'ASC')->get();

@endphp


<!-- ================================== TOP NAVIGATION ================================== -->
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">

            @foreach($categories as $category)
                <li class="dropdown menu-item">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>
                        @if(session()->get('language') == 'bangla') {{ $category->category_name_ban }} @else {{ $category->category_name_en }} @endif
                    </a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">


                                <!-- Get SubCategory Table Data -->
                                @php
                                    $subcategories = \App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                                @endphp

                                @foreach($subcategories as $subcategory)
                                    <div class="col-sm-12 col-md-3">

                                        <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en) }}" style="padding: 0;">
                                            <h2 class="title">
                                                @if(session()->get('language') == 'bangla') {{ $subcategory->subcategory_name_ban }} @else {{ $subcategory->subcategory_name_en }} @endif
                                            </h2>
                                        </a>

                                        <!-- Get SubSubCategory Table Data -->
                                        @php
                                            $subsubcategories = \App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name_en','ASC')->get();
                                        @endphp
                                        @foreach($subsubcategories as $subsubcategory)
                                            <ul class="links list-unstyled">
                                                <li><a href="{{ url('subsubcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug_en) }}">
                                                        @if(session()->get('language') == 'bangla')
                                                            {{ $subsubcategory->subsubcategory_name_ban }}
                                                        @else
                                                            {{ $subsubcategory->subsubcategory_name_en }}
                                                        @endif
                                                    </a>
                                                </li>
                                            </ul>
                                    @endforeach <!-- End SubSubCategory Foreach -->
                                    </div>
                            @endforeach <!-- End SubCategory Foreach -->
                                <!-- /.col -->


                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                    <!-- /.dropdown-menu --> </li>
                <!-- /.menu-item -->
            @endforeach






            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-heartbeat"></i>Health and Beauty</a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-lg-4">
                                <ul>
                                    <li><a href="#">Gaming</a></li>
                                    <li><a href="#">Laptop Skins</a></li>
                                    <li><a href="#">Apple</a></li>
                                    <li><a href="#">Dell</a></li>
                                    <li><a href="#">Lenovo</a></li>
                                    <li><a href="#">Microsoft</a></li>
                                    <li><a href="#">Asus</a></li>
                                    <li><a href="#">Adapters</a></li>
                                    <li><a href="#">Batteries</a></li>
                                    <li><a href="#">Cooling Pads</a></li>
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-lg-4">
                                <ul>
                                    <li><a href="#">Routers &amp; Modems</a></li>
                                    <li><a href="#">CPUs, Processors</a></li>
                                    <li><a href="#">PC Gaming Store</a></li>
                                    <li><a href="#">Graphics Cards</a></li>
                                    <li><a href="#">Components</a></li>
                                    <li><a href="#">Webcam</a></li>
                                    <li><a href="#">Memory (RAM)</a></li>
                                    <li><a href="#">Motherboards</a></li>
                                    <li><a href="#">Keyboards</a></li>
                                    <li><a href="#">Headphones</a></li>
                                </ul>
                            </div>
                            <div class="dropdown-banner-holder"> <a href="#"><img alt="" src="{{ asset('frontend') }}/assets/images/banners/banner-side.png" /></a> </div>
                        </div>
                        <!-- /.row -->
                    </li>
                    <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> </li>
            <!-- /.menu-item -->

            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paper-plane"></i>Kids and Babies</a>
                <!-- /.dropdown-menu --> </li>
            <!-- /.menu-item -->

            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports</a>
                <!-- ================================== MEGAMENU VERTICAL ================================== -->
                <!-- /.dropdown-menu -->
                <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
            <!-- /.menu-item -->

            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a>
                <!-- /.dropdown-menu --> </li>
            <!-- /.menu-item -->

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
<!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->
