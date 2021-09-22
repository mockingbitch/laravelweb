@extends('layout')
@section('content')
    <style type="text/css">
        .cart-header {
            font-weight: bold;
            font-size: 1.25em;
            color: #333;
        }

        .cart-column {
            display: flex;
            align-items: center;
            border-bottom: 1px solid black;
            margin-right: 1.5em;
            padding-bottom: 10px;
            margin-top: 10px;
        }

        .cart-row {
            display: flex;
        }

        .cart-item {
            width: 45%;
        }

        .cart-price {
            width: 20%;
            font-size: 1.2em;
            color: #333;
        }

        .cart-quantity {
            width: 35%;
        }

        .cart-item-title {
            color: #333;
            margin-left: .5em;
            font-size: 1.2em;
        }

        .cart-item-image {
            width: 75px;
            height: auto;
            border-radius: 10px;
        }

        .btn-danger {
            color: white;
            background-color: #EB5757;
            border: none;
            border-radius: .3em;
            font-weight: bold;
        }

        .btn-danger:hover {
            background-color: #CC4C4C;
        }

        .cart-quantity-input {
            height: 34px;
            width: 50px;
            border-radius: 5px;
            border: 1px solid #56CCF2;
            background-color: #eee;
            color: #333;
            padding: 0;
            text-align: center;
            font-size: 1.2em;
            margin-right: 25px;
        }

        .cart-row:last-child {
            border-bottom: 1px solid black;
        }

        .cart-row:last-child .cart-column {
            border: none;
        }

        .cart-total {
            text-align: end;
            margin-top: 10px;
            margin-right: 10px;
        }

        .cart-total-title {
            font-weight: bold;
            font-size: 1.5em;
            color: black;
            margin-right: 20px;
        }

        .cart-total-price {
            color: #333;
            font-size: 1.1em;
        }

    </style>
    {{-- @php
        $message= Session::get('message');
        if($message){
            echo '<span class="text text-alert">'. $message . '</span>';
            Session::put('message', null);
        }
    @endphp --}}
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @elseif (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    @if (Session::get('cart'))
    <form action="{{ URL('/update-cart') }}" method="post">
        @csrf
        <div class="cart-row">
            <span class="cart-item cart-header cart-column">Sản Phẩm</span>
            <span class="cart-price cart-header cart-column">Giá</span>
            <span class="cart-quantity cart-header cart-column">Số Lượng</span>
            <span class="cart-price cart-header cart-column">Thành tiền</span>

        </div>
        @php
            $total = 0;
        @endphp
        @foreach (Session::get('cart') as $key => $value)

            @php
                $subtotal = $value['pr_price'] * $value['pr_qty'];
                $total += $subtotal;
            @endphp

            <div class="cart-items">
                <div class="cart-row">
                    <div class="cart-item cart-column">
                        <img class="cart-item-image" src="{{ URL::to('public/uploads/product/' . $value['pr_img']) }}"
                            width="100" height="100">
                        <span class="cart-item-title">{{ $value['pr_name'] }}</span>
                    </div>

                    <span class="cart-price cart-column">{{ number_format($value['pr_price'], 0, ',', '.') }}đ</span>

                    <div class="cart-quantity cart-column">
                        <input class="cart-quantity-input" value="{{$value['pr_qty']}}" name="cart_qty[{{$value['session_id']}}]" type="number" value="1" min="1">
                        <a href="{{ url('/delete-cart/' . $value['session_id']) }}"><i class="fa fa-trash"></i></a>
                    </div>
                    
                    <span class="cart-price cart-column">{{ number_format($subtotal, 0, ',', '.') }}đ</span>
                </div>
            </div>
        @endforeach
        <input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="btn btn-default btn-sm check_out">
        <div class="cart-total">
            {{-- <strong class="coupon">Giảm giá:</strong>
            <span style="font-size:40px;font-weight:bold;"
                class="cart-coupon">
            @if(Session::get('coupon'))
                @foreach (Session::get('coupon') as $key => $cou)
                    @if($cou['cp_function'] == '1')
                       <p>{{$cou['cp_value']}}%</p> 
                       <p>
                           @php
                               $total_cp = ($total*$cou['cp_value'])/100;
                               echo '<p>Tổng giảm'.number_format($total_cp,0,',','.').'Đ</p>';
                           @endphp
                       </p>
                       <p>{{ number_format($total-$total_cp, 0, ',', '.') }}Đ</p>
                    @endif
                    
                @endforeach
                @elseif ($cou['cp_function'] == '2')
                <p>{{number_format($cou['cp_value'],0,',','.')}}Đ</p> 
                <p>
                    @php
                        $total_cp = $total - $cou['cp_value'];
                      
                    @endphp
                </p>
                <p>{{ number_format($total_cp, 0, ',', '.') }}Đ</p>
                
            @endif
            
            </span> --}}
            <strong class="cart-total-title">Tổng Cộng:</strong>
            <span style="font-size:40px;font-weight:bold;"
                class="cart-total-price">{{ number_format($total, 0, ',', '.') }}đ</span>
        </div>
    </form>
   
    <form action="{{url('/check-coupon')}}" method="post">
        @csrf
        <input type="hidden" name="cp_value" >
        <input type="text" class="form-control" name="cp_code" placeholder="Nhập mã giảm giá">
        <input  type="submit" value="Tính mã giảm giá" class="btn btn-default check_out">
    </form>
    @else
    <hr>
    <h2 style="text-align:center">Vui lòng thêm sản phẩm vào giỏ hàng</h2>
    <hr>
    @endif
    {{-- <script>
        // xóa cart
        var remove_cart = document.getElementsByClassName("btn-danger");
        for (var i = 0; i < remove_cart.length; i++) {
            var button = remove_cart[i]
            button.addEventListener("click", function() {
                var button_remove = event.target
                button_remove.parentElement.parentElement.remove()
            })
        }
        // update cart 
        function updatecart() {
            var cart_item = document.getElementsByClassName("cart-items")[0];
            var cart_rows = cart_item.getElementsByClassName("cart-row");
            var total = 0;
            for (var i = 0; i < cart_rows.length; i++) {
                var cart_row = cart_rows[i]
                var price_item = cart_row.getElementsByClassName("cart-price ")[0]
                var quantity_item = cart_row.getElementsByClassName("cart-quantity-input")[0]
                var price = parseFloat(price_item.innerText) // chuyển một chuổi string sang number để tính tổng tiền.
                var quantity = quantity_item.value // lấy giá trị trong thẻ input
                total = total + (price * quantity)
            }
            document.getElementsByClassName("cart-total-price")[0].innerText = total + 'VNĐ'
            // Thay đổi text = total trong .cart-total-price. Chỉ có một .cart-total-price nên mình sử dụng [0].
        }
    </script> --}}

@endsection
