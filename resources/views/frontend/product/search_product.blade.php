{{--<ul>--}}
{{--    @foreach($products as $item)--}}
{{--        <li> <img src="{{ asset($item->product_thambnail) }}" style="width: 30px; height: 30px;"> {{ $item->product_name_en }}  </li>--}}
{{--    @endforeach--}}

{{--</ul>--}}



<style>

    body {
        background-color: #eee
    }
    .card {
        background-color: #f6f6f66;
        padding: 10px;
        border: none
    }
    .input-box {
        position: relative
    }
    .input-box i {
        position: absolute;
        right: 13px;
        top: 15px;
        color: #ced4da
    }
    .form-control {
        height: 50px;
        background-color: #eeeeee69
    }
    .form-control:focus {
        background-color: #eeeeee69;
        box-shadow: none;
        border-color: #eee;
    }
    .list {
        padding: 10px 8px;
        display: flex;
        align-items: center
    }
    .list:hover {
        padding: 10px 8px;
        background-color: #ddd;
        box-shadow: none;
        border-color: #eee;
    }
    .border-bottom {
        border-bottom: 2px solid #eee;
    }
    .list i {
        font-size: 19px;
        color: red
    }
    .list small {
        color: grey;;
    }
</style>

@if($products -> isEmpty())
    <h3 class="text-center text-danger">Product Not Found </h3>
@else

    <div class="container mt-5">
        <div class="row d-flex justify-content-center ">
            <div class="col-md-6">
                <div class="card">

                    @foreach($products as $item)
                        <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
                            <div class="list border-bottom">  <img src="{{ asset($item->product_thambnail) }}" style="width: 30px; height: 30px;">

                                <div class="d-flex flex-column ml-3" style="margin-left: 10px;">
                                    <span>{{ $item->product_name_en }} </span>
                                    <small style="margin-left: 4px;">
                                        @if($item->discount_price == NULL)
                                            ${{ number_format($item->selling_price) }}
                                        @else
                                            ${{ number_format($item->discount_price) }}
                                        @endif
                                    </small>
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endif
