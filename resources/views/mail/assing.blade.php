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
Dear {{$user->name}},
<h1 style="text-align: center;">Product Order Shipping Assing By <b>{{$comment->user->name}}</b></h1>
<div><b>Receiver information</b></div>
<div><b>Name :</b> {{$productOrder->name}} </div>
<div><b>Address :</b> {{$productOrder->city->name}}, {{$productOrder->address}}  </div>
<div><b>Contact :</b> {{$productOrder->contact}} </div>
<div><b>ALt. Contact :</b> {{$productOrder->alt_contact}} </div>
<div><b>Email :</b> {{$productOrder->email}} </div>
----------------------------------------------------------------------
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
    <a href="{{route('product-orders.show',$productOrder)}}">
        <button class="button button1">View Product</button>
    </a>
</div>
<br>
<br>
<div><b>Comments</b></div>
{!!$comment->message!!}
<br>
<br>

@endcomponent