@extends('layouts.app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark">Create Category</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('adminHome')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('adminCategory')}}">Category List</a></li>
            <li class="breadcrumb-item active">Create Category</li>
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
                    <h5 class="box-title">Add to Category</h5>
                </div>
                <form action="{{route('category.store')}}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                    <label>Category Name</label>
                    <input name="category_name" class="form-control" type="text" placeholder="name">
                    </div>
                    <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" placeholder="description"></textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
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