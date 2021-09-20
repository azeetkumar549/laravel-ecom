@extends('admin.base')

@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-2 offset-10"><a href="{{route('product.create')}}" class="btn btn-success">Add product</a></div>
        </div>

        <table class="table table-bordered mt-3">
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Price</th>
                <th>Category</th>
                <th>image</th>
                <th>brand</th>
                <th>action</th>
            </tr>

            @foreach ($products as $pro)
                <tr>
                    <td>{{$pro->id}}</td>
                    <td>{{$pro->title}}</td>
                    <td>{{$pro->discount_price}} <del>{{$pro->price}}</del></td>
                    <td>{{$pro->category}}</td>
                    <td><img src="{{asset("products/$pro->img1")}}" width="20px" /></td>
                    <td>{{$pro->brand}}</td>
                    <td class="d-flex">
                        <a href="{{route('product.edit',['product'=>$pro->id])}}" class="btn btn-success">Edit</a>
                        <a href="{{route('product.show',['product'=>$pro->id])}}" class="btn btn-info">View</a>

                        <form action="{{route('product.destroy',['product'=>$pro->id])}}" method="POST">
                            @method("delete")@csrf
                            <input type="submit" class="btn btn-danger" value="delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection