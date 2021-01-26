@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row">
                        @forelse ($productOrders as $productOrder)
                        <div class="col-md-3">
                            <a href="{{route('product-orders.show',$productOrder)}}">
                                <div class="card my-1">
                                    <div class="card-body">
                                        <h6 class="card-title">{{$productOrder->product_name}} ({{$productOrder->code}})</h6>
                                        <div class="card-text">
                                            <div><b>Order Date :</b> {{$productOrder->date}}</div>
                                            <div><b>Reciver :</b> {{$productOrder->name}}</div>
                                            <div><b>Contact :</b> {{$productOrder->contact}}</div>
                                            <div><b> Address : </b> {{$productOrder->city->provinces}},
                                                {{$productOrder->city->name}}, {{$productOrder->address}}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @empty

                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection