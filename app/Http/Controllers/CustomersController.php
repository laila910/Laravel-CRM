<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAndUpdateCustomerRequest;
use App\Http\Requests\StoreAndUpdateRecordRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use App\Models\Record;
class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allUsers=User::all();
        $allRecords=Record::all();
        return view('customers.index',['customers'=>Customer::latest()->paginate(20),'allUsers'=>$allUsers,'allRecords'=>$allRecords]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userLogin = Auth::user(); //Customer createdBy
        $Users = User::all();
        return view('customers.create',[
            'allUsers' => $Users,'userLogin'=>$userLogin
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAndUpdateCustomerRequest $request)
    {
       
        $userLogin=Auth::user();//user already login
        $userLoginId = Auth::id(); //Customer createdBy
        if($userLogin->admin ==1){
            $userAssigned=$request->user_id;
        }else{
            $userAssigned=$userLoginId;
        }

        Customer::create([
          'name'=>$request->name,
          'email'=>$request->email,
          'phone'=>$request->phone,
          'company'=>$request->company,
          'website'=>$request->website,
          'createdBy'=>$userLoginId,
          'user_id'=>$userAssigned
        ]);
        return redirect()->route('customers.dashboard')->with('success','Successfully created a New Customer');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $allUsers=User::all();
        $allRecords=Record::all();
        return view('customers.show',compact('customer','allUsers','allRecords'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $userLogin = Auth::user(); //Customer createdBy
        $allUsers = User::all();
        return view('customers.edit',compact('customer','allUsers','userLogin'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAndUpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());
       
        return back()->with('success', 'Successfully updated Customer details!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.dashboard')->with('success','Successfuly deleted Customer And All assets related to');
    }
    public function addRecordAction(StoreAndUpdateRecordRequest $request){
         
        Record::create([
           'status'=>$request->status,
           'notes'=>$request->notes,
           'customer_id'=>$request->customer_id
        ]);
        return redirect()->route('customers.dashboard')->with('success','Successfully created a New Record To This Customer');


    }
}
