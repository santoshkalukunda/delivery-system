<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductOrderRequest;
use App\Models\Branch;
use App\Models\City;
use App\Models\Comment;
use App\Models\Customer;
use App\Models\ProductOrder;
use App\Models\User;
use App\Notifications\AssingNotification;
use App\Notifications\DeliveredNotification;
use App\Notifications\ProductConfirmNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ProductOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::get(['id', 'name', 'provinces']);
        $branches = Branch::get(['id', 'name']);
        $customers = Customer::get(['id', 'name', 'contact']);
        $users = User::with('branch')->get(['id', 'name', 'branch_id']);
        if (Auth::user()->hasRole(['admin'])) {
            $productOrders = ProductOrder::with('customer', 'city', 'user', 'branch')->latest()->paginate();
        } else {
            $productOrders = ProductOrder::with('customer', 'city', 'user', 'branch')->where('branch_id', Auth::user()->branch_id)->latest()->paginate();
            // $users = User::with('branch')->where('branch_id', Auth::user()->branch_id)->get(['id', 'name', 'branch_id']);
        }
        return view('product-order.index', compact('productOrders', 'cities', 'branches', 'customers', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer = null, ProductOrder $productOrder = null)
    {
        // $customer->load('productOrder','city');
        $branches = Branch::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        $productOrders = ProductOrder::with('city', 'branch')->where('customer_id', $customer->id)->paginate(10);
        return view('product-order.create', compact('customer', 'cities', 'branches', 'productOrders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductOrderRequest $request, Customer $customer)
    {
        $product_order = new ProductOrder($request->validated());
        $customer->productOrder()->save($product_order);
        $comment = Comment::create([
            'product_order_id' => $product_order->id,
            'user_id' => Auth::user()->id,
            'message' => "<b class='text-success'>Product Order Created</b>. <br>",
        ]);


        Notification::send($customer, new ProductConfirmNotification($customer,$product_order));


        $customer = Customer::where('contact', $request->contact)->first();
        if (!$customer) {
            $customer = Customer::create([
                'name' => $request->name,
                'contact' => $request->contact,
                'city_id' => $request->city_id,
                'address' => $request->address,
                'email' => $request->email,
                'details' => "Alter navive Contact No. " . $request->alt_contact,
            ]);
        }
        return redirect()->route('product-orders.show', $product_order)->with('success', 'New Order created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function show(ProductOrder $productOrder)
    {
        $users = User::where('branch_id', $productOrder->branch_id)->get();
        $comments = $productOrder->comment()->with('user')->latest()->get();
        return view('product-order.show', compact('productOrder', 'users', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductOrder $productOrder)
    {
        $branches = Branch::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        return view('product-order.edit', compact('productOrder', 'cities', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function update(ProductOrderRequest $request, ProductOrder $productOrder)
    {
        $customer = $productOrder->update($request->validated());
        return redirect()->back()->with('success', 'Customer updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductOrder $productOrder)
    {
        $productOrder->delete();
        return redirect()->back()->with('success', 'Order deleted');
    }

    public function assing(Request $request, ProductOrder $productOrder)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required',
        ]);
        $productOrder->update([
            'user_id' => $request->user_id,
            'status' => 'shipping',
        ]);
        $user = User::findOrFail($request->user_id);
        $data = "Assing to <b>$user->name</b>. <br>" . $request->message;
        $comment = Comment::create([
            'product_order_id' => $productOrder->id,
            'user_id' => Auth::user()->id,
            'message' => $data,
        ]);
    
        Notification::send($user, new AssingNotification($user,$productOrder,$comment));
        return redirect()->route('product-orders.show', $productOrder)->with('success', 'Product assigned.');
    }

    public function delivered(Request $request, ProductOrder $productOrder)
    {
        $request->validate([
            'message' => 'required',
        ]);
        $productOrder->update([
            'user_id' => Auth::user()->id,
            // 'payment_status' => true,
            'status' => 'delivered',
        ]);

        $data = "<b class='text-success'>Delivered</b>. <br>" . $request->message;
        $comment = Comment::create([
            'product_order_id' => $productOrder->id,
            'user_id' => Auth::user()->id,
            'message' => $data,
        ]);
        $user = User::findOrFail(Auth::user()->id);
        Notification::send($user, new DeliveredNotification($user, $productOrder, $comment));
        return redirect()->route('product-orders.show', $productOrder)->with('success', 'Product Delivered.');
    }
    public function notDeliver(Request $request, ProductOrder $productOrder)
    {
        $request->validate([
            'message' => 'required',
        ]);
        $productOrder->update([
            'user_id' => Auth::user()->id,
            // 'payment_status' => false,
            'status' => 'not-deliver',
        ]);
        $data = "<b class='text-danger'>Not-Delivered</b>. <br>" . $request->message;
        $comment = Comment::create([
            'product_order_id' => $productOrder->id,
            'user_id' => Auth::user()->id,
            'message' => $data,
        ]);
        return redirect()->route('product-orders.show', $productOrder)->with('success', 'Product Not Deliverd.');
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
        if ($request->has('payment_status')) {
            if ($request->payment_status != null)
                $productOrders = $productOrders->where('payment_status', ["$request->payment_status"]);
        }
        if ($request->has('min_quantity')) {
            if ($request->min_quantity != null && $request->max_quantity != null) {
                // $productOrders = $productOrders->where('quantity','>=', ["$request->min_quantity"])->Where('quantity','<=', ["$request->max_quantity"]);
                $productOrders = $productOrders->whereBetween('quantity', [$request->min_quantity, $request->max_quantity]);
            }
        }
        if ($request->has('min_price')) {
            if ($request->min_price != null) {
                // $productOrders = $productOrders->where('price','>=', ["$request->min_price"])->where('price','<=', ["$request->max_price"]);
                $productOrders = $productOrders->whereBetween('price', [$request->min_price, $request->max_price]);
            }
        }
        if ($request->has('from')) {
            if ($request->from != null && $request->to != null) {
                $productOrders = $productOrders->whereBetween('date', [$request->from, $request->to]);
            }
        }
        $productOrders = $productOrders->paginate();
        $users = User::with('branch')->get(['id', 'name', 'branch_id']);
        $cities = City::get(['id', 'name', 'provinces']);
        $branches = Branch::get(['id', 'name']);
        $customers = Customer::get(['id', 'name', 'contact']);
        return view('product-order.index', compact('productOrders', 'cities', 'branches', 'customers', 'users'));
    }

    public function client(Request $request){
        $request->validate([
            'product_order_id' => 'required|exists:product_orders,id',
        ]); 
        $product_order=ProductOrder::findOrFail($request->product_order_id);
        return view('client.index',compact('product_order'));
    }
}
