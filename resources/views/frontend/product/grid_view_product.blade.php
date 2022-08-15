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


                    <div class="description"></div>


                    @if ($product->discount_price == NULL)
                        <div class="product-price"> <span class="price"> ${{ number_format($product->selling_price) }} </span>   </div>

                    @else

                        <div class="product-price">
                            <span class="price"> ${{ number_format($product->discount_price) }} </span>
                            <span class="price-before-discount">$ {{ $product->selling_price }}</span>
                        </div>
                @endif




                <!-- /.product-price -->

                </div>
                <!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                    <div class="action">
                        <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                            </li>
                            <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
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
