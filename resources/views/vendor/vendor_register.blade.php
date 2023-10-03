@extends('Admin/layout')
@section('dashboard')

<div class="card-body card-block">
    <div class="form-group">
        <label for="company" class=" form-control-label">Name</label>
        <input type="text" name="name" placeholder="Enter your company name" class="form-control">
    </div>
    <div class="form-group">
        <label for="vat" class=" form-control-label">Email</label>
        <input type="email" name="vemail" placeholder="DE1234567890" class="form-control">
    </div>
    <div class="form-group">
        <label for="street" class=" form-control-label">Shop Name</label>
        <input type="text" id="street" placeholder="Enter street name" class="form-control">
    </div>
    <div class="row form-group">
        <div class="col-8">
            <div class="form-group">
                <label for="city" class=" form-control-label">City</label>
                <input type="text" id="city" placeholder="Enter your city" class="form-control">
            </div>
        </div>
        <div class="col-8">
            <div class="form-group">
                <label for="postal-code" class=" form-control-label">Postal Code</label>
                <input type="text" id="postal-code" placeholder="Postal Code" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="country" class=" form-control-label">Country</label>
        <input type="text" id="country" placeholder="Country name" class="form-control">
    </div>
    <button class="btn btn-success btn-sm">Register</button>
</div>
@endsection('dashboard')