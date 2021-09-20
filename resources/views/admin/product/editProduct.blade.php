@extends('admin.base')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{route('product.update',['product'=>$product->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("put")
                    <div class="mb-3">
                        <label for="">Title</label>
                        <input type="text" name="title" value="{{$product->title}}" class="form-control">
                        @error('title')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">discount_price</label>
                        <input type="text" name="discount_price" value="{{$product->discount_price}}" class="form-control">
                        @error('discount_price')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">price</label>
                        <input type="text" name="price" value="{{$product->price}}" class="form-control">
                        @error('price')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">brand</label>
                        <input type="text" name="brand" value="{{$product->brand}}" class="form-control">
                        @error('brand')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">category</label>
                        <select type="text" name="category_id" class="form-select">
                                <option value="">select Category</option>
                                <option value="">{{$product->category_id}}</option>
                                @foreach ($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->cat_title}}</option>
                                @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="">description</label>
                        <textarea rows="5" type="text" name="descr" class="form-control">{{$product->descr}}</textarea>
                        @error('descr')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">image 1</label>
                        <input type="file" name="img1" class="form-control">
                        @error('img1')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">image 2</label>
                        <input type="file" name="img2" class="form-control">
                        @error('img2')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-success w-100">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection