<?php
namespace App\Http\Controllers\Vendorapi;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;

class VendorController extends Controller
{
    

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validator=validator::make($request->all(),[
        'name'=>'required',
        'email'=>'required',
        'phone'=>'required',
        'city'=>'required',
        'district'=>'required',
        'state'=>'required',
        'postal'=>'required',
        'country'=>'required',
        'shop'=>'required',
        'password'=>'required',
       ]);
      
       if ($validator->fails()) {
        return response()->json(['error'=>$validator->errors()],201);
       }else{
        
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role'=>'vendor',
            'shop' => $request->input('shop'),
            'phone' => $request->input('phone'),
            'city' => $request->input('city'),
            'district' => $request->input('district'),
            'state' => $request->input('state'),
            'pincode' => $request->input('postal'),
            'country' => $request->input('country'),
            'password' => Hash::make($request->input('password')),                  
        ]);
         $user->sendEmailVerificationNotification();

       
       
        return response()->json(['message'=>'Registration Success'],200);
       }
      
    }

    /**
     * Display the specified resource.
     */
 

    /**
     * Update the specified resource in storage.
     */
    

    /**
     * Remove the specified resource from storage.
     */
  
}
