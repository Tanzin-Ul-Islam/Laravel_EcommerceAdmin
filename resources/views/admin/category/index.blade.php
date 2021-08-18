@extends('layouts.app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark">Category</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('adminHome')}}">Home</a></li>
            <li class="breadcrumb-item active">Category</li>
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
                <h5 class="box-title">Category List 
                    <a href="{{route('category.create')}}" style="float:right;" 
                        class="btn btn-primary btn-sm">Create Category</a></h5>
              </div><br>
            <div class="box-body no-padding">
                <table class="table table-striped">
                  <tbody><tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                  @if(count($categories)>0)
                  @foreach($categories as $category)
                  <tr>
                    <td>{{$category->id}}</td>
                    <td><strong><a href="{{route('category.details',[$category->slug])}}" style="color:black;">{{$category->name}}</a></strong></td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->created_at}}</td>

                  <td class="d-flex">
                    
                    <a href="{{route('category.edit',[$category->slug])}}" class="btn btn-sm btn-success mr-1">Edit</a>

                    <form action="{{route('category.delete',[$category->slug])}}" method="POST" class="mr-1">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"> Delete</button>
                    </form>

                  </td>
                  
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td colspan="6"><h4 class="text-center" style="color:red;">No category found!!</h4></td>
                  </tr>
                @endif

                </tbody></table>
              </div>
        </div>
      </div>
    </div>
</div>

@endsection