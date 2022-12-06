@extends('layouts.app');

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <div class="d-flex">
                <h1>Create Customer</h1>
                <div class="m-auto">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="{{route('customers.dashboard')}}">view Customers Dashboard</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
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

          
            <form action="{{route('customers.store')}}" method='POST' enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3 mb-3">
                    <label for="exampleInputName">Name</label>
                    <input type="text" class='form-control' id='exampleInputName' name='name' placeholder="Enter Customer Name">
                </div>
                  <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1"  name='email' placeholder="Enter Customer email">
                  </div>
                  <div class="form-group mb-3">
                    <label for="exampleInputphone">Phone</label>
                    <input type="string" class="form-control" id="exampleInputphone"  name='phone' placeholder="Enter Customer phone">
                  </div>
                  <div class="form-group mb-3">
                    <label for="exampleInputCompany">Company</label>
                    <input type="string" class="form-control" id="exampleInputCompany"  name='company' placeholder="Enter Customer Company">
                  </div>
                  <div class="form-group mb-3">
                    <label for="exampleInputWebsite">Website</label>
                    <input type="string" class="form-control" id="exampleInputWebsite"  name='website' placeholder="Enter Customer Website">
                  </div>
                  
                  <div class='form-group mb-3'>
                   <label for="exampleFormControlAssignedTo">Assigned To </label>
                   <select class="form-control" id="exampleInputAssignedTo" name="user_id" placeholder="Customer Assigned To">
                 
                      @if($userLogin)
                       <option value="{{$userLogin->id}}" selected>{{$userLogin->name}}</option>
                      @endif
                      @foreach ($allUsers as $user)
                        @if($userLogin->id != $user->id)
                          <option value="{{$user->id}}">{{$user->name}}</option>
                        @endif
                      @endforeach
                </select>
                   
                  </div>
                  <button type="submit" class="btn btn-primary float-right">Create Customer</button>
            </form>
            
        </div>
    </div>
</div>

@endsection