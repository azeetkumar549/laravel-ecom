@extends('admin.base')


@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{route('category.update',["category"=>$category->id])}}" method="POST">
                    @method("put")
                    @csrf
                    <div class="mb-3">
                        <label for="">parent_id</label>
                        <select type="text" name="parent_id" class="form-select">
                            <option value="">Main Category</option>
                            @foreach ($main_cat as $cat)
                                <option value="{{$cat->id}}">{{$cat->cat_title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Cat title</label>
                        <input type="text" name="cat_title" value="{{$category->cat_title}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">description</label>
                        <textarea rows="6" type="text" name="description" class="form-control">{{$category->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-success w-100">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection