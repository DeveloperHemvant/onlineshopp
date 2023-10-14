<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function login(){
        return view('Admin.adminlogin');  
    }
    public function adminlogin(Request $request){
        $result=Admin::where(['email'=>$request->email,'password'=>$request->password])->get();
      // return $result[0]->id;
        if(isset($result[0]->id)){
            session(['admin_login' => true, 'admin_id' => $result[0]->id]);
            
            return redirect('admin/dashboard');
        }else{
            $request->session()->flash('error','Please enter valid details to login');
            return redirect('admin/login');
        }
    }
    public function dashboard(){

        return view('Admin.dashboard');  
    }
    public function logout(Request $request)
    {
        Auth::logout();
     

        $request->session()->invalidate();
        $response = \Response::make('', 200);
        $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->header('Pragma', 'no-cache');
        $response->header('Expires', 'Sat, 01 Jan 1990 00:00:00 GMT');
        return redirect('admin/login');
        //return view('Admin.adminlogin');  
    }
   
}
