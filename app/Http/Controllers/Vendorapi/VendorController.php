<?php
namespace App\Http\Controllers\Vendorapi;
use App\Mail\UserVerificationMail;
// use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Mail;
use DB;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;
class VendorController extends Controller
{
    

    
    /**
     * Display a listing of the resource.
     */
    public function verifyemail($token)
    {
         $tokenFromURL =$token;
        $users = DB::table('users')
        ->where('id', '=', $tokenFromURL)->get();
        if($users){
             DB::table('users')
              ->where('id', $tokenFromURL)
              ->update(['email_verified_at' => now()]);
              return redirect(url('/'));
        }

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
            'created_at'=>now(),
            'updated_at'=>now()                             
        ]);
       
        $userId = $user->id;
        $MailData = [
            'title' => 'Mail from Online Shop',
            'body' => 'This is Verification Mail',
            'button' => $userId
        ];
       
       Mail::to($request->input('email'))->send(new UserVerificationMail($MailData));
       
       
        return response()->json(['message'=>'Registration Success'],200);
       }
      
    }

  
}

