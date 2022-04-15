@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Product Details</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Products</li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('manage-product') }}">Manage Product</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Product Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
            <div class="row">
                <div class="col-md-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Product Details</h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Brand Name</h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" value="{{ $products['brands']['brand_name_en'] }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Category Name</h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" value="{{ $products['category']['category_name_en'] }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>SubCategory Name</h5>
                                        <div class="controls mt-3">
                                            <input type="text" class="form-control" value="{{ $products['subcategory']['subcategory_name_en'] }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>SubSubCategory Name</h5>
                                        <div class="controls mt-3">
                                            <input type="text" class="form-control" value="{{ $products['subsubcategory']['subsubcategory_name_en'] }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Product Name English</h5>
                                        <div class="controls mt-3">
                                            <input type="text" name="product_name_en" class="form-control" value="{{ $products->product_name_en }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Product Name English</h5>
                                        <div class="controls mt-3">
                                            <input type="text" name="product_name_en" class="form-control" value="{{ $products->product_name_en }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Product Name Bangla</h5>
                                        <div class="controls mt-3">
                                            <input type="text" name="product_name_en" class="form-control" value="{{ $products->product_name_ban }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Code</h5>
                                        <div class="controls mt-3">
                                            <input type="text" name="product_code" class="form-control" value="{{ $products->product_code }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Quantity</h5>
                                        <div class="controls mt-3">
                                            <input type="text" name="product_code" class="form-control" value="{{ $products->product_qty }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Tag English</h5>
                                        <div class="controls mt-3">
                                            <input type="text" name="product_tags_en" class="form-control" value="{{ $products->product_tags_en }}" data-role="tagsinput" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Tag Bangla</h5>
                                        <div class="controls mt-3">
                                            <input type="text" name="product_tags_ban" class="form-control" value="{{ $products->product_tags_ban }}" data-role="tagsinput" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Size English</h5>
                                        <div class="controls mt-3">
                                            <input type="text" name="product_size_en" class="form-control" value="{{ $products->product_size_en }}" data-role="tagsinput" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Size Bangla</h5>
                                        <div class="controls mt-3">
                                            <input type="text" name="product_size_en" class="form-control" value="{{ $products->product_size_ban }}" data-role="tagsinput" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Color English</h5>
                                        <div class="controls mt-3">
                                            <input type="text" name="product_size_en" class="form-control" value="{{ $products->product_color_en }}" data-role="tagsinput" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Color Bangla</h5>
                                        <div class="controls mt-3">
                                            <input type="text" name="product_size_en" class="form-control" value="{{ $products->product_color_ban }}" data-role="tagsinput" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Selling Price</h5>
                                        <div class="controls mt-3">
                                            <input type="text" name="selling_price" class="form-control" value="{{ $products->selling_price }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Discoundt Price</h5>
                                        <div class="controls mt-3">
                                            <input type="text" name="selling_price" class="form-control" value="{{ $products->discount_price }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Short Description English</h5>
                                        <div class="controls mt-3">
                                            <textarea name="short_descp_en" rows="5" id="textarea" class="form-control" placeholder="Textarea text" readonly>
                                                {!! $products->short_descp_en !!}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Short Description English</h5>
                                        <div class="controls mt-3">
                                            <textarea name="short_descp_en" rows="5" id="textarea" class="form-control" placeholder="Textarea text" readonly>
                                                {!! $products->short_descp_ban !!}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Long Description English <span class="text-danger">*</span></h5>
                                        <div class="controls">
	<textarea id="editor1" name="long_descp_ban" rows="10" cols="80">
		{!! $products->long_descp_en !!}
						</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Long Description Bangla <span class="text-danger">*</span></h5>
                                        <div class="controls">
	<textarea id="editor2" name="long_descp_ban" rows="10" cols="80">
		{!! $products->long_descp_ban !!}
						</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls mt-3">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_2" name="hot_deals" value="1" {{ $products->hot_deals == 1 ? 'checked': '' }}>
                                                    <label for="checkbox_2">Hot Deals</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_3" name="featured" value="1" {{ $products->featured == 1 ? 'checked': '' }}>
                                                    <label for="checkbox_3">Featured</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls mt-3">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{ $products->special_offer == 1 ? 'checked': '' }}>
                                                    <label for="checkbox_4">Special Offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_5" name="special_deals" value="1" {{ $products->special_deals == 1 ? 'checked': '' }}>
                                                    <label for="checkbox_5">Special Deals</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- Left sile end -->

                <div class="col-md-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Product Thambnail Image</h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="controls">
                                            <img src="{{ asset($products->product_thambnail) }}" class="card-img-top" style="height: auto; width: auto; object-fit: cover;">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Product Multiple Image</h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                @foreach($multiImgs as $img)
                                    <div class="col-md-6">

                                        <div class="card">
                                            <img class="img-rounded" src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: auto; width: auto; object-fit: cover;">
                                        </div>

                                    </div><!--  end col md 3		 -->
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div> <!-- Right sile end -->
            </div>
        </div>
    </div>


    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $('select[name="subsubcategory_id"]').html('');
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });



            $('select[name="subcategory_id"]').on('change', function(){
                var subcategory_id = $(this).val();
                if(subcategory_id) {
                    $.ajax({
                        url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });


        });
    </script>


    <script type="text/javascript">
        function mainThamUrl(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThmb').attr('src',e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


    <script>

        $(document).ready(function(){
            $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

    </script>




@endsection
