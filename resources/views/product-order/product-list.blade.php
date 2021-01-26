<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-head d-flex">
                <div class="ibox-title">Product Order List</div>
                <div class="text-right">Total Record: {{$productOrders->total()}}</div>
            </div>
            <div class="ibox-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order_Date</th>
                                <th>Branch</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Sender</th>
                                <th>Reciever</th>
                                <th>Address</th>
                                <th>User by</th>
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
                                <td>{{$productOrder->product_name}}, {{$productOrder->code}}</td>
                                <td>{{$productOrder->quantity}}</td>
                                <td>{{$productOrder->price}} {{$productOrder->payment_status}}</td>
                                <td>{{$productOrder->customer->name}}, {{$productOrder->customer->contact}}</td>
                                <td>{{$productOrder->name}}, {{$productOrder->contact}}</td>
                                <td>{{$productOrder->address}}, {{$productOrder->city->name}} <span  class="text-secondary">{{$productOrder->city->provinces}}</span></td>
                                <td>@if ($productOrder->user_id)
                                    {{$productOrder->user->name}}
                                @endif
                                </td>
                                <td>{{$productOrder->status}}</td>
                                <td>
                                    <a href="{{route('product-orders.show',$productOrder)}}" class="text-muted"><i class="fa fa-eye"></i></a>
                                </td>
                                <td>
                                    <a href="{{route('product-orders.edit',$productOrder)}}" class="text-muted"><i
                                            class="fa fa-edit"></i></a>
                                </td>
                                <td>
                                    <form action="{{route('product-orders.destroy',$productOrder)}}" onsubmit="return confirm('Are you sure to delete?')" method="POST"
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
        {{$productOrders->links()}}
    </div>
</div>