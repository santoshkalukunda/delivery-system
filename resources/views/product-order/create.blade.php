@extends('layouts.backend')
@section('title')
Product Order
@endsection
@section('content')    
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Product Order Form</div>
            </div>
            <div class="ibox-body">
                <form action="{{route('product-orders.store',$customer)}}" method="post">
                    @csrf
                    <fieldset class="border p-2">
                        <legend class="w-auto">Shipping Details</legend>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="number" class="required">Contact number</label>
                                <input type="tel" id="number" name="contact"
                                    class="form-control @error('contact') is-invalid @enderror"
                                    value="{{old('contact',$customer->contact)}}" placeholder="98XXXXXXXX">
                                @error('contact')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name" class="required">Customer Name</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{old('name',$customer->name)}}" placeholder="Name">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="city" class="required">City</label>
                                <select class="selectpicker form-control @error('city_id') is-invalid @enderror"
                                    name="city_id" id="city" data-live-search="true" data-size="5">
                                    <option value="" selected>Select City</option>
                                    @foreach ($cities as $city)
                                    <option value="{{$city->id}}" data-subtext="{{$city->provinces}}"
                                        {{$city->id == $customer->city_id ? 'selected' : ''}}> {{$city->name}}</option>
                                    @endforeach
                                </select>

                                @error('city_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email Address</label>
                                <input type="text" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{old('email',$customer->email)}}" placeholder="example@domain.com">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" name="address"
                                    class="form-control @error('address') is-invalid @enderror"
                                    value="{{old('address',$customer->address)}}" placeholder="Address">
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="number">Alternative Contact number</label>
                                <input type="tel" id="number" name="alt_contact"
                                    class="form-control @error('alt-contact') is-invalid @enderror"
                                    value="{{old('alt_contact')}}" placeholder="98XXXXXXXX">
                                @error('alt-contact')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                        </div>
                    </fieldset>
                    <fieldset class="border p-2">
                        <legend class="w-auto">Product Information</legend>
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="date" class="required">Order Date</label>
                                <input type="text" name="date" class="form-control @error('date') is-invalid @enderror"
                                    id="date" value="{{old('date')}}" placeholder="YYYY-MM-DD">
                                @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="branch_id" class="required">Branch</label>
                                <select class="form-control @error('branch_id') is-invalid @enderror" name="branch_id"
                                    id="branch_id">
                                    <option value="" selected>Select Branch</option>
                                    @foreach ($branches as $branch)
                                    <option value="{{$branch->id}}"
                                        {{$branch->id == $customer->branch_id ? 'selected' : ''}}>
                                        {{$branch->name}}</option>
                                    @endforeach
                                </select>
                                @error('branch_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="code" class="required">Product Code</label>
                                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
                                    id="code" placeholder="Product Code">
                                @error('code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="name" class="required">Product Name</label>
                                <input type="text" name="product_name"
                                    class="form-control @error('product_name') is-invalid @enderror" id="name"
                                    placeholder="Product Name">
                                @error('product_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="quantity" class="required">Product Quantity</label>
                                <input type="text" name="quantity"
                                    class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                                    placeholder="Product Quntity with unit.">
                                @error('quantity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="price" class="required">Product Price</label>
                                <input type="number" name="price"
                                    class="form-control @error('price') is-invalid @enderror" id="price" min="0"
                                    placeholder="Product price in Rs.">
                                @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="payment_status" class="required">Payment Status</label>
                                <select type="number" name="payment_status"
                                    class="form-control @error('payment_status') is-invalid @enderror"
                                    id="payment_status">
                                    <option value="">Select...</option>
                                    <option value="0">Cash on delivery</option>
                                    <option value="1">Paid</option>
                                </select>
                                @error('payment_status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="details">Product details</label>
                                <textarea type="text" name="details"
                                    class="form-control @error('details') is-invalid @enderror" id="details"
                                    placeholder="Product details with unit."></textarea>
                                @error('details')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <button type="reset" class="btn btn-danger form-control btn-rounded">Cancel</button>
                            </div>
                            <div class="form-group col-md-2">
                                <button type="submit" class="btn btn-success form-control btn-rounded">Next</button>
                            </div>

                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- listing product orders history --}}
@include('product-order.product-list')
@push('scripts')
<script type="text/javascript">
var mainInput = document.getElementById("date");
 /* Initialize Datepicker with options */
 mainInput.nepaliDatePicker({
     ndpYear: true,
     ndpMonth: true,
     ndpYearCount: 100
 });
</script>
@endpush
@endsection