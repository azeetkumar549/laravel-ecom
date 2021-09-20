@extends('admin.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <table class="table">
                    <tr>
                        <th>Title</th>
                        <td>{{$product->title}}</td>
                    </tr>
                    <tr>
                        <th>descount_price</th>
                        <td>{{$product->descount_price}}</td>
                    </tr>
                    <tr>
                        <th>price</th>
                        <td>{{$product->price}}</td>
                    </tr>
                    <tr>
                        <th>brand</th>
                        <td>{{$product->brand}}</td>
                    </tr>
                    <tr>
                        <th>descr</th>
                        <td>{{$product->descr}}</td>
                    </tr>
                    <tr>
                        <th>category_id</th>
                        <td>{{$product->category_id}}</td>
                    </tr>
                </table>
            </div>
            <div class="col-3">
                <img src="{{asset("products/".$product->img1)}}" alt="" class="card-img-top">
            </div>
        </div>
    </div>
@endsection