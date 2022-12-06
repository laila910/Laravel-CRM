@extends('layouts.app')

@section('content')
<div class='container'>
<div class="card mt-3">
    <div class="card-body">
         <div class="row">
            <div class="col-sm-3 col-md-2">
               @if ($user->image)
                <img src="{{asset('images/'.$user->image)}}" style='max-width:100%;max-height:100px' class="rounded" alt="">
               @else
               <img src="{{asset('images/male.jpg')}}" style='max-width:100%;max-height:100px' class="rounded" alt="">
               @endif
            </div>
            <div class="col-sm-6">
                <h5>{{$user->name}}</h5>
                <ul>
                    <li>
                        <strong>Email:</strong> {{$user->email}}
                    </li>
                    <li>
                        <strong>Date Added: </strong>{{$user->pretty_created}}
                    </li>
                    <li>
                        @if($user->admin==1)
                          <strong>Admin</strong>
                        @else
                          <strong>Employee</strong>
                        @endif
                    </li>
                    <li>
                        <strong>Address</strong>@if($user->address) {{$user->address}} @else ... @endif
                    </li>
                </ul>
            </div>
            <div class="col-sm-3">
                <div class="dropdown d-block">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Actions
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="{{route('users.edit',['user'=>$user->id])}}">Edit</a>
                    </div>
                  </div>
            </div>
         </div>
    </div>
</div>
</div>
@endsection