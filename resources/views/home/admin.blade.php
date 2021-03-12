<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-success color-white widget-stat">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong">{{$confirm}}</h2>
                <div class="m-b-5">Confirm</div><i class="ti-shopping-cart widget-stat-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-info color-white widget-stat">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong">{{$shipping}}</h2>
                <div class="m-b-5">Shipping</div><i class="fa fa-shipping-fast widget-stat-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-warning color-white widget-stat">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong">{{$delivered}}</h2>
                <div class="m-b-5">Delivered</div><i class="fa fa-truck-loading widget-stat-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-danger color-white widget-stat">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong">{{$notDeliver}}</h2>
                <div class="m-b-5">Not Deliver</div><i class="fa fa-frown widget-stat-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-2">
        <div class="card">
            <div class="card-header">{{ __('Daily Product Order') }}</div>
            <div class="card-body">
                <div style="width:100%;">
                    {!! $chartjs->render() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-2">
        <div class="card">
            <div class="card-header">{{ __('Monthly Product Sales') }}</div>
            <div class="card-body">
                <div style="width:100%;">
                    {!! $income->render() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-2">
        <div class="card">
            <div class="card-header">{{ __('Daily Product Sales') }}</div>
            <div class="card-body">
                <div style="width:100%;">
                    {!! $monthIncome->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>


{{-- @include('product-order.product-list') --}}
