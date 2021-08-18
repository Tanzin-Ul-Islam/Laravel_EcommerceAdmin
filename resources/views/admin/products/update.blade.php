@extends('layouts.app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        <h3 class="m-0 text-dark">Update: {{$product->name}}</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('adminHome')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('product.list')}}">product List</a></li>
            <li class="breadcrumb-item active">Update product</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@include('inc.messages')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">

    <div class="box-body no-padding">
        <div class="row" style="margin-left:300px; ">
            <div class="col-lg-6" >
                <div class="box-header">
                    <h5 class="box-name">Update product</h5>
                </div>
                <form action="{{route('product.update', [$product->slug])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body">
                  <div class="form-group">
                    <label>product Name</label>
                    <input name="product_name" value="{{$product->name}}" class="form-control" type="text" placeholder="name">
                    </div>


                    <div class="form-group">
                      <label>Category</label>
                      <select name="product_category" class="form-control">
                        <option selected style="display: none">Select category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" @if($product->category_id == $category->id) selected @endif>
                          {{$category->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group row"> 
                      <div class="col-sm-8">
                        <label>select Image</label> 
                        <input type="file" name="pimage" class="form-control">
                      </div>
                      <div class="col-sm-4">
                        @if($product->image=='noimage')
                        <img src="/product_images/noimage.jpg" width="120px" height="80px"><br>
                        @else
                        <img src="/product_images/{{$product->image}}" width="120px" height="80px"><br>
                        @endif
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Price</label> 
                      <input type="text"  name="price" value="{{$product->price}}" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Stock Status</label>
                      <select name="stock" class="form-control">
                      <option selected style="display: none">Select Stock</option>
                        <option value="instock" @if($product->stock_status=='instock') selected @endif>Instock</option>
                        <option value="outofstock" @if($product->stock_status=='outofstock') selected @endif>Outofstock</option>
                      </select>
                    </div>


                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Description</label>
                    <textarea name="description" style="text-align: left;" class="form-control" id="description" 
                      rows="4" placeholder="Enter description">{{$product->description}}
                      </textarea>
                    </div>
                </div>
                <!-- /.box-body -->
    
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update product</button>
                </div>
                </form>
            </div>
        </div>
    
    </div>
        </div>
      </div>
    </div>
</div>

@endsection