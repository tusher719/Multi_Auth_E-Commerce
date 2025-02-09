@extends('frontend.main_master')
@section('content')
@section('title')
    Shop Page
@endsection

<style>
    .nry,
    .checked {
        color: orange;
    }
</style>

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li><a href="#">Shop Page</a></li>

            </ul>
        </div>
        <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>

        <form action="{{ route('shop.filter') }}" method="post">
            @csrf

        <div class='row'>
            <div class='col-md-3 sidebar'>

                <!-- ===== == TOP NAVIGATION ======= ==== -->
            @include('frontend.common.vertical_menu')
            <!-- = ==== TOP NAVIGATION : END === ===== -->




                <div class="sidebar-module-container">
                    <div class="sidebar-filter">
                        <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                        <div class="sidebar-widget wow fadeInUp">
                            <h3 class="section-title">shop by</h3>
                            <div class="widget-header">
                                <h4 class="widget-title">Category</h4>
                            </div>
                            <div class="sidebar-widget-body">
                                <div class="accordion">
                                    @if(!empty($_GET['category']))
                                        @php
                                            $filterCat = explode(',',$_GET['category']);
                                        @endphp
                                    @endif


                                    @foreach($categories as $category)
                                        <div class="accordion-group">

                                            <div class="accordion-heading">

                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="category[]" value="{{ $category->category_slug_en }}" @if(!empty($filterCat) && in_array($category->category_slug_en,$filterCat)) checked @endif  onchange="this.form.submit()">

                                                    @if(session()->get('language') == 'hindi') {{ $category->category_name_hin }} @else {{ $category->category_name_en }} @endif

                                                </label>


                                            </div>

                                            <!-- /.accordion-heading -->



                                        </div>
                                        <!-- /.accordion-group -->
                                    @endforeach


                                </div>
                                <!-- /.accordion -->
                            </div>
                            <!-- /.sidebar-widget-body -->

                            <!-- /.sidebar-widget -->




                            <!--  /////////// This is for Brand Filder /////////////// -->



                            <div class="widget-header">
                                <h4 class="widget-title">Brand Filter</h4>
                            </div>
                            <div class="sidebar-widget-body">
                                <div class="accordion">

                                    @if(!empty($_GET['brand']))
                                        @php
                                            $filterBrand = explode(',',$_GET['brand']);
                                        @endphp
                                    @endif



                                    @foreach($brands as $brand)
                                        <div class="accordion-group">
                                            <div class="accordion-heading">

                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="brand[]" value="{{ $brand->brand_slug_en }}" @if(!empty($filterBrand) && in_array($brand->brand_slug_en,$filterBrand)) checked @endif onchange="this.form.submit()">

                                                    @if(session()->get('language') == 'hindi') {{ $brand->brand_name_hin }} @else {{ $brand->brand_name_en }} @endif

                                                </label>


                                            </div>
                                            <!-- /.accordion-heading -->


                                        </div>
                                        <!-- /.accordion-group -->
                                    @endforeach




                                </div>
                                <!-- /.accordion -->
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

                        <!-- ============================================== PRICE SILDER============================================== -->
                        <div class="sidebar-widget wow fadeInUp">
                            <div class="widget-header">
                                <h4 class="widget-title">Price Slider</h4>
                            </div>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                                    <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                                    <input type="text" class="price-slider" value="" >
                                </div>
                                <!-- /.price-range-holder -->
                                <a href="#" class="lnk btn btn-primary">Show Now</a> </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== PRICE SILDER : END ============================================== -->
                        <!-- ============================================== MANUFACTURES============================================== -->
                        <div class="sidebar-widget wow fadeInUp">
                            <div class="widget-header">
                                <h4 class="widget-title">Manufactures</h4>
                            </div>
                            <div class="sidebar-widget-body">
                                <ul class="list">
                                    <li><a href="#">Forever 18</a></li>
                                    <li><a href="#">Nike</a></li>
                                    <li><a href="#">Dolce & Gabbana</a></li>
                                    <li><a href="#">Alluare</a></li>
                                    <li><a href="#">Chanel</a></li>
                                    <li><a href="#">Other Brand</a></li>
                                </ul>
                                <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== MANUFACTURES: END ============================================== -->
                        <!-- ============================================== COLOR============================================== -->
                        <div class="sidebar-widget wow fadeInUp">
                            <div class="widget-header">
                                <h4 class="widget-title">Colors</h4>
                            </div>
                            <div class="sidebar-widget-body">
                                <ul class="list">
                                    <li><a href="#">Red</a></li>
                                    <li><a href="#">Blue</a></li>
                                    <li><a href="#">Yellow</a></li>
                                    <li><a href="#">Pink</a></li>
                                    <li><a href="#">Brown</a></li>
                                    <li><a href="#">Teal</a></li>
                                </ul>
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== COLOR: END ============================================== -->
                        <!-- == ======= COMPARE==== ==== -->
                        <div class="sidebar-widget wow fadeInUp outer-top-vs">
                            <h3 class="section-title">Compare products</h3>
                            <div class="sidebar-widget-body">
                                <div class="compare-report">
                                    <p>You have no <span>item(s)</span> to compare</p>
                                </div>
                                <!-- /.compare-report -->
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== COMPARE: END ============================================== -->


                        <!-- == ====== PRODUCT TAGS ==== ======= -->
                    @include('frontend.common.product_tags')
                    <!-- /.sidebar-widget -->
                        <!-- == ====== END PRODUCT TAGS ==== ======= -->

                        <!----------- Testimonials------------->

                    @include('frontend.common.testimonials')
                    <!-- == ========== Testimonials: END ======== ========= -->

                        <div class="home-banner"> <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image"> </div>
                    </div>
                    <!-- /.sidebar-filter -->
                </div>
                <!-- /.sidebar-module-container -->
            </div>
            <!-- /.sidebar -->
            <div class='col-md-9'>

                <!-- == ==== SECTION – HERO === ====== -->

                <div id="category" class="category-carousel hidden-xs">
                    <div class="item">
                        <div class="image"> <img src="{{ asset('frontend/assets/images/banners/cat-banner-1.jpg') }}" alt="" class="img-responsive"> </div>
                        <div class="container-fluid">
                            <div class="caption vertical-top text-left">
                                <div class="big-text"> Big Sale </div>
                                <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                                <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div>
                            </div>
                            <!-- /.caption -->
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                </div>

                <div class="clearfix filters-container m-t-10">
                    <div class="row">
                        <div class="col col-sm-6 col-md-2">
                            <div class="filter-tabs">
                                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                    <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                                    <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                                </ul>
                            </div>
                            <!-- /.filter-tabs -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-12 col-md-6">
                            <div class="col col-sm-3 col-md-6 no-padding">
                                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                                    <div class="fld inline">
                                        <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                            <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li role="presentation"><a href="#">position</a></li>
                                                <li role="presentation"><a href="#">Price:Lowest first</a></li>
                                                <li role="presentation"><a href="#">Price:HIghest first</a></li>
                                                <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /.fld -->
                                </div>
                                <!-- /.lbl-cnt -->
                            </div>
                            <!-- /.col -->
                            <div class="col col-sm-3 col-md-6 no-padding">
                                <div class="lbl-cnt"> <span class="lbl">Show</span>
                                    <div class="fld inline">
                                        <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                            <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li role="presentation"><a href="#">1</a></li>
                                                <li role="presentation"><a href="#">2</a></li>
                                                <li role="presentation"><a href="#">3</a></li>
                                                <li role="presentation"><a href="#">4</a></li>
                                                <li role="presentation"><a href="#">5</a></li>
                                                <li role="presentation"><a href="#">6</a></li>
                                                <li role="presentation"><a href="#">7</a></li>
                                                <li role="presentation"><a href="#">8</a></li>
                                                <li role="presentation"><a href="#">9</a></li>
                                                <li role="presentation"><a href="#">10</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /.fld -->
                                </div>
                                <!-- /.lbl-cnt -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-6 col-md-4 text-right">

                            <!-- /.pagination-container --> </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>


                <!--    //////////////////// START Product Grid View  ////////////// -->

                <div class="search-result-container ">
                    <div id="myTabContent" class="tab-content category-list">
                        <div class="tab-pane active " id="grid-container">
                            <div class="category-product">
                                <div class="row">

                                    @foreach($products as $product)
                                        <div class="col-sm-6 col-md-4 wow fadeInUp">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                                                        <!-- /.image -->

                                                        @php
                                                            $amount = $product->selling_price - $product->discount_price;
                                                            $discount = ($amount/$product->selling_price) * 100;
                                                        @endphp

                                                        <div>
                                                            @if ($product->discount_price == NULL)
                                                                <div class="tag new"><span>new</span></div>
                                                            @else
                                                                <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                                            @endif
                                                        </div>

                                                    </div>
                                                    <!-- /.product-image -->

                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                                                @if(session()->get('language') == 'bangla') {{ $product->product_name_ban }} @else {{ $product->product_name_en }} @endif</a></h3>
                                                        @php
                                                            $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                                                            $avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                                                        @endphp

                                                        <div class="rating-reviews m-t-20">
                                                            <div class="row">
                                                                <div class="col-sm-5">

                                                                    @if($avarage == 0)
                                                                        <span class="nry">No Rating Yet</span>
                                                                    @elseif($avarage == 1 || $avarage < 2)
                                                                        <i class="fa fa-star checked"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                    @elseif($avarage == 2 || $avarage < 3)
                                                                        <i class="fa fa-star checked"></i>
                                                                        <i class="fa fa-star checked"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                    @elseif($avarage == 3 || $avarage < 4)
                                                                        <i class="fa fa-star checked"></i>
                                                                        <i class="fa fa-star checked"></i>
                                                                        <i class="fa fa-star checked"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>

                                                                    @elseif($avarage == 4 || $avarage < 5)
                                                                        <i class="fa fa-star checked"></i>
                                                                        <i class="fa fa-star checked"></i>
                                                                        <i class="fa fa-star checked"></i>
                                                                        <i class="fa fa-star checked"></i>
                                                                        <i class="fa fa-star"></i>
                                                                    @elseif($avarage == 5 || $avarage < 5)
                                                                        <i class="fa fa-star checked"></i>
                                                                        <i class="fa fa-star checked"></i>
                                                                        <i class="fa fa-star checked"></i>
                                                                        <i class="fa fa-star checked"></i>
                                                                        <i class="fa fa-star checked"></i>
                                                                    @endif

                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <div class="reviews">
                                                                        <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}#review" class="lnk" style="color: grey">({{ count($reviewcount) }} Reviews)</a>
                                                                    </div>
                                                                </div>
                                                            </div><!-- /.row -->
                                                        </div><!-- /.rating-reviews -->


                                                        @if ($product->discount_price == NULL)
                                                            <div class="product-price"> <span class="price"> ${{ number_format($product->selling_price) }} </span>   </div>

                                                        @else
                                                            <div class="product-price">
                                                                <span class="price"> ${{ number_format($product->discount_price) }} </span>
                                                                <span class="price-before-discount">$ {{ number_format($product->selling_price) }}</span>
                                                            </div>
                                                    @endif
                                                    <!-- /.product-price -->

                                                    </div>
                                                    <!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"><i class="fa fa-shopping-cart"></i> </button>
                                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                                </li>
                                                                <li class="add-cart-button btn-group">
                                                                    <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)">
                                                                        <i class="icon fa fa-heart"></i>
                                                                    </button>
                                                                </li>
                                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                                            </ul>
                                                        </div>
                                                        <!-- /.action -->
                                                    </div>
                                                    <!-- /.cart -->
                                                </div>
                                                <!-- /.product -->

                                            </div>
                                            <!-- /.products -->
                                        </div>
                                        <!-- /.item -->
                                    @endforeach

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.category-product -->

                        </div>
                        <!-- /.tab-pane -->

                        <!-- //////////////////// END Product Grid View  ////////////// -->

                        <!-- //////////////////// Product List View Start ////////////// -->

                        <div class="tab-pane "  id="list-container">
                            <div class="category-product">

                                @foreach($products as $product)
                                    <div class="category-product-inner wow fadeInUp">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image"> <img src="{{ asset($product->product_thambnail) }}" alt=""> </div>
                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name">
                                                                <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                                                    @if(session()->get('language') == 'bangla')
                                                                        {{ $product->product_name_ban }}
                                                                    @else
                                                                        {{ $product->product_name_en }}
                                                                    @endif
                                                                </a>
                                                            </h3>

                                                            @php
                                                                $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                                                                $avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                                                            @endphp

                                                            <div class="rating-reviews m-t-20">
                                                                @if($avarage == 0)
                                                                    <span class="nry">No Rating Yet</span>
                                                                @elseif($avarage == 1 || $avarage < 2)
                                                                    <i class="fa fa-star checked"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                @elseif($avarage == 2 || $avarage < 3)
                                                                    <i class="fa fa-star checked"></i>
                                                                    <i class="fa fa-star checked"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                @elseif($avarage == 3 || $avarage < 4)
                                                                    <i class="fa fa-star checked"></i>
                                                                    <i class="fa fa-star checked"></i>
                                                                    <i class="fa fa-star checked"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>

                                                                @elseif($avarage == 4 || $avarage < 5)
                                                                    <i class="fa fa-star checked"></i>
                                                                    <i class="fa fa-star checked"></i>
                                                                    <i class="fa fa-star checked"></i>
                                                                    <i class="fa fa-star checked"></i>
                                                                    <i class="fa fa-star"></i>
                                                                @elseif($avarage == 5 || $avarage < 5)
                                                                    <i class="fa fa-star checked"></i>
                                                                    <i class="fa fa-star checked"></i>
                                                                    <i class="fa fa-star checked"></i>
                                                                    <i class="fa fa-star checked"></i>
                                                                    <i class="fa fa-star checked"></i>
                                                                @endif

                                                                <div class="reviews">
                                                                    <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}#review" class="lnk" style="color: grey">({{ count($reviewcount) }} Reviews)</a>
                                                                </div>

                                                            </div><!-- /.rating-reviews -->


                                                            @if ($product->discount_price == NULL)
                                                                <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
                                                            @else
                                                                <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
                                                        @endif

                                                        <!-- /.product-price -->
                                                            <div class="description m-t-10">
                                                                @if(session()->get('language') == 'bangla') {{ $product->short_descp_ban }} @else {{ $product->short_descp_en }} @endif</div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">
                                                                    <ul class="list-unstyled">
                                                                        <li class="add-cart-button btn-group">
                                                                            <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"><i class="fa fa-shopping-cart"></i> </button>
                                                                            <button class="btn btn-primary cart-btn" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)">Add to cart</button>
                                                                        </li>
                                                                        <li class="add-cart-button btn-group">
                                                                            <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)">
                                                                                <i class="icon fa fa-heart"></i>
                                                                            </button>
                                                                        </li>
                                                                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                                                    </ul>
                                                                </div>
                                                                <!-- /.action -->
                                                            </div>
                                                            <!-- /.cart -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                    </div>
                                                    <!-- /.col -->
                                                </div>



                                            @php
                                                $amount = $product->selling_price - $product->discount_price;
                                                $discount = ($amount/$product->selling_price) * 100;
                                            @endphp

                                            <!-- /.product-list-row -->
                                                <div>
                                                    @if ($product->discount_price == NULL)
                                                        <div class="tag new"><span>new</span></div>
                                                    @else
                                                        <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                                    @endif
                                                </div>


                                            </div>
                                            <!-- /.product-list -->
                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.category-product-inner -->
                            @endforeach

                            <!--            //////////////////// Product List View END ////////////// -->

                            </div>
                            <!-- /.category-product -->
                        </div>
                        <!-- /.tab-pane #list-container -->
                    </div>
                    <!-- /.tab-content -->
                    {{ $products->appends($_GET)->links('frontend.vendor.pagination.custom')  }}
                    <!-- /.filters-container -->

                </div>
                <!-- /.search-result-container -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    <!-- /.container -->

        </form>

    </div>
</div>
<!-- /.body-content -->




@endsection
