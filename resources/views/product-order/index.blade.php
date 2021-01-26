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
  @include('product-order.filter')
</div>

@include('modal.find-customer-modal')
@include('product-order.product-list')
@endsection