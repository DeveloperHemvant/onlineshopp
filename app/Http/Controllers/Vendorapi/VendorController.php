<?php

namespace App\Http\Controllers\Vendorapi;

use App\Http\Controllers\Controller;
use App\Models\Vendor_detail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
       ]);
      
       if ($validator->fails()) {
        return response()->json(['error'=>$validator->errors()],201);
       }else{
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role'=>'vendor'            
        ]);
       
        $vendor_id=$user->id;
        $vendor=Vendor_detail::create([
            'vendor_id' => $vendor_id,
            'shop' => $request->input('shop'),
            'phone' => $request->input('phone'),
            'city' => $request->input('city'),
            'district' => $request->input('district'),
            'state' => $request->input('state'),
            'pincode' => $request->input('postal'),
            'country' => $request->input('country'),
            
        ]);
       
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
