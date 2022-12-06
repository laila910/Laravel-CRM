<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Requests\StoreAndUpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index',['users'=>User::latest()->paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAndUpdateUserRequest $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        if($request->image){
            $image=time().'.'.$request->image->extension();  
            $request->image->move(public_path('images/'), $image);
        }else{
            $image=null;
        }
       if($request->admin){ $admin=1;}else{$admin=0;}
       if($request->address){$address=$request->address;}else{$address=null;}
        User::create([
            'name'=>$request->name,
            'password'=>$request->password,
            'email'=>$request->email,
            'address'=>$address,
            'image'=>$image,
            'admin'=>$admin
          ]);
        return redirect()->route('users.dashboard')->with('success','Successfully created a New User');

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAndUpdateUserRequest $request, User $user)
    {
     if ($request->password) {
        $request->merge(['password' => Hash::make($request->password)]);
        $user->update(['password'=>$request->password]);
     }else{
        $user->update($request->validated());
     }
       
        return back()->with('success', 'Successfully updated User details!');
    }
    public function updateProfileImage(StoreAndUpdateUserRequest $request,User $user){
        if ($request->image) {
            $path=public_path('images/').$user->image;
            if(file_exists($path)){
                @unlink($path);
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/'), $imageName);
        }else{
            $imageName=$user->image;
        }
        $user->update([
            'image'=>$imageName
        ]);
        return back()->with('success','Successfully updated profile image');
    }
    public function destroyProfileImage(User $user){
      if($user->image){
        $path=public_path('public/').$user->image;
        @unlink($path);
        $user->update(['image'=>null]);
      }
      return back()->with('success','Successfuly Deleted Profile Image');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->image) {
           $path=public_path('public/').$user->image;
           @unlink($path);
        }
        $user->delete();

        return redirect()->route('users.dashboard')->with('success','Successfuly deleted User And All assets related to');
        
    }
}
