@extends('Admin/dashboard')
<br><br><br>
@section('content')
<div class="row">
    @foreach ($category as $item)
   
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title mb-3">Category</strong>
                </div>
                <div class="card-body">
                    <div class="mx-auto d-block">
                        <img class="rounded-circle mx-auto d-block" src="{{asset('public/category_images/'.$item->cat_photo)}}" alt="{{$item->cat_photo}}">
                        <h5 class="text-sm-center mt-2 mb-1">{{$item->cat_name}}</h5>
                        <div class="location text-sm-center">
                            <i class="fa fa-map-marker"></i> California, United States</div>
                    </div>
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