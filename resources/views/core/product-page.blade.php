@extends('core.base')

@section('content')
<main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">

        <!--Grid row-->
        <div class="row wow fadeIn">
            <div class="offset-2"></div>

            <!--Grid column-->
            <div class="col-md-3 mb-4">

                <img src="{{asset("products/$product->img1")}}" class="w-100" alt="">

            </div>
            <div class="col-md-6 mb-4">
                <div class="px-4">
                    <div class="mb-3">
                        <h2>{{$product->title}}</h2>
                        <a href="">
                            <span class="badge red mr-1">{{$product->category->cat_title}}</span>
                        </a>
                    </div>
                    <p class="lead">
                        <span class="mr-1">
                            <del>₹{{$product->price}}</del>
                        </span>
                        <span>₹{{$product->discount_price}}</span>
                    </p>

                    <p class="lead font-weight-bold">Description</p>

                    <p>{{$product->descr}}</p>

                    <form class="d-flex justify-content-left" action="{{route('addCart',['id'=>$product->id])}}" method="POST">
                      @csrf
                        <!-- Default input -->
                        <input type="number" value="1" aria-label="Search" class="form-control" style="width: 100px">
                        <button class="btn btn-primary btn-md my-0 p" type="submit">Add to cart
                            <i class="fas fa-shopping-cart ml-1"></i>
                        </button>

                    </form>

                </div>
                <!--Content-->

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

        <hr>

        <!--Grid row-->
        <div class="row d-flex justify-content-center wow fadeIn">

            <!--Grid column-->
            <div class="col-md-6 text-center">

                <h4 class="my-4 h4">Additional information</h4>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus suscipit modi sapiente illo soluta
                    odit
                    voluptates,
                    quibusdam officia. Neque quibusdam quas a quis porro? Molestias illo neque eum in laborum.</p>

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

        <!--Grid row-->
        <div class="row wow fadeIn">

            <!--Grid column-->
            <div class="col-lg-4 col-md-12 mb-4">

                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/11.jpg" class="img-fluid"
                    alt="">

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4">

                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/12.jpg" class="img-fluid"
                    alt="">

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4">

                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/13.jpg" class="img-fluid"
                    alt="">

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

    </div>
</main>
@endsection
