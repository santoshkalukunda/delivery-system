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
<div class="row">
    <div class="col-md-2">
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#filter" role="button" aria-expanded="false"
                aria-controls="filter">
                <i class="fa fa-filter"></i> Filter
            </a>
        </p>
    </div>
    <div class="col-md-12 mb-2">
        <div class="collapse" id="filter">
            <div class="card card-body">
                <form action="{{route('delivery-agent.search')}}" method="get">
                    <div class="row">
                    
                        <div class="col-md-3 form-group">
                            <label for="">City</label>
                            <select class="selectpicker form-control @error('city_id') is-invalid @enderror"
                                name="city_id" id="city" data-live-search="true" data-size="5">
                                <option value="" selected>Select City</option>
                                @foreach ($cities as $city)
                                <option value="{{$city->id}}" data-subtext="{{$city->provinces}}"> {{$city->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="col-md-3 form-group">
                            <label for="">Sender Contact</label>
                            <select class="selectpicker form-control" name="customer_id" data-live-search="true"
                                data-size="5">
                                <option value="">Select Contact</option>
                                @foreach ($customers as $customer)
                                <option value="{{$customer->id}}" data-subtext="{{$customer->name}}">
                                    {{$customer->contact}}
                                </option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="col-md-3 form-group">
                            <label for="">Reciever Contact</label>
                            <input type="text" class=" form-control" name="contact" placeholder="Reciever Contact no.">
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="">Reciever Name</label>
                            <input type="text" class=" form-control" name="name" placeholder="Reciever Name">

                        </div>
                        <div class="col-md-3 form-group">
                            <label for="">Reciever Email</label>
                            <input type="text" class=" form-control" name="email" placeholder="Reciever Email">
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="">Reciever Address</label>
                            <input type="text" class=" form-control" name="address" placeholder="Address">
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="">Order Date From</label>
                            <input type="date" class=" form-control" name="from">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="">Order Date to</label>
                            <input type="date" class=" form-control" name="to" value="">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="">Product Name</label>
                            <input type="text" class=" form-control" name="product_name" placeholder="Product Name">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="">Product Code</label>
                            <input type="text" class=" form-control" name="code" placeholder="Product code">
                        </div>
                       
                        {{-- <div class="col-md-2 form-group">
                            <label for="">Payment Method</label>
                            <select name="payment_status" id="" class="form-control">
                                <option value="">Select Method</option>
                                <option value="0">Cash on Delivery</option>
                                <option value="1">Paid</option>
                            </select>
                        </div> --}}

                        <div class="col-md-2 form-group">
                            <label for="">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="">Select status</option>
                                <option value="shipping">Shipping</option>
                                <option value="delivered">Delivered</option>
                                <option value="not-deliver">Not-Deliver</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <input type="submit" class="form-control btn- btn-primary" value="Search">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="ibox">
            <div class="ibox-head d-flex">
                <div class="ibox-title">Products List</div>
                <div class="text-right">Total Record: {{$productOrders->total()}}</div>
            </div>
            <div class="ibox-body">
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
                                        <div><b>Status :</b> {{$productOrder->status}}</div>
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
        <div class="mt-3">
            {{$productOrders->links()}}
        </div>
    </div>
</div>