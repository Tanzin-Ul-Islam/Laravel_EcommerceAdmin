@extends('layouts.app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark">Create User</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('adminHome')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('user.index')}}">User List</a></li>
            <li class="breadcrumb-item active">Create User</li>
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
                    <h5 class="box-title">Add to User</h5>
                </div>
                <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="box-body">

                    <div class="form-group">
                    <label>User Name</label>
                    <input name="user_name" value="{{old('user_name')}}" class="form-control" type="text" placeholder="name">
                    </div>

                    <div class="form-group">
                      <label>Email</label>
                      <input name="user_email" value="{{old('user_email')}}" class="form-control" type="email" placeholder="email">
                      </div>

                    <div class="form-group">
                      <label>Password</label>
                      <input name="user_pass" value="{{old('user_pass')}}" class="form-control" type="password" placeholder="password">
                    </div>

                    <div class="form-group">
                      <label>Confirm Password</label>
                      <input name="confirm_pass" value="{{old('confirm_pass')}}" class="form-control" type="password" placeholder="password">
                    </div>

                    <div class="form-group">
                      <label>Is Admin</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_admin" value="1">
                        <label class="form-check-label">True</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_admin" value="0">
                        <label class="form-check-label">False</label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>select Image</label> 
                      <input type="file"  name="cover_pic" class="form-control">
                    </div>
                    

              

                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Description</label>
                      <textarea name="description" class="form-control" style="text-align: left;"
                      id="description" rows="4" placeholder="Enter description">{{old('description')}}</textarea>
                    </div>

                </div>
                <!-- /.box-body -->
    
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Create User</button>
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