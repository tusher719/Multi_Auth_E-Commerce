@php
    $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
    $avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
@endphp

<div class="rating-reviews m-t-10">
    <div class="row">
        <div class="col-sm-12">

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

        <div class="col-sm-12">
            <div class="reviews">
                <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}" class="lnk" style="color: grey">({{ count($reviewcount) }} Reviews)</a>
            </div>
        </div>
    </div><!-- /.row -->
</div><!-- /.rating-reviews -->
