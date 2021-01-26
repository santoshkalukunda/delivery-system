<?php

namespace App\Http\Controllers;

use App\Models\ProductOrder;
use Illuminate\Support\Facades\Auth;

class DeliveryAgentController extends Controller
{
    public function index(){
        $productOrders=ProductOrder::with('city')->where('status','shipping')->Where('user_id', Auth::user()->id)->get();
        return view('delivery-agent.home',compact('productOrders'));
    }
}
