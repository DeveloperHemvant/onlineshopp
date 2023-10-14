<?php
namespace App\Http\Controllers\Vendorapi;
use App\Mail\UserVerificationMail;
// use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Mail;
use DB;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Twilio\Rest\Client;
class VendorController extends Controller
{
    

    
    /**
     * Display a listing of the resource.
     */
    public function verifyemail($token)
    {
        $user = DB::table('users')
        ->where('id', '=', $token)
        ->first();

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    $verifyTime = now();

    if ($verifyTime->diffInMinutes(Carbon::parse($user->created_at)) > 15) {
        DB::table('users')
            ->where('id', $token)
            ->delete();
        return response()->json(['message' => 'Link Expired. Register again']);
    } else {
        DB::table('users')
            ->where('id', $token)
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
            'status' =>1,
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
    public function vendorlogin(Request $request){
        $username = $request->email;
        $password = $request->password;
    
        $vendor = DB::table('users')
            ->where('email', $username)
            ->first();
      
        if ($vendor && Hash::check($password, $vendor->password) && $vendor->email_verified_at) { 
            $otp = rand(100000, 999999);
  
            $token ="6832f806621dd4e311ff429272dd233b";
        $sid ="AC459d498590d1cd2ea6474336b8db0ca6";
        
        $client = new Client($sid, $token);
        $client->messages->create(
            // The number you'd like to send the message to
            $vendor->phone,
            [
                // A Twilio phone number you purchased at https://console.twilio.com
                'from' => '+12407246907',
                // The body of the text message you'd like to send
                'body' => "Hey Jenny! Good luck on the bar exam!".$otp
            ]
        );

        // $verification_check = $client->verify->v2->services("VA8d507a708fe76751d68a2043e17cff37")
        // ->verificationChecks
        // ->create([
        //              "to" => $vendor->phone,
        //              "code" => "Your Otp is ".$otp
        //          ]
        // );
            return response()->json(['message' => 'Login successful']);
        } elseif ($vendor && Hash::check($password, $vendor->password) && !$vendor->email_verified_at) {            
            return response()->json(['error' => 'Email not verified'], 401);
        } else {
            return response()->json(['error' => 'Invalid email or password'], 401);
        }
    }

  
}

