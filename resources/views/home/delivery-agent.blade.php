<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-success color-white widget-stat">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong">{{count($productOrders)}}</h2>
                <div class="m-b-5">Shipping</div><i class="fa fa-shipping-fast widget-stat-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-info color-white widget-stat">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong">{{$delivered}}</h2>
                <div class="m-b-5">Delivered</div><i class="fa fa-truck-loading widget-stat-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-warning color-white widget-stat">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong">{{$notDeliver}}</h2>
                <div class="m-b-5">Not-Deliver</div><i class="fa fa-frown widget-stat-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-danger color-white widget-stat">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong">{{$notDeliver + $delivered}}</h2>
                <div class="m-b-5">Total</div><i class="ti-user widget-stat-icon"></i>
            </div>
        </div>
    </div>
</div>
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
                        <a href="{{route('product-orders.show',$productOrder)}}" class="text-dark">
                            <div class="card my-1">
                                <div class="card-body">
                                    <h5 class="card-title font-bold">{{$productOrder->product_name}}
                                        ({{$productOrder->code}})
                                    </h5>
                                    <div class="card-text font-13">
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