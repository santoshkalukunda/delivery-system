<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Product Order List</div>
            </div>
            <div class="ibox-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order_Date</th>
                                <th>Branch</th>
                                <th>Product code</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Payment</th>
                                <th>Contact No.</th>
                                <th>City</th>
                                <th>Deliver_by</th>
                                <th>stutus</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($productOrders as $productOrder)
                            <tr>
                                <td>
                                    {{$productOrder->date}}
                                </td>
                                <td>{{$productOrder->branch->name}}</td>
                                <td>{{$productOrder->code}}</td>
                                <td>{{$productOrder->quantity}}</td>
                                <td>{{$productOrder->price}}</td>
                                <td>{{$productOrder->payment_status}}</td>
                                <td>{{$productOrder->contact}}</td>
                                <td>{{$productOrder->city->name}} <span  class="text-secondary">{{$productOrder->city->provinces}}</span></td>
                                <td></td>
                                <td>{{$productOrder->status}}</td>
                                <td>
                                    <a href="" class="text-muted"><i
                                            class="fa fa-eye"></i></a>
                                </td>
                                <td>
                                    <a href="" class="text-muted"><i
                                            class="fa fa-edit"></i></a>
                                </td>
                                <td>
                                    <form action=""
                                        onsubmit="return confirm('Are you sure to delete?')" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="border-0 my-0 p-0 text-danger bg-transparent"><i
                                                class="fa fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10" class="text-center"><span class="text-danger">*No data list Found</span></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>