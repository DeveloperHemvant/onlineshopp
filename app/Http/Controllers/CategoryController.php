<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class CategoryController extends Controller
{
    public function category(){
        return view('Admin.category');  
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function category_add(Request $request)
    {   
        
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
       $filename=time().'.'.$request->category_photo->extension();
       
       $request->category_photo->move('public/category_images',$filename);
        DB::table('categorys')->insert([
            'cat_name'=>$request->category_name,
            'cat_photo'=>$filename,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function category_show( )
    {
       
        $user=DB::table('categorys')->get();
        return view('Admin/displaycategory',['category'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $user=DB::table('categorys')->where('id',$id)->get();
        // return $user;
        return view('Admin/editcategory',compact('user')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        $pic= DB::table('categorys')->where('id',$id)->find('cat_photo');
        return $pic;
        // $image_path= public_path("public/category_images".$pic);
        // File::delete($image_path);
        // DB::table('categorys')->where('id',$id)->delete();
        // return back();
    }
}
