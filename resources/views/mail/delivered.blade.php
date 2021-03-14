@component('mail::message')

Dear {{$productOrder->name}},
<h1 style="text-align: center;">Thank you for Choosing as</h1>

<div>Your Product is delivered Done.</div>
<br>
<div>For more Shopping Please visit <a href="https://closetnepal.com.np">closetnepal.com.np</a></div>
<br>
<div><b>Product information and order number</b></div>
<div><b>Order Number :</b> {{$productOrder->id}} </div>
<div><b>Order Date :</b> {{$productOrder->date}} </div>
<div><b>Name :</b> {{$productOrder->product_name}} </div>
<div><b>Quantity :</b> {{$productOrder->quantity}} </div>
<div><b>Total Price :</b> {{$productOrder->price}} </div>
<div><b>Payment Status :</b> {{$productOrder->payment_status == 0 ? 'Case On Delivery' : 'Paid'}} </div>
<br>
<br>
<div style="text-align: center;">
    <a href="{{route('welcome')}}/order?product_order_id={{$productOrder->id}}">
        <button class="button button1">Track Your Order</button>
    </a>
</div>
<br>
<br>
@endcomponent