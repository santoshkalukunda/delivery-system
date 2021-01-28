@extends('layouts.app')
@section('content')
<div class="container">

    <div class="card">
        <div class="card-header">
            Your Order Status
        </div>
        <div class="card-body">
            <table class="table table-responsive table-borderless">
                <tr>
                    <th>
                        Order Id :
                    </th>
                    <td>
                        {{$product_order->id}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Order Date :
                    </th>
                    <td>
                        {{$product_order->date}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Product :
                    </th>
                    <td>
                        {{$product_order->product_name}}, {{$product_order->code}}
                    </td>
                </tr>
            </table>
            <div class="d-flex justify-content-around">
                <div>
                    @if ($product_order->status == 'confirm' || $product_order->status == 'shipping' ||
                    $product_order->status == 'not-deliver' || $product_order->status == 'delivered' )
                    <b><i class="fa fa-check-circle text-primary"></i> Confirm</b>
                    @endif
                </div>
                <div class="">
                    @if ($product_order->status == 'shipping' || $product_order->status == 'not-deliver' ||
                    $product_order->status == 'delivered')
                    <b>Shipping <i class="fa fa-shipping-fast text-warning"></i></b>
                    @else
                    <span>Shipping</span>
                    @endif
                </div>
                <div class="">
                    @if ($product_order->status == 'delivered')
                    <b><i class="fas fa-smile-beam text-success"></i> Delivered</b>
                    @elseif ($product_order->status == 'not-deliver')
                    <b><i class="fas fa-times-circle text-danger"></i> Not Deliver</b>
                    @else
                    <span>Delivered</span>
                    @endif
                </div>
            </div>
            <div class="progress">
                @if ($product_order->status == 'confirm')
                <div class="progress-bar bg-info" role="progressbar" style="width: 18%" aria-valuenow="20" aria-valuemin="0"aria-valuemax="100"></div>
                @elseif($product_order->status == 'shipping')
                <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50"aria-valuemin="0" aria-valuemax="100"></div>
                @elseif( $product_order->status == 'delivered')
                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="20"
                aria-valuemin="0" aria-valuemax="100"></div>
                @else
                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="20"
                aria-valuemin="0" aria-valuemax="100"></div>
                @endif


                
            </div>
        </div>
    </div>
</div>
@endsection