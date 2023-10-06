<?php
namespace App\Http\Controllers\Vendorapi;
use App\Mail\UserVerificationMail;
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
       function generateRandomString($length) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
    $randomstring = generateRandomString(10);
    
       $MailData=[
        'title'=>'Mail from Online Shop',
        'body'=>'This Verification Mail',
        'button' => '<button><a href="{{ url("verifyemail/" . $randomstring) }}">Click To Verify Email</a></button>'

       ];
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
            'verification_link'=>$randomstring                  
        ]);
         $user->sendEmailVerificationNotification($request->email);

       
       
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
