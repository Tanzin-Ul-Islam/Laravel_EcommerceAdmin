@extends('layouts.app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark">{{$product->name}} Details</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('adminHome')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('product.list')}}">Product List</a></li>
            <li class="breadcrumb-item active">{{$product->name}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
{{$product->name}}
<div class="card card-primary card-outline">
    <div class="card-body">
      <div class="box">
        <div class="box-header with-border">
        <h3 class="box-title">{{$product->name}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th>Name</th>
                <td>{{$product->name}}</td>
              </tr>
              
              <tr>
                <th>Publish Date</th>
                <td>{{$product->created_at}}</td>
              </tr>

              <tr>
                <th>Category</th>
                <td> {{$product->category->name}}</td>
              </tr>

              <tr>
                <th>Image</th>
                <td>
                  @if($product->image == 'noimage.jpg')
                  <img src="/product_images/noimage.jpg" width="600px" height="400px"><br> 
                  @else
                  <img src="/product_images/{{$product->image}}" width="600px" height="400px"><br>
                  @endif
                </td>
              </tr>
              
              <tr>
                <th>Description</th>
                <td>{{$product->description}}</td>
              </tr>
            </tbody>
          </table>
        </div>     
      </div>
    </div>
  </div>
@endsection