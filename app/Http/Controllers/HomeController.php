<?php

namespace App\Http\Controllers;

use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->hasRole(['admin'])) {
            $confirm = ProductOrder::where('status', 'confirm')->count();
            $shipping = ProductOrder::where('status', 'shipping')->count();
            $delivered = ProductOrder::where('status', 'delivered')->count();
            $notDeliver = ProductOrder::where('status', 'not-delivered')->count();
            $productOrders = ProductOrder::with('customer', 'city', 'user', 'branch')->latest()->paginate(20);
            return view('home', compact('confirm', 'shipping', 'delivered', 'notDeliver', 'productOrders'));
        } elseif (Auth::user()->hasRole(['user'])) {
            $confirm = ProductOrder::where('status', 'confirm')->where('branch_id', Auth::user()->branch->id)->count();
            $shipping = ProductOrder::where('status', 'shipping')->where('branch_id', Auth::user()->branch->id)->count();
            $delivered = ProductOrder::where('status', 'delivered')->where('branch_id', Auth::user()->branch->id)->count();
            $notDeliver = ProductOrder::where('status', 'not-deliver')->where('branch_id', Auth::user()->branch->id)->count();
            $productOrders = ProductOrder::with('customer', 'city', 'user', 'branch')->where('branch_id',Auth::user()->branch_id)->latest()->paginate(20);
            return view('home', compact('confirm', 'shipping', 'delivered', 'notDeliver','productOrders'));
        } else {
            return redirect()->route('delivery-agent.index');
            // $productOrders = ProductOrder::with('city')->where('status', 'shipping')->Where('user_id', Auth::user()->id)->latest()->paginate(20);
            // $delivered = ProductOrder::where('status', 'delivered')->Where('user_id', Auth::user()->id)->count();
            // $notDeliver = ProductOrder::where('status', 'not-delivered')->Where('user_id', Auth::user()->id)->count();
            // return view('home', compact('productOrders','delivered','notDeliver'));
        }
    }
}
