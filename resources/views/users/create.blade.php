@extends('layouts.app');

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <div class="d-flex">
                <h1>Create User</h1>
                <div class="m-auto">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="{{route('users.dashboard')}}">view Users Dashboard</a>
                        </div>
                      </div>
                </div>
            </div>
            <hr>
            @if($errors->count())
              
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                      <li>{{$item}}</li>
                    @endforeach
                </ul>
               
            </div>

            @endif

          
            <form action="{{route('users.store')}}" method='POST' enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3 mb-3">
                    <label for="exampleInputName">Name</label>
                    <input type="text" class='form-control' id='exampleInputName' name='name' placeholder="Enter User Name">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1"  name='email' placeholder="Enter email">
                  </div>
                  <div class="form-group mb-3">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1"  name='password' placeholder="Password">
                  </div>
                  <div class='form-group mb-3'> 
                    <label for="exampleFormControlImage">Profile Image</label>
                    <input type="file" class="form-control-file" id="exampleFormControlImage" name='image'>
                  </div>
                  <div class='form-group mb-3'>
                   <label for="exampleFormControlAddress">Address</label>
                   <input type="text" class='form-control' id='exampleFormControlAddress' name='address' placeholder="User Address">
                  </div>
                  <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" name='admin' id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Admin</label>
                  </div>
                  <button type="submit" class="btn btn-primary float-right">Create</button>
            </form>
            
        </div>
    </div>
</div>

@endsection