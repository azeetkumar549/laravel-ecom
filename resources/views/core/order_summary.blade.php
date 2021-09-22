@extends('core.base')


@section('content')
<!--Main layout-->
<main class="mt-5 pt-4">
    <div class="container wow fadeIn">

        <!-- Heading -->
        <h2 class="my-5 h2 text-center">Checkout form</h2>

        <!--Grid row-->
        <div class="row">


            <!--Grid column-->
            <div class="col-md-8 mb-4">

                <!-- Heading -->
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">3</span>
                </h4>

                <!-- Cart -->
                <ul class="list-group mb-3 z-depth-1">

                @php
                    $total_amount = 0;
                    $total_payable_amount = 0;
                    $total_actual_amount = 0;
                    $tax = 0;
                @endphp
                    @if (count($order->orderitem) > 0)

                   @foreach ($order->orderitem as $o)


                    <li class="list-group-item row d-flex justify-content-between lh-condensed">
                        <div class="col-1">
                            <img src="{{asset("products/".$o->product->img1)}}" alt="" class="w-100">
                        </div>
                        <div class="col">
                            <h6 class="my-0">{{$o->product->title}}</h6>
                            <small class="text-muted">{{$o->product->category->cat_title}}</small>
                        </div>
                        <div class="col d-flex">
                            <a href="{{route('removeCart', ['id'=>$o->product->id])}}" class="btn btn-danger btn-sm">-</a>
                            <span>{{$o->qty}}</span>
                            <form action="{{route('addCart',['id'=>$o->product->id])}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">+</button>
                            </form>
                        </div>
                        @php

                        $total_amount += $o->product->discount_price * $o->qty;
                        $total_actual_amount += $o->product->price * $o->qty;
                        $tax = $total_amount*0.18;
                        $total_payable_amount = $total_amount + $tax;
                        if($order->coupon_id){
                            $total_payable_amount = $total_amount + $tax;
                            $total_payable_amount -= $order->coupon->amount;

                        }
                        @endphp
                        <span class="text-muted">₹{{$o->product->discount_price * $o->qty }} <del>₹{{$o->product->price * $o->qty}}</del></span>

                        <span><a href="{{route('removeItemCart',['id'=>$o->product->id])}}" class="nav-link ms-2 text-muted">Remove</a></span>
                    </li>

                    @endforeach

                    @else

                    <h4 class="lead p-4">Sorry Cart is Empty</h4>

                    @endif

                </ul>
                <!-- Cart -->


                <!-- Promo code -->

            </div>

            <div class="col-md-4 mb-4 mt-5">

                <div class="list-group">
                    <a href="" class="list-group-item list-group-item-action">Total Amount <span class="float-right">Rs. {{$total_amount}}</span></a>
                    <a href="" class="list-group-item list-group-item-action">Total Tax (18% GST) <span class="float-right">Rs. {{$tax}}</span></a>
                    <a href="" class="list-group-item list-group-item-action bg-success text-white">Discount  <span class="float-right">Rs. {{$total_actual_amount - $total_amount}}</span></a>
                    @if ($order->coupon_id)
                    <div class="list-group-item list-group-item-action bg-warning text-white">Coupon Discount  <span class="float-right">Rs. {{$order->coupon->amount}}</span>
                <br>
                <span class="text-dark">{{$order->coupon->code}} </span><a href="{{route('removeCoupon')}}" class="font-weight-bold text-danger">X</a>
                    </div>

                    @endif
                    <a href="" class="list-group-item list-group-item-action">Total Payable Amount  <span class="float-right">Rs. {{$total_payable_amount}}</span></a>
                </div>
                <!-- Promo code -->
                @if (!$order->coupon_id)
                <form class="card p-2" action="{{route('addCoupon')}}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="code" placeholder="Promo code"
                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-secondary btn-md waves-effect m-0" type="submit">Redeem</button>
                        </div>
                    </div>
                </form>
                @endif

                <div class="row">
                <a href="" class="col btn-success btn">Go back</a>
                <a href="{{route('checkout')}}" class="col btn-warning btn">Checkout</a>
            </div>
            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

    </div>
</main>
<!--Main layout-->

@endsection
