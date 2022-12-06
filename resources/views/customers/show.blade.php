@extends('layouts.app')

@section('content')
<div class='container'>
<div class="card mt-3">
    <div class="card-body">
         <div class="row">
            
            <div class="col-sm-6">
                <h5>{{$customer->name}}</h5>
                <ul>
                    <li>
                        <strong>Email:</strong> {{$customer->email}}
                    </li>
                    <li>
                        <strong>Date Added: </strong>{{$customer->pretty_created}}
                    </li>
                    <li>
                        <strong>Phone:</strong>{{$customer->phone}}
                    </li>
                    <li>
                        <strong>Company:</strong>@if($customer->company) {{$customer->company}} @else ... @endif
                    </li>
                    <li>
                        <strong>Website:</strong>{{$customer->website}}
                    </li>
                    <li>
                        @foreach($allUsers as $user)
                        @if($user->id == $customer->createdBy)
                          <strong>Created By:</strong> {{$user->name}} @if($user->admin==1) - Admin @else - Employee @endif
                        @endif
                     @endforeach
                    </li>
                    <li>
                        @foreach($allUsers as $user)
                           @if($user->id == $customer->user_id)
                            <strong>Assigned To:</strong> {{$user->name}} @if($user->admin==1) - Admin @else - Employee @endif
                           @endif
                        @endforeach
                    </li>
                    <li>
                      @foreach($allRecords as $record)
                      @if($record->customer_id ==$customer->id)
                        <p><strong>Record No. {{$record->id}}:</strong> <br> &nbsp; &nbsp; &nbsp; Status: {{$record->status}}
                       <br> &nbsp; &nbsp; &nbsp; Notes: {{$record->notes}}
                       <br> &nbsp; &nbsp; &nbsp; Added at: {{$record->pretty_created}} </p>
                      @endif
                   @endforeach
                    </li>
                </ul>
            </div>
            <div class="col-sm-3">
                <div class="dropdown d-block">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Actions
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="{{route('customers.edit',['customer'=>$customer->id])}}">Edit</a>
                      @if(Auth::user()->admin ==1 || Auth::user()->id == $customer->user_id)
                        <a class="dropdown-item" data-toggle='modal' data-target='#AddActionToThisCustomer'>Add Record Action</a> 
                      @endif
                    </div>
                  </div>
            </div>
         </div>
    </div>
</div>
</div>

 {{-- Modal for Assign To Another User --}}
 <div class="modal fade" id="AddActionToThisCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Record Action</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('customers.add.recordAction')}}" method='POST' enctype="multipart/form-data">
                @csrf
                <div class='form-group mb-3'>
                  <select class="form-control" id="exampleInputAssignedTo" name="status">
                         <option value="call">Call</option>
                         <option value="visit">Visit</option>
                         <option value="follow Up">Follow Up</option>
                   </select>
                 </div>
                 
                    <div class="form-group mt-3 mb-3">
                        <label for="exampleInputNotes">Notes</label>
                        <input type="text" class='form-control' id='exampleInputNotes' name='notes' placeholder="Enter Your Notes">
                    </div>
                    <input type="hidden" name='customer_id' value='{{$customer->id}}'>
                
                  <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  {{-- end Modal  --}}

@endsection