@extends('layouts.backend')
@section('title')
Product Order List
@endsection
@section('content')
<div class="row">
    <div class="col-md-2">
        <button type="button" class="btn btn-primary mb-2 form-control" data-toggle="modal"
            data-target="#findCustomerModal"> <i class="fa fa-plus"></i> New Order
        </button>
    </div>
    <div class="col-md-2">
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#filter" role="button" aria-expanded="false"
                aria-controls="filter">
                <i class="fa fa-filter"></i> Filter
            </a>
        </p>
    </div>
    <div class="col-md-8 form-group text-right">
        @php
        $total = 0;
        foreach($productOrders as $productOrder)
        {
        $total = $total+$productOrder->price;
        }
        @endphp
        <span class="bg-blue-light p-2"><b>Total Amount: </b>{{$total}}/-</span>
    </div>
  @include('product-order.filter')
</div>

@include('modal.find-customer-modal')
@include('product-order.product-list')
@endsection