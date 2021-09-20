@extends('admin.base')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control">
                        @error('title')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">discount_price</label>
                        <input type="text" name="discount_price" class="form-control">
                        @error('discount_price')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">price</label>
                        <input type="text" name="price" class="form-control">
                        @error('price')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">brand</label>
                        <input type="text" name="brand" class="form-control">
                        @error('brand')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">category</label>
                        <select type="text" name="category_id" class="form-select">
                                <option value="">select Category</option>
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
                        <textarea rows="5" type="text" name="descr" class="form-control"></textarea>
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