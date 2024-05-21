@extends('layouts.adminmain')

@section('content')
    <div class="content-wrapper">
        <h1 class="text-center">Edit Product</h1>
        <div class="container" style="width: 60%">

            <form action="/updateproduct/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" class="form-control" autocomplete="off" placeholder="Enter Product Name" name="name" value="{{ $data->name }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" class="form-control" autocomplete="off" placeholder="Enter Product Description" name="description" value="{{ $data->description }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Choose</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="category_id">
                            <option value="{{ $data->category_id }}" selected>{{ $data->category->name }}</option>
                          <option>Choose Category</option>
                          @foreach($category as $ct)
                          <option value="{{ $ct->id }}">{{ $ct->name }}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="input-group mb-3 d-flex flex-column">
                        <label for="">Product Image Recent</label>
                        <img src="{{ asset('img/product/'. $data->image_path)}}" alt="" width="100px">
                        <label for="">Product Image New</label>
                        <input type="file" class="form-control-file" name="image_path">
                    </div>
                </div>            
                <div class="form-group">
                    <label for="exampleInputEmail1">Price(RP)</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter Product Price" name="price" id="rupiahInput" autocomplete="off" value="{{ $data->price }}">
                      </div>
                </div>
                
                <div class="d-flex mb-2 flex-column">
                    <div class="row">
                        <label for="">Set Stock</label>
                    </div>
                    <div class="row">

                        <button type="button" class="btn btn-dark rounded-end-0 border-1 border-light-subtle" id="btn-minus">-</button>
                        <input type="text" name="stock" class="form-control text-center rounded-0 bg-white border-0 border-top border-bottom border-light-subtle" style="width: 60px;" id="quantity" name="quantity" value="{{ $data->stock }}" readonly>
                        <button type="button" class="btn btn-dark rounded-start-0 border-1 border-light-subtle" id="btn-plus">+</button>
                    </div>
                </div>

 
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
<script src="{{ asset('js/quantity.js') }}"></script>

@endsection