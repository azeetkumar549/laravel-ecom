@extends('admin.base')


@section('content')
    <div class="container-fluid mt-4">
        <div class="container mb-2">
            <a href="{{route('category.create')}}" class="btn btn-success float-end">Add Category</a>
        </div>
        <br>
        <br>
        <table class="table table-bordered mt-2">
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>description</th>
                <th>parent_id</th>
                <th>action</th>
            </tr>
            @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->cat_title}}</td>
                    <td>{{$category->description}}</td>
                    <td>{{$category->parent_id}}</td>
                    <td class="d-flex">
                        <form class="me-2" action="{{route('category.destroy',['category'=>$category->id])}}" method="POST">
                            @method("delete")
                            @csrf
                            <input type="submit" class="btn btn-danger" value="X">
                        </form>
                        <a href="{{route('category.edit',['category'=>$category->id])}}" class="btn btn-success ">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection