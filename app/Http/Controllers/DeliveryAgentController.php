<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\ProductOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DeliveryAgentController extends Controller
{

    public function index()
    {
        $users = User::findOrFail(Auth::user()->id);
        $productOrders = $users->productOrder()->with('city')->where('status', 'shipping')->latest()->paginate(20);
        $delivered = $users->productOrder()->where('status', 'delivered')->count();
        $notDeliver = $users->productOrder()->where('status', 'not-delivered')->count();
        $cities = City::get(['id', 'name', 'provinces']);
        return view('home', compact('productOrders', 'delivered', 'notDeliver', 'cities'));
        // $productOrders=ProductOrder::with('city')->where('status','shipping')->Where('user_id', Auth::user()->id)->get();
        // return view('delivery-agent.home',compact('productOrders'));
    }
    public function search(Request $request)
    {
        $productOrders = new productOrder;
        if ($request->has('branch_id')) {
            if ($request->branch_id != null)
                $productOrders = $productOrders->where('branch_id', ["$request->branch_id"]);
        }
        if ($request->has('city_id')) {
            if ($request->city_id != null)
                $productOrders = $productOrders->where('city_id', ["$request->city_id"]);
        }
        if ($request->has('user_id')) {
            if ($request->user_id != null)
                $productOrders = $productOrders->where('user_id', ["$request->user_id"]);
        }
        if ($request->has('customer_id')) {
            if ($request->customer_id != null)
                $productOrders = $productOrders->where('customer_id', ["$request->customer_id"]);
        }
        if ($request->has('name')) {
            if ($request->name != null)
                $productOrders = $productOrders->where('name', 'LIKE', ["$request->name%"]);
        }
        if ($request->has('email')) {
            if ($request->email != null)
                $productOrders = $productOrders->where('email', 'LIKE', ["$request->email%"]);
        }
        if ($request->has('contact')) {
            if ($request->contact != null)
                $productOrders = $productOrders->where('contact', ["$request->contact"]);
        }
        if ($request->has('address')) {
            if ($request->address != null)
                $productOrders = $productOrders->where('address', 'LIKE', ["$request->address%"]);
        }
        if ($request->has('product_name')) {
            if ($request->product_name != null)
                $productOrders = $productOrders->where('product_name', 'LIKE', ["$request->product_name%"]);
        }
        if ($request->has('code')) {
            if ($request->code != null)
                $productOrders = $productOrders->where('code', 'LIKE', ["$request->code%"]);
        }
        if ($request->has('status')) {
            if ($request->status != null)
                $productOrders = $productOrders->where('status', ["$request->status"]);
        }

        $users = User::findOrFail(Auth::user()->id);
        $productOrders = $productOrders->where('user_id',$users->id)->latest()->paginate();
        $delivered = $users->productOrder()->where('status', 'delivered')->count();
        $notDeliver = $users->productOrder()->where('status', 'not-delivered')->count();
        $cities = City::get(['id', 'name', 'provinces']);
        return view('home', compact('productOrders', 'delivered', 'notDeliver', 'cities'));
    }
  
}
