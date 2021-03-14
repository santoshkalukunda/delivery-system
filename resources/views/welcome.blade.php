@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <form action="{{route('product-orders.client')}}" method="get">
        <div class="row justify-content-center py-5">
            <div class="text-center my-5">
                
                    <img src="{{asset('assets/img/logo.png')}}" class="" width="40%" alt="closet Nepal Logo">
               
            </div>
            <div class="col-md-5 form-group">
                <input type="text" class="form-control @error('product_order_id') is-invalid @enderror"" name="product_order_id" placeholder="Order Number" autofocus>
                @error('product_order_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-1 form-group">
                <input type="submit" value="Search" class="btn-md btn-primary form-control badge-pill px-3">
            </div>
        </div>
    </form>
    @endsection