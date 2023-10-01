@extends('Admin/dashboard')
@section('content')
<br><br><br>
<div class="card">
    <div id="responseMessage"></div>
    <div class="card-header">
        <strong>Add Category</strong> 
    </div>
    <div class="card-body card-block">
        <form id="sub_category"  class="form-horizontal" enctype="multipart/form-data"  onsubmit="sub_category('sub_category')">
            @csrf
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="hf-email" class=" form-control-label">Category Name</label>
                </div>
                <div class="col-12 col-md-9">
                    <select id="category_name" name="category_name" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->cat_name}}</option>
                        @endforeach
                       
                    </select>
                    @error('category_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="hf-email" class=" form-control-label">Sub Category Name</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="sub_category_name" name="sub_category_name" placeholder="Enter Sub_Category Name..." class="form-control" >
                    @error('category_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="hf-photo" class=" form-control-label">Sub Category Photo</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" id="category_photo" name="sub_category_photo" class="form-control">
                    @error('category_photo')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Add Sub Category
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </form>
    </div>
    
</div>
@endsection
