@component('mail::message')
<style>
    .button {
      background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }
    
    .button1 {padding: 10px 24px;}
    .button2 {padding: 12px 28px;}
    .button3 {padding: 14px 40px;}
    .button4 {padding: 32px 16px;}
    .button5 {padding: 16px;}
    </style>
Dear {{$customer->name}},
<h1 style="text-align: center;">Thank you for your order</h1>
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
<div>We were happy to provide your product needs, and we look forward our continued relationship.</div>
<br>
<br>
@endcomponent