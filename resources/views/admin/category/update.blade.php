@extends('layouts.app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        <h3 class="m-0 text-dark">Update: {{$category[0]->name}}</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('adminHome')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('adminCategory')}}">Category List</a></li>
            <li class="breadcrumb-item active">Update Category</li>
          </ol>
        </div>
      </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">

    <div class="box-body no-padding">
        <div class="row" style="margin-left:300px; ">
            <div class="col-lg-6" >
                <div class="box-header">
                    <h5 class="box-title">Update Category</h5>
                </div>
                <form action="{{route('category.update',[$category[0]->slug])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                    <label>Category Name</label>
                    <input name="category_name" value="{{$category[0]->name}}" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" placeholder="description">{{$category[0]->description}}</textarea>
                    </div>
                </div>
                <!-- /.box-body -->
    
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update Category</button>
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