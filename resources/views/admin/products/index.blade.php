@extends('layouts.app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark">Products</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('adminHome')}}">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
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
            <div class="box-header">
                <h5 class="box-title">Products List 
                    <a href="{{route('product.create')}}" style="float:right;" 
                        class="btn btn-primary btn-sm">Create Product</a></h5>
            </div><br>
            <div class="box-body no-padding">
                <table class="table table-striped">
                  <tbody><tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Published At</th>
                    <th>Action</th>
                  </tr>
                  @if(count($products)>0)
                  @foreach($products as $product)
                  <tr>
                    <td>{{$product->id}}</td>
                  <td><a href="{{route('product.details', [$product->slug])}}" style="color:black">
                    <strong>{{$product->name}}</strong></a></td>
                    <td>
                      @if($product->image == 'noimage')
                      <img src="/product_images/noimage.jpg" width="120px" height="80px"><br> 
                      @else
                      <img src="/product_images/{{$product->image}}" width="120px" height="80px"><br>
                      @endif
                    </td>
                    <td>
                      @if($product->category->name)
                      {{$product->category->name}}
                      @else 
                      <h5>No Category!</h5>
                      @endif 
                    </td> 

                    <td>{{$product->price}} tk</td>
                    
                    <td>{{$product->created_at}}</td>


                  <td class="d-flex">
                    
                    <a href="{{route('product.edit',[$product->slug])}}" class="btn btn-sm btn-success mr-1">
                    Edit</a>

                    <form action="{{route('product.delete',[$product->slug])}}" method="POST" class="mr-1">
                     @method('DELETE')
                     @csrf
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                  </td>
                  
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td colspan="8"><h4 class="text-center" style="color:red;">No post found!!</h4></td>
                  </tr>
                @endif

                </tbody></table>
              </div>
        </div>
      </div>
    </div>
</div>
@endsection