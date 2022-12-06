@extends('layouts.app');

@section('content')

<div class="container">
  @if(session('success'))
     <div class="alert alert-success mt-3">
        {{session('success')}}
     </div>
@endif
    <div class="card mt-3">
        <div class="card-body">
            <div class="d-flex">
                <h1>Users <small class="text-muted">Showing All Users</small></h1>
                <div class="m-auto">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="{{route('users.create')}}">Create New User</a>
                        </div>
                      </div>
                </div>
            </div>
          </div>
        </div>
           {{-- <hr> --}}
           @if($users->count())
             {{$users->links()}}
               @foreach ($users as $user)
                  @include('users.user-card',['user'=>$user]);
               @endforeach
           @endif
         
           {{-- @if($users->count())
             <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($users as $user)
                     <tr>
                        <td style="width: 10%">
                          @if($user->image)
                            <img src="{{asset('images/'.$user->image)}}" width="100%" class="rounded" alt="">
                          @else
                            <img src="{{asset('images/male.jpg')}}" width="100%" class="rounded" alt="">
                          @endif
                      
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>@if($user->admin == 1) true @else false @endif</td>
                        <td>{{$user->pretty_created}}</td>
                        <td></td>
                     </tr>
                   @endforeach
                </tbody>
            </table>

           @endif --}}
       
</div>

@endsection