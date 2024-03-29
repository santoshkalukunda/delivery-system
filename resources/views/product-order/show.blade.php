@extends('layouts.backend')
@section('title')
Product Order
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Product Order Status</div>
            </div>
            <div class="ibox-body">
           
                    @if (Auth::user()->hasRole(['admin']))
                        @include('product-order.show-form-button')
                    @else
                        @if ($productOrder->branch_id == Auth::user()->branch_id && $productOrder->status == "confirm" OR $productOrder->status =="shipping")
                            @include('product-order.show-form-button')
                        @endif
                    @endif
                <fieldset class="border p-2">
                    <legend class="w-auto font-15">Sender Details</legend>
                    <div class="row">
                        <div class="col-md-3">
                            <b>Name : </b> {{$productOrder->customer->name}}
                        </div>
                        <div class="col-md-3">
                            <b> Contact : </b> {{$productOrder->customer->contact}}
                        </div>
                        <div class="col-md-3">
                            <b> Email : </b> {{$productOrder->customer->email}}
                        </div>
                        <div class="col-md-3">
                            <b> Address : </b> {{$productOrder->customer->city->provinces}},
                            {{$productOrder->customer->city->name}}, {{$productOrder->customer->address}}
                        </div>
                    </div>

                </fieldset>
                <fieldset class="border p-2">
                    <legend class="w-auto font-15">Reciever Details</legend>
                    <div class="row">
                        <div class="col-md-3">
                            <b>Name : </b> {{$productOrder->name}}
                        </div>
                        <div class="col-md-3">
                            <b> Contact : </b> {{$productOrder->contact}}
                        </div>
                        <div class="col-md-3">
                            <b>Alt. Contact : </b> {{$productOrder->alt_contact}}
                        </div>
                        <div class="col-md-3">
                            <b> Address : </b> {{$productOrder->city->provinces}},
                            {{$productOrder->city->name}}, {{$productOrder->address}}
                        </div>
                        <div class="col-md-3">
                            <b> Email : </b> {{$productOrder->email}}
                        </div>
                    </div>
                </fieldset>
                <fieldset class="border p-2">
                    <legend class="w-auto font-15">Product Details</legend>
                    <div class="row">
                        <div class="col-md-3">
                            <b>Order Date : </b> {{$productOrder->date}}
                        </div>
                        <div class="col-md-3">
                            <b> Branch : </b> {{$productOrder->branch->name}}
                        </div>
                        <div class="col-md-3">
                            <b> Product Code : </b> {{$productOrder->code}}
                        </div>
                        <div class="col-md-3">
                            <b> Product Name : </b> {{$productOrder->product_name}}
                        </div>

                        <div class="col-md-2">
                            <b> Quantity : </b> {{$productOrder->quantity}}
                        </div>
                        <div class="col-md-2">
                            <b> Price : </b> {{$productOrder->price}}
                        </div>
                        <div class="col-md-3">
                            <b> Payment Status : </b> {{$productOrder->payment_status ? 'Paid' : 'COD'}}
                        </div>
                        <div class="col-md-2">
                            <b> Status : </b>
                            @if ($productOrder->status=="confirm")
                            <span class="bg-primary px-2 py-1 text-white badge-pill">{{$productOrder->status}}</span>
                            @elseif ($productOrder->status=="shipping")
                            <span class="bg-warning px-2 py-1 text-white badge-pill"
                                p-2">{{$productOrder->status}}</span>
                            @elseif ($productOrder->status=="delivered")
                            <span class="bg-success px-2 py-1 text-white badge-pill"
                                p-2">{{$productOrder->status}}</span>
                            @else
                            <span class="bg-danger px-2 py-1 text-white badge-pill"
                                p-2">{{$productOrder->status}}</span>
                            @endif
                        </div>

                        <div class="col-md-3">
                            <b> Delivery Agent : </b> {{$productOrder->user_id ? $productOrder->user->name : '' }}
                        </div>
                        @if ($productOrder->details)
                        <div class="col-md-12 mt-2">
                            <b>Product Details</b>
                            <div style="width: 100%; height: 130px; overflow-y: scroll;">
                                {!! $productOrder->details !!}
                            </div>
                        </div>
                        @endif
                    </div>
                </fieldset>
                <fieldset class="border p-2">
                    <legend class="w-auto font-15">Comments</legend>

                    <div class="col-md-12 mt-2">
                        <div style="width: 100%; height: 130px; overflow-y: scroll;">
                            @foreach ($comments as $comment)
                            <div><b>{{$comment->user->name}}</b> <span
                                    class="text-secondary">{{$comment->created_at->diffForHumans()}}</span></div>
                            {!!
                            $comment->message
                            !!}
                            <hr>
                            @endforeach
                        </div>
                    </div>

                </fieldset>
            </div>
        </div>
    </div>
</div>
@endsection