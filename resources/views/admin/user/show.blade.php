@extends('layouts.app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('adminHome')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('user.index')}}">User List</a></li>
            <li class="breadcrumb-item active">User Details</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@include('inc.messages')
<div class="card card-primary card-outline">
    <div class="card-body">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">User Information</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tbody>

              <tr>
                <th>Image</th>
                <td>
                  @if($user->image == 'noimage')
                  <img src="/product_images/noimage.jpg" width="250px" height="200px"><br> 
                  @else
                  <img src="/profile_image/{{$user->image}}" width="250px" height="200px"><br>
                  @endif
                </td>
              </tr>

              <tr>
                <th>Name</th>
                <td>{{$user->name}}</td>
              </tr>
              
              <tr>
                <th>Email</th>
                <td>{{$user->email}}</td>
              </tr>

              <tr>
                <th>Is Admin</th>
                <td>@if($user->is_admin == 1)True @else False @endif</td>
              </tr>

              <tr>
                <th>Description</th>
                <td>{{$user->description}}</td>
              </tr>

              <tr>
                <th>Created Date</th>
                <td>{{$user->created_at->format('M d, Y')}}</td>
              </tr>
            </tbody>
          </table>
        </div>     
      </div>
    </div>
  </div>
@endsection