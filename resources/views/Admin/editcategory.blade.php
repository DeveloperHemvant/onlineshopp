@extends('Admin/dashboard')
@section('content')
<br><br><br>
<div class="card">
    <div class="card-header">
        <strong>Edit Category</strong> 
    </div>
    <div class="card-body card-block">
        @foreach ($user as $item)
            
        
        <form action="{{url('admin/category_add')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="hf-email" class=" form-control-label">Category Name</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="category_name" name="category_name" placeholder="Enter Category Name..." class="form-control" value="{{$item->cat_name}}">
                    @error('category_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="hf-photo" class=" form-control-label">Category Photo</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" id="category_photo" name="category_photo" class="form-control" value="{{old('category_image',$item->cat_photo)}}">
                    @error('category_photo')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Update Category
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </form>
        @endforeach
    </div>
    
</div>
@endsection
