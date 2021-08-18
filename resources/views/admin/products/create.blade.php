@extends('layouts.app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark">Create Product</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('adminHome')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('product.list')}}">Product List</a></li>
            <li class="breadcrumb-item active">Create Product</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">

    <div class="box-body no-padding">
        <div class="row" style="margin-left:300px; ">
            <div class="col-lg-6" >
                <div class="box-header">
                    <h5 class="box-title">Add to Product</h5>
                </div>
                <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                    <label>Product Name</label>
                    <input name="product_name" value="{{old('product_name')}}" class="form-control" type="text" placeholder="name">
                    </div>


                    <div class="form-group">
                      <label>Category</label>
                      <select name="product_category" class="form-control">
                        <option selected style="display: none">Select category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>select Image</label> 
                      <input type="file"  name="pimage" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Price</label> 
                      <input type="text"  name="price" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Stock Status</label>
                      <select name="stock" class="form-control">
                      <option selected style="display: none">Select Stock</option>
                        <option value="instock">Instock</option>
                        <option value="outofstock">Outofstock</option>
                      </select>
                    </div>
              

                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Description</label>
                      <textarea name="description" class="form-control" style="text-align: left;"
                      id="description" rows="4" placeholder="Enter description">{{old('description')}}</textarea>
                    </div>

                </div>
                <!-- /.box-body -->
    
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
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