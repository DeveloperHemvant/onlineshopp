@extends('Admin/dashboard')
<br><br><br>
@section('content')
<div class="row">
    @foreach ($category as $item)
   
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title mb-3">{{$item->cat_id}}</strong>
                </div>
                <div class="card-body">
                    <div class="mx-auto d-block">
                        <img class="rounded-circle mx-auto d-block" src="{{asset('public/sub_category_images/'.$item->sub_cat_photo)}}" alt="{{$item->sub_cat_photo}}">
                        <h5 class="text-sm-center mt-2 mb-1">{{$item->sub_cat_name}}</h5>
                        
                    <hr>
                    <div class="card-text text-sm-center">
                        <a href="{{url('admin/category/delete/'.$item->id)}}" class="btn btn-danger mr-700 mr-5">Delete</a>
                        <a href="{{url('admin/category/update/'.$item->id)}}" class="btn btn-primary mr-5">Update</a>
                        <a href="#" class="btn btn-primary mr-5">Show Products </a>
                        
                    </div>
                </div>
            </div>
        </div>    
    @endforeach
</div>
@endsection