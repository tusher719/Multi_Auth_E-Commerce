@extends('frontend.main_master')
@section('content')

@section('title')
    {{ $product->product_name_en }} | Product Details
@endsection
{{-- {{ \App\Models\Category::find($product_singles->category_id)->category_name }} --}}

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}" title="@if(session()->get('language') == 'bangla') ঘর @else Home @endif">
                            <i class="fa fa-home"></i>
                        </a></li>
                    <li><a href="#" title="@if(session()->get('language') == 'bangla') {{ $title->category->category_name_ban }} @else {{ $title->category->category_name_en }} @endif">
                            @if(session()->get('language') == 'bangla')
                                {{ $title->category->category_name_ban }}
                            @else
                                {{ $title->category->category_name_en }}
                            @endif
                        </a></li>
                    <li><a href="#" title="@if(session()->get('language') == 'bangla') {{ $title->subcategory->subcategory_name_ban }} @else {{ $title->subcategory->subcategory_name_en }} @endif">
                            @if(session()->get('language') == 'bangla')
                                {{ $title->subcategory->subcategory_name_ban }}
                            @else
                                {{ $title->subcategory->subcategory_name_en }}
                            @endif
                        </a></li>
                    <li><a href="#" title="@if(session()->get('language') == 'bangla')
                        {{ $title->subsubcategory->subsubcategory_name_ban }} @else {{ $title->subsubcategory->subsubcategory_name_en }} @endif">
                            @if(session()->get('language') == 'bangla')
                                {{ $title->subsubcategory->subsubcategory_name_ban }}
                            @else
                                {{ $title->subsubcategory->subsubcategory_name_en }}
                            @endif
                        </a></li>
                    <li class='active'>
                        @if(session()->get('language') == 'bangla')
                            {{ $product->product_name_ban }}
                        @else
                            {{ $product->product_name_en }}
                        @endif
                    </li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>
                <div class='col-md-3 sidebar'>
                    <div class="sidebar-module-container">
                        <div class="home-banner outer-top-n">
                            <img src="{{ asset('frontend') }}/assets/images/banners/LHS-banner.jpg" alt="Image">
                        </div>



                        <!-- ============================================== HOT DEALS ============================================== -->
                        @include('frontend.common.hot_deals')
                        <!-- ============================================== HOT DEALS: END ============================================== -->

                        <!-- ============================================== NEWSLETTER ============================================== -->
                        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
                            <h3 class="section-title">Newsletters</h3>
                            <div class="sidebar-widget-body outer-top-xs">
                                <p>Sign Up for Our Newsletter!</p>
                                <form>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                                    </div>
                                    <button class="btn btn-primary">Subscribe</button>
                                </form>
                            </div><!-- /.sidebar-widget-body -->
                        </div><!-- /.sidebar-widget -->
                        <!-- ============================================== NEWSLETTER: END ============================================== -->

                        <!-- ============================================== Testimonials============================================== -->
                        @include('frontend.common.testimonials')

                        <!-- ============================================== Testimonials: END ============================================== -->



                    </div>
                </div><!-- /.sidebar -->
                <div class='col-md-9'>
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">

                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">

                                    <div id="owl-single-product">

                                        @foreach($multiImg as $img)
                                            <div class="single-product-gallery-item" id="slide{{ $img->id }}">
                                                <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($img->photo_name) }}">
                                                    <img class="img-responsive" alt="" src="{{ asset($img->photo_name) }}" data-echo="{{ asset($img->photo_name) }}" />
                                                </a>
                                            </div><!-- /.single-product-gallery-item -->
                                        @endforeach

                                    </div><!-- /.single-product-slider -->


                                    <div class="single-product-gallery-thumbs gallery-thumbs">

                                        <div id="owl-single-product-thumbnails">

                                            @foreach($multiImg as $img)
                                                <div class="item">
                                                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{ $img->id }}">
                                                        <img class="img-responsive" width="85" alt="" src="{{ asset($img->photo_name) }}" data-echo="{{ asset($img->photo_name) }}" />
                                                    </a>
                                                </div>
                                            @endforeach

                                        </div><!-- /#owl-single-product-thumbnails -->



                                    </div><!-- /.gallery-thumbs -->

                                </div><!-- /.single-product-gallery -->
                            </div><!-- /.gallery-holder -->
                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name" id="pname">
                                        @if(session()->get('language') == 'bangla')
                                            {{ $product->product_name_ban }}
                                        @else
                                            {{ $product->product_name_en }}
                                        @endif
                                    </h1>

                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="rating rateit-small"></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a href="#" class="lnk">(13 Reviews)</a>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.rating-reviews -->

                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Availability :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    <span class="value">In Stock</span>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.stock-container -->

                                    <div class="description-container m-t-20">
                                        @if(session()->get('language') == 'bangla')
                                            {{ $product->short_descp_ban }}
                                        @else
                                            {{ $product->short_descp_en }}
                                        @endif
                                    </div><!-- /.description-container -->

                                    <div class="price-container info-container m-t-20">
                                        <div class="row">


                                            <div class="col-sm-6">
                                                <div class="price-box">

                                                    @if($product->discount_price == NULL)
                                                        <span class="price">৳{{ number_format($product->selling_price) }}</span>
                                                    @else
                                                        <span class="price">৳{{ number_format($product->discount_price) }}</span>
                                                        <span class="price-strike">৳{{ number_format($product->selling_price) }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="favorite-button m-t-10">
                                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
                                                        <i class="fa fa-signal"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
                                                        <i class="fa fa-envelope"></i>
                                                    </a>
                                                </div>
                                            </div>

                                        </div><!-- /.row -->
                                    </div><!-- /.price-container -->

                                    <!-- Add Product Color And Product Size : Start -->
                                    <div class="m-t-20">
                                        <div class="row">


                                            <div class="col-sm-6">


                                                <div class="form-group">
                                                    <label class="info-title control-label">Chose Color <span> </span></label>
                                                    <select class="form-control unicase-form-control selectpicker" style="display: none;" id="color">
                                                        <option selected disabled>--Chose Color--</option>
                                                        @foreach($product_color_en as $color)
                                                            <option value="{{ $color }}">{{ ucwords($color) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div> <!-- End Form Group -->

                                            </div> <!-- End Col 6 -->

                                            <div class="col-sm-6">

                                                <div class="form-group">
                                                    @if($product->product_size_en == null)
                                                    @else
                                                        <label class="info-title control-label">Chose Size <span> </span></label>
                                                        <select class="form-control unicase-form-control selectpicker" style="display: none;" id="size">
                                                            <option selected disabled>--Chose Size--</option>
                                                            @foreach($product_size_en as $size)
                                                                <option value="{{ $size }}">{{ ucwords($size) }}</option>
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                </div> <!-- End Form Group -->

                                            </div> <!-- End Col 6 -->

                                        </div> <!-- /.row -->
                                    </div>
                                    <!-- Add Product Color And Product Size : End -->

                                    <div class="quantity-container info-container">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <span class="label">Qty :</span>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <div class="arrows">
                                                            <div class="arrow plus gradient">
                                                                <span class="ir plus">
                                                                    <i class="icon fa fa-sort-asc"></i>
                                                                </span>
                                                            </div>
                                                            <div class="arrow minus gradient">
                                                                <span class="ir minus">
                                                                    <i class="icon fa fa-sort-desc"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <input type="text" id="qty" class="num" value="1" min="1">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-7">
                                                <input type="hidden" id="product_id" value="{{ $product->id }}" min="1">
                                                <button type="submit" class="btn btn-primary" onclick="addToCart()">
                                                    <i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART
                                                </button>
                                            </div>


                                        </div><!-- /.row -->
                                    </div><!-- /.quantity-container -->


                                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                    <div class="addthis_inline_share_toolbox_a9on"></div>









                                </div><!-- /.product-info -->
                            </div><!-- /.col-sm-7 -->
                        </div><!-- /.row -->
                    </div>

                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                    <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                    <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                                </ul><!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-9">

                                <div class="tab-content">

                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text">
                                                @if(session()->get('language') == 'bangla') {!! $product->long_descp_ban !!} @else {!! $product->long_descp_en !!} @endif
                                            </p>
                                        </div>
                                    </div><!-- /.tab-pane -->

                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">

                                            <div class="product-add-review">
                                                <h4 class="title">Write your own review</h4>
                                                @guest
                                                    <p>
                                                        <strong> For Add Product Review. You Need to Login First
                                                            <a style="color: #ff7878;" href="{{ route('login') }}">Login Here</a>
                                                        </strong>
                                                    </p>
                                                @else
                                                    <div class="review-table">
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div><!-- /.review-table -->

                                                    <div class="form-container">

                                                        <form role="form" class="cnt-form" method="post" action="{{ route('review.store') }}">
                                                            @csrf

                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                                                            <div class="row">
                                                                <div class="col-sm-6">

                                                                    <div class="form-group">
                                                                        <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                                                        <input type="text" name="summary" class="form-control txt" id="exampleInputSummary" placeholder="Write summary">
                                                                    </div><!-- /.form-group -->
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                                        <textarea name="comment" class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder="Write your review"></textarea>
                                                                    </div><!-- /.form-group -->
                                                                </div>
                                                            </div><!-- /.row -->

                                                            <div class="action text-right">
                                                                <button type="submit" class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                            </div><!-- /.action -->

                                                        </form><!-- /.cnt-form -->
                                                    </div><!-- /.form-container -->
                                                @endguest

                                            </div><!-- /.product-add-review -->


                                            <div class="product-reviews">
                                                <h4 class="title">Customer Reviews</h4>

                                                @php
                                                    $reviews = \App\Models\Review::where('product_id',$product->id)->latest()->get();
                                                @endphp
                                                <div class="reviews">

                                                    @foreach($reviews as $item)
                                                        @if($item->status == 0)

                                                        @else
                                                            <div class="review">

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <img style="height: 40px; width:40px; border-radius: 50%; object-fit: cover;" src="{{ (!empty($item->user->profile_photo_path))? url('uploads/user_images/'.$item->user->profile_photo_path):url('upload/no_image.jpg') }}"><b> {{ $item->user->name }}</b>
                                                                    </div>

                                                                    <div class="col-md-6">

                                                                    </div>
                                                                </div> <!-- // end row -->

                                                                <div class="review-title">
                                                                        <i style="color: #daa520" class="fa fa-star"></i>
                                                                        <i style="color: #daa520" class="fa fa-star"></i>
                                                                        <i style="color: #daa520" class="fa fa-star"></i>
                                                                        <i style="color: #daa520" class="fa fa-star-half-o"></i>
                                                                        <i style="color: #daa520" class="fa fa-star-o"></i>

                                                                    <span class="summary" style="color: #ff7878; font-weight: 600;">{{ $item->summary }}</span>
                                                                </div>
                                                                <div class="review-title" style="color: #666666">
                                                                    <span>Reviewed on </span>
                                                                    <span class="date">{{ $item['created_at']->format('F d, Y') }}</span>
                                                                </div>
                                                                <div class="text">"{{ $item->comment }}"</div>
                                                            </div>
                                                        @endif
                                                    @endforeach

                                                </div><!-- /.reviews -->
                                            </div><!-- /.product-reviews -->


                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                    <div id="tags" class="tab-pane">
                                        <div class="product-tag">

                                            <h4 class="title">Product Tags</h4>
                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-container">

                                                    <div class="form-group">
                                                        <label for="exampleInputTag">Add Your Tags: </label>
                                                        <input type="email" id="exampleInputTag" class="form-control txt">


                                                    </div>

                                                    <button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
                                                </div><!-- /.form-container -->
                                            </form><!-- /.form-cnt -->

                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
                                                </div>
                                            </form><!-- /.form-cnt -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                </div><!-- /.tab-content -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.product-tabs -->

                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">Related products</h3>
                        <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

                            @foreach($relatedProduct as $product)
                                <div class="item item-carousel">
                                <div class="products">

                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                                                    <img  src="{{ asset($product->product_thambnail) }}" alt="">
                                                </a>
                                            </div><!-- /.image -->

                                            @php
                                                $amount = $product->selling_price - $product->discount_price;
                                                $discount = ($amount/$product->selling_price) * 100;
                                            @endphp

                                            @if($product->discount_price == NULL)
                                                <div class="tag new"><span>new</span></div>
                                            @else
                                                <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                            @endif
                                        </div><!-- /.product-image -->


                                        <div class="product-info text-left">
                                            <h3 class="name">
                                                <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                                                    @if(session()->get('language') == 'bangla')
                                                        {{ $product->product_name_ban }}
                                                    @else
                                                        {{ $product->product_name_en }}
                                                    @endif
                                                </a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            @if($product->discount_price == NULL)
                                                <div class="product-price">
                                                    <span class="price">৳{{ number_format($product->selling_price) }}</span>
                                                </div><!-- /.product-price -->
                                            @else
                                                <div class="product-price">
                                                    <span class="price">৳{{ number_format($product->discount_price) }}</span>
                                                    <span class="price-before-discount">৳ {{ number_format($product->selling_price) }}</span>
                                                </div><!-- /.product-price -->
                                            @endif

                                        </div><!-- /.product-info -->
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

                                                    <li class="lnk">
                                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                                            <i class="fa fa-signal"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->

                                </div><!-- /.products -->
                            </div><!-- /.item -->
                            @endforeach
                        </div><!-- /.home-owl-carousel -->
                    </section><!-- /.section -->
                    <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

                </div><!-- /.col -->
                <div class="clearfix"></div>
            </div><!-- /.row -->

























            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
        <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.body-content -->


        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-62e35779e887ff28"></script>


@endsection
