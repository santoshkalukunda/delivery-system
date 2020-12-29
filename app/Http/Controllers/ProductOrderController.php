<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductOrderRequest;
use App\Models\Branch;
use App\Models\City;
use App\Models\Customer;
use App\Models\ProductOrder;
use Illuminate\Http\Request;

class ProductOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productOrders=ProductOrder::with('customer','city','user','branch')->latest()->get();
        return view('product-order.index',compact('productOrders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer=null, ProductOrder $productOrder=null)
    {
        // $customer->load('productOrder','city');
        $branches = Branch::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        $productOrders=ProductOrder::with('city','branch')->where('customer_id',$customer->id)->get();
        return view('product-order.create', compact('customer', 'cities', 'branches','productOrders'));
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
        return redirect()->back()->with('success', 'New Order created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function show(ProductOrder $productOrder)
    {
        
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
        return view('product-order.edit',compact('productOrder','cities','branches'));
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
        return redirect()->back()->with('success','Order deleted');
    }
}
