<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/main.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/blue.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/owl.transitions.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/rateit.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap-select.min.css">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/font-awesome.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- toastr Cdn -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <!-- Stripe payment js -->
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu -->

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery-1.11.1.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/bootstrap-hover-dropdown.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/echo.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery.easing-1.3.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/bootstrap-slider.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery.rateit.min.js"></script>
<script type="text/javascript" src="{{ asset('frontend') }}/assets/js/lightbox.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/bootstrap-select.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/wow.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/scripts.js"></script>
<!-- Sweetalert Toastr Script -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Toastr Script -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
    // Start Laravel Toster
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
    // End Laravel Toster



    // Start Image Preview
    $(document).ready(function () {
        $('#image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
    // End Image Preview

    // Start Increment and Decrement
    let plusBtn = document.querySelector('.plus');
    minusBtn = document.querySelector('.minus');
    numBtn = document.querySelector('.num');

    plusBtn.addEventListener('click', ()=>{
        numBtn.value = parseInt(numBtn.value) + 1;
    });

    minusBtn.addEventListener('click', ()=>{
        if (numBtn.value <= 0) {
            numBtn.value = 0;
        } else {
            numBtn.value = parseInt(numBtn.value) - 1;
        }
    });
    // End Increment and Decrement

</script>


<!-- Add to Cart Product Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-right" style="margin-bottom: 5px">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel" style="font-size: 30px">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-6">

                        <div class="card">
                            <img src="" id="pimage" class="card-img-top img-thumbnail" alt="...">
                        </div>

                    </div> <!-- End col md -->
                    <div class="col-lg-7 col-md-6 col-sm-6">

                        <div class="">
                            <!-- Product Name -->
                            <h4 class="modal-title" id="exampleModalLabel">
                                <strong> <span id="pname"></span> </strong>
                            </h4>

                            <!-- Product Rating -->
                            <div class="rateit-small m-t-10">
                                <button id="rateit-reset-5" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-5" style="display: none;"></button>
                                <div id="rateit-range-5" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-5" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;">
                                    <div class="rateit-selected" style="height: 14px; width: 56px;"></div>
                                </div> <span style="font-size: 12px; color: grey; margin-top: -2px">(15 Review)</span>
                            </div>

                            <div class="product-list-in-box m-t-10">
                                <span class="font-size-14" style="font-size: 14px; font-weight: 700">Stock:</span>
                                <span class="badge badge-pill badge-success" id="aviable" style="background: #4caf50; color: #fff;"></span>
                                <span class="badge badge-pill badge-danger" id="stockout" style="background: #ff7878; color: #fff;"></span>
                            </div>

                            <!-- Product Price -->
                            <div class="price-box">
                                <span class="price" style="color: #ff5722; font-size: 30px; font-weight: 700; line-height: 50px;">
                                    ৳<span id="pprice"></span>
                                </span>
                                <span class="price-strike" id="oldprice" style="color: #aaa; font-size: 16px; font-weight: 400; line-height: 50px; text-decoration: line-through;"></span>
                            </div>

                            <!-- Product Description -->
                            <div class="description-container m-t-10" style="font-size: 15px; line-height: 24px;">
                                <span id="pdesp"></span>
                            </div>
                            <div class="info-container" style="border-bottom: 1px solid #e1e1e1; margin: 10px 0"></div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label for="color">Chose Color:</label>
                                        <select class="form-control" id="color" name="color">

                                        </select>
                                    </div> <!-- End Form Group -->
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="form-group" id="sizeArea">
                                        <label for="size">Chose Size:</label>
                                        <select class="form-control" id="size" name="size">

                                        </select>
                                    </div> <!-- End Form Group -->
                                </div>
                            </div>

                            <div class="info-container" style="border-bottom: 1px solid #e1e1e1; margin: 10px 0"></div>

                            <!-- Add to cart -->
                            <div class="row">

                                <div class="col-sm-2">
                                    <label class="label" for="qty" style="font-size: 14px; color: #333; line-height: 34px; padding: 0;">Quantity :</label>
                                </div>

                                <div class="col-md-2 col-sm-2">
                                    <div class="cart-quantity">
                                        <div class="quant-input">
                                            <input class="form-control" id="qty" type="number" value="1" min="1">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7 col-sm-7">
                                    <input type="hidden" id="product_id">
                                    <button type="submit" class="btn btn-primary" onclick="addToCart()"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
                                </div>

                            </div><!-- /.row -->

                            <div class="info-container" style="border-bottom: 1px solid #e1e1e1; margin: 10px 0"></div>

                            <!-- Product Code, Category, Brand -->
                            <div>
                                <div class="product-list-in-box">
                                    <span class="font-size-14" style="font-weight: 700">Product Code:</span> <span id="pcode" class="font-size-14"></span>
                                </div>
                                <div class="product-list-in-box">
                                    <span class="font-size-14" style="font-weight: 700">Category:</span> <span id="pcategory" class="font-size-14"></span>
                                </div>
                                <div class="product-list-in-box">
                                    <span class="font-size-14" style="font-weight: 700">Brand:</span> <span id="pbrand" class="font-size-14"></span>
                                </div>
                            </div>

                            <div class="info-container" style="border-bottom: 1px solid #e1e1e1; margin: 10px 0"></div>

                            <!-- Product Code, Category, Brand -->
                            <div class="social" style="display: flex; align-items: center">
                                <span class="font-size-16" style="font-weight: 700;">Share:</span>
                                <ul class="link">
                                    <li class="fb pull-left"><a target="_blank" href="#" data-toggle="tooltip" title="Facebook" style="background: transparent !important; color: #3C5B9B;"></a></li>
                                    <li class="tw pull-left"><a target="_blank" href="#" data-toggle="tooltip" title="Twitter" style="background: transparent !important; color: #359BED;"></a></li>
                                    <li class="linkedin pull-left"><a target="_blank" href="#" data-toggle="tooltip" title="Linkedin" style="background: transparent !important; color: #027ba5;"></a></li>
                                    <li class="youtube pull-left"><a target="_blank" href="#" data-toggle="tooltip" title="Youtube" style="background: transparent !important; color: #F03434;"></a></li>
                                </ul>
                            </div>


                        </div>

                    </div> <!-- End col md -->
                </div>

            </div> <!-- End Body -->
        </div>
    </div>
</div>
<!-- Add to Cart Product Modal : End -->

<script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })

    // Start Product View with Modal
    function productView(id) {
        $.ajax({
            type: 'GET',
            url: '/product/view/modal/'+id,
            dataType: 'json',
            success: function (data) {
                // console.log(data)
                $('#pname').text(data.product.product_name_en);
                $('#pdesp').text(data.product.short_descp_en);
                $('#price').text(data.product.selling_price);
                $('#pcode').text(data.product.product_code);
                $('#pcategory').text(data.product.category.category_name_en);
                $('#pbrand').text(data.product.brands.brand_name_en);
                $('#pimage').attr('src','/'+data.product.product_thambnail);
                $('#product_id').val(id);
                $('#qty').val(1);

                // Product Price
                if (data.product.discount_price == null) {
                    $('#pprice').text('');
                    $('#oldprice').text('');
                    $('#pprice').text(data.product.selling_price);
                } else {
                    $('#pprice').text(data.product.discount_price);
                    $('#oldprice').text('৳ '+data.product.selling_price);
                }

                // Start Stock Option
                if (data.product.product_qty > 0) {
                    $('#aviable').text('');
                    $('#stockout').text('');
                    $('#aviable').text('In Stock');
                } else {
                    $('#aviable').text('');
                    $('#stockout').text('');
                    $('#stockout').text('Stock Out');
                }

                // Color
                $('select[name="color"]').empty();
                $.each(data.color, function (key,value) {
                    $('select[name="color"]').append('<option value=" '+value+' "> '+value+' </option>')
                })

                // Size
                $('select[name="size"]').empty();
                $.each(data.size, function (key,value) {
                    $('select[name="size"]').append('<option value=" '+value+' "> '+value+' </option>')
                })

                if (data.size == "") {
                    $('#sizeArea').hide();
                } else {
                    $('#sizeArea').show();
                }
            }
        })
    }
    // End Product View with Modal


    // Start Add To Cart Product
    function addToCart() {
        var product_name = $('#pname').text();
        var id = $('#product_id').val();
        var color = $('#color option:selected').text();
        var size = $('#size option:selected').text();
        var quantity = $('#qty').val();
        var brand = $('#pbrand').text()

        $.ajax({
            type: "POST",
            dataType: 'json',
            data: {
                color:color, size:size, quantity:quantity, brand:brand, product_name:product_name
            },
            url: "/cart/data/store/"+id,
            success:function (data) {
                miniCart()
                $('#closeModel').click();
                // console.log(data)

                // Start Message

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        icon: 'success',
                        icon: 'success',
                        title: data.success
                    })
                } else {
                    Toast.fire({
                        icon: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }

                // End Message
            }
        })

    }

    // End Add To Cart Product

</script>

<script type="text/javascript">

    // Start Mini Cart
    function miniCart() {
        $.ajax({
            type: "GET",
            url: '/product/mini/cart',
            dataType: 'json',
            success:function (response) {
                $('span[id="cartSubTotal"]').text(response.cartSubTotal);
                $('#cartQty').text(response.cartQty);
                $('#myCartQty').text(response.myCartQty);
                var miniCart = ""

                $.each(response.carts, function (key,value) {
                    miniCart += `<div class="cart-item product-summary">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                                            <div class="price">৳${value.price} <span style="color: grey">*</span> ${value.qty}</div>
                                        </div>
                                        <div class="col-xs-1 action">
                                            <button class="btn btn-sm" type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.cart-item -->
                    <div class="clearfix"></div>
                    <hr>`

                });

                $('#miniCart').html(miniCart);
            }
        })
    }
    miniCart();
    // End Mini Cart

    // Start Mini Cart Remonve
    function miniCartRemove(rowId){
        $.ajax({
            type: 'GET',
            url: '/minicart/product-remove/'+rowId,
            dataType:'json',
            success:function(data){
            miniCart();
             // Start Message
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000,
                      timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message
            }
        });
    }
    // End Mini Cart Remonve

</script>

{{-- Start Add WishList Page --}}
<script type="text/javascript">
    function addToWishList(product_id) {
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: '/add-to-wishlist/'+product_id,

            success:function (data) {

                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message

            }
        })
    }
</script>
{{-- End Add WishList Page --}}

<!-- Start WishList -->
<script type="text/javascript">
    function wishlist(){
        $.ajax({
            type: 'GET',
            url: '/user/get-wishlist-product',
            dataType:'json',
            success:function(response){
                var rows = ""
                $.each(response, function(key,value){
                    rows += `<tr>
                    <td class="col-md-2"><img class="img-thumbnail" src="/${value.product.product_thambnail} " alt="imga"></td>
                    <td class="col-md-7">
                        <div class="product-name"><a href="#">${value.product.product_name_en}</a></div>

                        <div class="price">
                        ৳${value.product.discount_price == null
                        ? `${value.product.selling_price}`
                        :
                        `${value.product.discount_price} <span>৳ ${value.product.selling_price}</span>`
                    }

                        </div>
                    </td>
        <td class="col-md-2">
            <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)"> Add to Cart </button>
        </td>
        <td class="col-md-1 close-btn">
            <button type="submit" class="btn" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fa fa-times"></i></button>
        </td>
                </tr>`
                });

                $('#wishlist').html(rows);
            }
        })
    }
    wishlist();





    // Start WishList Remove
    function wishlistRemove(id){
        $.ajax({
            type: 'GET',
            url: '/user/wishlist-remove/'+id,
            dataType:'json',
            success:function(data){
                wishlist();

                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message
            }
        });
    }
    // End WishList Remove
</script>
<!-- Start WishList -->


<!-- Start My Cart -->
<script type="text/javascript">
    function myCart(){
        $.ajax({
            type: 'GET',
            url: '/user/get-cart-product',
            dataType:'json',
            success:function(response){
                var rows = ""
                $.each(response.carts, function(key,value){
                    rows += `<tr>
                    <td class="romove-item">
                        <button href="#" title="cancel" class="icon" id="${value.rowId}" onclick="cardRemove(this.id)">
                            <i class="fa fa-trash-o"></i></button>
                    </td>
                    <td class="col-md-1">
                        <img class="img-thumbnail" src="/${value.options.image} " alt="imga">
                    </td>
                    <td class="cart-product-name-info">
                        <h4 class='cart-product-description'><a href="#">${value.name}</a></h4>

                        <div class="cart-product-info">
                            <span class="product-color">Brand:<span> ${value.options.brand}, </span></span>
                            <span class="product-color">Color:<span> ${value.options.color}, </span></span>
                            ${value.options.size == null
                                ? ``
                                :
                                `<span class="product-color">Size:<span> ${value.options.size}, </span></span>`
                            }
                        </div>
                    </td>

                    <td class="cart-product-quantity">
                        <div class="cart-quantity">
                            <div class="quant-input">
                                <div class="arrows">
                                    <div class="arrow plus gradient">
                                        <span class="ir" id="${value.rowId}" onclick="cardIncrement(this.id)">
                                            <i class="icon fa fa-plus"></i>
                                        </span>
                                    </div>
                                    <div class="arrow minus gradient">
                                        ${value.qty > 1
                                            ?
                                            `<span class="ir" id="${value.rowId}" onclick="cardDecrement(this.id)">
                                                <i class="icon fa fa-minus"></i>
                                            </span>`
                                            :
                                            `<span class="ir" style="cursor: not-allowed; color: gray">
                                                <i class="icon fa fa-minus"></i>
                                            </span>`

                                        }

                                    </div>
                                </div>
                                <input type="text" value="${value.qty}">
                            </div>
                        </div>

                    </td>

                    <td class="cart-product-sub-total">
                        <span class="cart-sub-total-price">৳${value.price}</span>
                    </td>
                    <td class="cart-product-grand-total">
                        <span class="cart-grand-total-price" style="font-weight: 700">৳${value.subtotal}</span>
                    </td>

                </tr>`
                });

                $('#cartPage').html(rows);
            }
        })
    }
    myCart();





    // Start Cart Remove
    function cardRemove(id){
        $.ajax({
            type: 'GET',
            url: '/user/cart-remove/'+id,
            dataType:'json',
            success:function(data){
                couponCalculation();
                myCart();
                miniCart();
                $('#couponField').show();
                $('#coupon_name').val('');

                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message
            }
        });
    }
    // End Cart Remove

    //===== Start Card Increment =====//
    function cardIncrement(rowId) {
        $.ajax({
            type: 'GET',
            url: '/cart-increment/' + rowId,
            dataType: 'json',
            success: function (data) {
                couponCalculation();
                myCart();
                miniCart();
            }
        });
    }
    //===== End Card Increment =====//

    //===== Start Card Decrement =====//
    function cardDecrement(rowId) {
        $.ajax({
            type: 'GET',
            url: '/cart-decrement/' + rowId,
            dataType: 'json',
            success: function (data) {
                couponCalculation();
                myCart();
                miniCart();
            }
        });
    }
    //===== End Card Decrement =====//
</script>

<!--  //////////////// =========== Coupon Apply Start ================= ////  -->
<script type="text/javascript">
    function applyCoupon(){
        var coupon_name = $('#coupon_name').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {coupon_name:coupon_name},
            url: "{{ url('/coupon-apply') }}",
            success:function(data){
                couponCalculation();
                if (data.validity == true) {
                    $('#couponField').hide();
                }
                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message
            }
        })
    }



    function couponCalculation(){
        $.ajax({
            type: 'GET',
            url: "{{ url('/coupon-calculation') }}",
            dataType: 'json',
            success:function(data){
                if (data.total) {
                    $('#couponCalField').html(
                        `<tr>
                            <th>
                                <div class="cart-sub-total">
                                    Subtotal<span class="inner-left-md">৳ ${data.total}</span>
                                </div>
                                <div class="cart-grand-total">
                                    Grand Total<span class="inner-left-md">৳ ${data.total}</span>
                                </div>
                            </th>
                        </tr>`
                    )
                } else {
                    $('#couponCalField').html(
                        `<tr>
                            <th style="display: flex; justify-content: flex-end">
                                <table>
                                    <tr>
                                        <th style="padding: 4px 4px 4px 4px; font-size: 14px; color: #555;">Sub Total</th>
                                        <th style="padding: 4px">:</th>
                                        <th style="padding: 4px 4px 4px 20px; font-size: 14px; color: #555;">৳ ${data.subtotal}</th>
                                    </tr>
                                    <tr>
                                        <th style="padding: 4px 4px 4px 4px; font-size: 14px; color: #555;">Coupon</th>
                                        <th style="padding: 4px">:</th>
                                        <th style="padding: 4px 4px 4px 20px; font-size: 14px; color: #555;">
                                            ${data.coupon_name} <button type="submit" onclick="couponRemove()" title="Remove this coupon" style="background: transparent; border: 1px solid red; border-radius: 50%; color: #ff0000; font-size: 12px;"><i class="fa fa-times"></i> </button>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="padding: 4px 4px 4px 4px; font-size: 14px; color: #555;">Discount</th>
                                        <th style="padding: 4px">:</th>
                                        <th style="padding: 4px 4px 4px 20px; font-size: 14px; color: #555;">${data.coupon_discount}%</th>
                                    </tr>
                                    <tr>
                                        <th style="padding: 4px 4px 4px 4px; font-size: 14px; color: #555;">Your Saved</th>
                                        <th style="padding: 4px">:</th>
                                        <th style="padding: 4px 4px 4px 20px; font-size: 14px; color: #555;">৳ ${data.discount_amount}</th>
                                    </tr>
                                    <tr>
                                        <th style="padding: 4px 4px 4px 4px; font-size: 14px; color: #84b943;">Grand Total</th>
                                        <th style="padding: 4px">:</th>
                                        <th style="padding: 4px 4px 4px 20px; font-size: 14px; color: #84b943;">৳ ${data.total_amount}</th>
                                    </tr>
                                </table>
                                <!-- <div class="cart-sub-total">
                                    Subtotal<span class="inner-left-md">$ ${data.subtotal}</span>
                                </div>
                                <div class="cart-sub-total">
                                    Coupon<span class="inner-left-md">${data.coupon_name}</span>
                                    <button type="submit" onclick="couponRemove()" title="This button is coupon close" style="background: transparent; border: 1px solid red; border-radius: 50%; color: red; font-size: 12px;"><i class="fa fa-times"></i> </button>
                                </div>
                                <div class="cart-sub-total">
                                    Discount Amount<span class="inner-left-md text-danger">$ ${data.discount_amount}</span>
                                </div>
                                <div class="cart-grand-total">
                                    Grand Total<span class="inner-left-md">$ ${data.total_amount}</span>
                                </div> -->
                            </th>
                        </tr>`
                    )
                }
            }
        });
    }
    couponCalculation();
</script>
<!--  //////////////// =========== End Coupon Apply Start ================= ////  -->


<!--  //////////////// =========== End Coupon Apply Start ================= ////  -->


<!--  //////////////// =========== Start Coupon Remove================= ////  -->

<script type="text/javascript">

    function couponRemove(){
        $.ajax({
            type:'GET',
            url: "{{ url('/coupon-remove') }}",
            dataType: 'json',
            success:function(data){
                couponCalculation();
                $('#couponField').show();
                $('#coupon_name').val('');
                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message
            }
        });
    }
</script>


<!--  //////////////// =========== End Coupon Remove================= ////  -->

</body>
</html>
