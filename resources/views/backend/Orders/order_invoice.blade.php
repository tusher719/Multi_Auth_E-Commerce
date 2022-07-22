<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        table{
            font-size: x-small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }
        .gray {
            background-color: lightgray
        }
        .font{
            font-size: 15px;
        }
        .authority {
            /*text-align: center;*/
            float: right
        }
        .authority h5 {
            margin-top: -10px;
            color: #03a9f4;
            /*text-align: center;*/
            margin-left: 35px;
        }
        .thanks p {
            color: #03a9f4;;
            font-size: 24px;
            font-weight: normal;
            font-family: serif;
            margin-top: 20px;
        }
    </style>

</head>
<body>

<table width="100%" style="background: #157ed2; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
        <!-- {{-- <img src="" alt="" width="150"/> --}} -->
            @php
                $setting = App\Models\SiteSetting::find(1);
            @endphp

            <h2 style="color: #03a9f4; font-size: 26px;">
                <img src="{{ $setting->logo }}" alt="{{ $setting->company_name }} logo">
            </h2>
        </td>
        <td align="right">
            <pre class="font" style="color: #fff;">
               EasyShop Head Office
               Email:support@easylearningbd.com <br>
               Mob: 1245454545 <br>
               Dhaka 1207,Dhanmondi:#4 <br>

            </pre>
        </td>
    </tr>

</table>


<table width="100%" style="background:white; padding:2px;""></table>

<table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
            <p class="font" style="margin-left: 20px;">
                <strong>Name:</strong> {{ $order->name }} <br>
                <strong>Email:</strong> {{ $order->email }} <br>
                <strong>Phone:</strong> {{ $order->phone }} <br>

                @php
                    $div = $order->division->division_name;
                    $dis = $order->district->district_name;
                    $state = $order->state->state_name;
                @endphp
                <strong>Address:</strong> {{ $div }},{{ $dis }}.{{ $state }} <br>
                <strong>Post Code:</strong> {{ $order->post_code }}
            </p>
        </td>
        <td>
            <p class="font">
            <h3><span style="color: #03a9f4;">Invoice:</span> #{{ $order->invoice_no }}</h3>
            <strong>Order Date:</strong> {{ $order->order_date }} <br>
            <strong>Delivery Date:</strong> {{ $order->delivered_date }} <br>
            <strong>Payment Type:</strong> {{ $order->payment_method }} </span>
            </p>
        </td>
    </tr>
</table>
<br/>
<h3>Products</h3>


<table width="100%">
    <thead style="background-color: #03a9f4; color:#FFFFFF;">
    <tr>
        <th>Image</th>
        <th>Product Name</th>
        <th>Pro. Code</th>
        <th>Color</th>
        <th>Size</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th align="right">Total</th>
    </tr>
    </thead>
    <tbody>

    @foreach($orderItem as $item)
        <tr>
            <td>
                <img src="{{ public_path($item->product->product_thambnail) }}" height="60px;" width="60px;" alt="">
            </td>
            <td>{{ $item->product->product_name_en }}</td>
            <td>{{ $item->product->product_code }}</td>
            <td>{{ $item->color }}</td>
            <td>
                @if($item->size == Null)
                    ------
                @else
                    {{ $item->size }}
                @endif
            </td>
            <td>{{ $item->qty }}</td>
            <td>{{ number_format($item->price,2) }}$</td>
            <td align="right">{{ number_format($item->price * $item->qty,2) }}$</td>
        </tr>
    @endforeach

    </tbody>
</table>
<br>
<table width="100%" style=" padding:0 10px 0 10px; float: right;">
    <tr>
        <td align="right" width="90%">
            <h2 style="color: #03a9f4;">Subtotal:</h2>
            <h2 style="color: #03a9f4;">Total:</h2>
            {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
        </td>
        <td align="right" width="10%">
            <h2> {{ number_format($order->amount,2) }}$</h2>
            <h2> {{ number_format($order->amount,2) }}$</h2>
        </td>
    </tr>
</table>
<div class="thanks float-right mt-3">
    <p>Thanks For Buying Products..!!</p>
</div>
<div class="authority float-right mt-5">
    <p>-----------------------------------</p>
    <h5>Authority Signature:</h5>
</div>
</body>
</html>
