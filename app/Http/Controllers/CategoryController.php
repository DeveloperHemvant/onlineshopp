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
       
        if (empty($request->category_name)) {
            return response()->json(['message' => 'Category name cannot be empty'], 400);
        }
        if (empty($request->category_photo)) {
            return response()->json(['message' => 'Category photo cannot be empty'], 400);
        }
       

        
        $existingCategory = DB::table('categorys')->where('cat_name', $request->category_name)->first();
        if ($existingCategory) {
  
        return response()->json(['message' => 'Category already exists'], 400);
        }
        $filename=time().'.'.$request->category_photo->extension();
       
        $request->category_photo->move('public/category_images',$filename);
            DB::table('categorys')->insert([
                'cat_name'=>$request->category_name,
                'cat_photo'=>$filename,
            ]);
            return response()->json(['message' => 'Category added successfully']);
       
    }

   //show the all category
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
        
        $pic= DB::table('categorys')->where('id',$id)->value('cat_photo');
       // return $pic;
       DB::table('categorys')->where('id',$id)->delete();
        
       $image_path= public_path("/public/category_images/") .$pic;
       
      $filePath= File::delete($image_path);
       $sub_cat_photo= DB::table('sub_categories')->where('cat_id',$id)->value('sub_cat_photo');
      
        $sub_cat_pic=public_path("/public/sub_category_images/").$sub_cat_photo;
        
        $subfile=File::delete($sub_cat_pic);
        return back();
    }
    public function sub_category(){
        $category=DB::table('categorys')->get();
        return view('Admin.sub_category',['category'=>$category]);
    }
    public function sub_category_add(Request $request){
      
        $request->validate([
            'category_name' => 'required|string|max:255',
            'sub_category_name' => 'required|string|max:255',
            'sub_category_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240', 
        ]);
       
        $filename=$request->sub_category_name.'.'.$request->sub_category_photo->extension();
        //dd($request->all(), $request->file('sub_category_photo'));
       // return $filename;
        $request->sub_category_photo->move('public/sub_category_images',$filename);
           $sub= DB::table('sub_categories')->insert([
                'cat_id'=>$request->category_name,
                'sub_cat_name'=>$request->sub_category_name,
                'sub_cat_photo'=>$filename,
            ]);
            return response()->json(['message' => 'Sub Category added successfully']);
       
    }
    public function show_sub_category( )
    {
        $user=DB::table('sub_categories')->get();
     
        return view('Admin/displaysub_categories',['category'=>$user]);
    }
}
