@extends('layouts.app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark">Category Details</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('adminHome')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('adminCategory')}}">Category List</a></li>
            <li class="breadcrumb-item active">{{$category[0]->name}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="card card-primary card-outline">
  <div class="card-body">
    <div class="box">
      <div class="box-header with-border">
      <h3 class="box-title">{{$category[0]->name}}</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered">
          <tbody>

            <tr>
              <th>Name</th>
              <td>{{$category[0]->name}}</td>
            </tr>

            <tr>
              <th>Created At</th>
              <td>{{$category[0]->created_at}}</td>
            </tr>

            <tr>
              <th>Description</th>
              <td>{{$category[0]->description}}</td>
            </tr>

          </tbody>
        </table>
      </div>     
    </div>
  </div>
</div>
@endsection