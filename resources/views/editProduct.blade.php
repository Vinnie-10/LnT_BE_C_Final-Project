@extends('layout.plain')
@section('content')

<div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
    <h1 class="text-center mb-4">Edit Product</h1>
    <div class="form-container">
        <div class="card p-5">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('edit.product', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-control" id="category_id" name="category_id">
                        <option value="">Select Category</option>
                        @foreach ($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                    </div>

                    @error('name')
                    <p class="alert alert-danger">{{$message}}</p>
                    @enderror

                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ intval($product->price) }}">
                    </div>

                    @error('price')
                    <p class="alert alert-danger">{{$message}}</p>
                    @enderror

                    <div class="mb-3">
                        <label for="" class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="qty" name="qty" value="{{$product->qty}}">
                    </div>

                    @error('qty')
                    <p class="alert alert-danger">{{$message}}</p>
                    @enderror

                    @if (optional($product)->image)

                    <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <img src="{{ asset('/storage/' . $product->image) }}" style="width: 100px; height: 100px;">
                    </div>
                    @endif


                    @error('image')
                    <p class="alert alert-danger">{{$message}}</p>
                    @enderror

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            </div>
            </div>

@endsection
