@extends('Admin/layout')
@section('dashboard')
<h4>
    @if (!empty($data))
        <p>{{ $data }}</p>
    @endif
</h4>
<div class="card-body card-block">
    <form action="{{url('api/vendorregister')}}" method="post" >
        @csrf
    <div class="form-group">
        <label for="company" class=" form-control-label">Name</label>
        <input type="text" name="name" placeholder="Enter your  name" class="form-control">
    </div>
    <div class="form-group">
        <label for="vat" class=" form-control-label">Email</label>
        <input type="email" name="email" placeholder="abc@gmail.com" class="form-control">
    </div>
    <div class="form-group">
        <label for="phone" class=" form-control-label">Contact No</label>
        <input type="tel" id="phone" name="phone" placeholder="Enter your contact number" class="form-control">
    </div>
    <div class="form-group">
        <label for="street" class=" form-control-label">Shop Name</label>
        <input type="text" id="street" name="shop" placeholder="Enter Shop name" class="form-control">
    </div>
    <div class="row form-group">
        <div class="col-8">
            <div class="form-group">
                <label for="city" class=" form-control-label">City</label>
                <input type="text" id="city" name="city" placeholder="Enter your city" class="form-control">
            </div>
        </div>
        <div class="col-8">
            <div class="form-group">
                <label for="city" class=" form-control-label">District</label>
                <input type="text" id="city" name="district" placeholder="Enter your District" class="form-control">
            </div>
        </div>
        <div class="col-8">
            <div class="form-group">
                <label for="city" class=" form-control-label">State</label>
                <input type="text" id="city" name="state" placeholder="Enter your State" class="form-control">
            </div>
        </div>
        <div class="col-8">
            <div class="form-group">
                <label for="postal-code" class=" form-control-label">Postal Code</label>
                <input type="text" id="postal-code" name="postalcode" placeholder="Postal Code" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="country" class=" form-control-label">Country</label>
        <input type="text" id="country" name="country" placeholder="Country name" class="form-control">
    </div>
    
    <button class="btn btn-success btn-sm">Register</button>
</form>
</div>
@endsection('dashboard')