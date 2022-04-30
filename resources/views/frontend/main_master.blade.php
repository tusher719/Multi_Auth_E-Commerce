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

<!-- toastr Script -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
    // Laravel Toster
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



    // Image Preview
    $(document).ready(function () {
        $('#image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>


<!-- Add to Cart Product Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <strong> <span id="pname"></span> </strong>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-4">

                        <div class="card">
                            <img src="" id="pimage" class="card-img-top" alt="..." style="height: 200px; width: 200px; object-fit: cover">
                        </div>

                    </div> <!-- End col md -->
                    <div class="col-md-4">

                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Product:</strong>
                                <strong class="text-primary">
                                    $ <span id="pprice"></span>
                                </strong>
                                <del class="text-danger" id="oldprice"> </del>
                            </li>
                            <li class="list-group-item">
                                <strong>Product Code:</strong> <span id="pcode"></span>
                            </li>
                            <li class="list-group-item">
                                <strong>Category:</strong> <span id="pcategory"></span>
                            </li>
                            <li class="list-group-item">
                                <strong>Brand:</strong> <span id="pbrand"></span>
                            </li>
                            <li class="list-group-item">
                                <strong>Stock:</strong>
                                <span class="badge badge-pill badge-success" id="aviable" style="background: green; color: #fff;"></span>
                                <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color: #fff;"></span>
                            </li>
                        </ul>

                    </div> <!-- End col md -->
                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Chose Color:</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="color">

                            </select>
                        </div> <!-- End Form Group -->


                        <div class="form-group" id="sizeArea">
                            <label for="exampleFormControlSelect1">Chose Size:</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="size">

                            </select>
                        </div> <!-- End Form Group -->


                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Quantity:</label>
                            <input type="text" class="form-control" value="1" min="1">
                        </div> <!-- End Form Group -->

                    </div> <!-- End col md -->
                    <div class="col-md-12">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary mb-2"> Add to Card</button>
                        </div>
                    </div> <!-- End col md -->
                </div>

            </div> <!-- End Body -->
        </div>
    </div>
</div>
<!-- Add to Cart Product Modal : End -->

<script type="text/javascript">
    $.ajexSetup({
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
                $('#price').text(data.product.selling_price);
                $('#pcode').text(data.product.product_code);
                $('#pcategory').text(data.product.category.category_name_en);
                $('#pbrand').text(data.product.brands.brand_name_en);
                $('#pimage').attr('src','/'+data.product.product_thambnail);

                // Product Price
                if (data.product.discount_price == null) {
                    $('#pprice').text('');
                    $('#oldprice').text('');
                    $('#pprice').text(data.product.selling_price);
                } else {
                    $('#pprice').text(data.product.discount_price);
                    $('#oldprice').text(data.product.selling_price);
                }

                // Start Stock Option
                if (data.product.product_qty > 0) {
                    $('#aviable').text('');
                    $('#stockout').text('');
                    $('#aviable').text('Aviable');
                } else {
                    $('#aviable').text('');
                    $('#stockout').text('');
                    $('#stockout').text('StockOut');
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

</script>


</body>
</html>
