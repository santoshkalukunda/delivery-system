<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Branch;
use App\Models\City;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::with('city')->latest()->paginate(20);
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer = null)
    {
        if (!$customer) {
            $customer = new Customer;
        }
        $cities = City::orderBy('name')->get();
        return view('customer.create', compact('cities', 'customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {

        $customer = Customer::create($request->validated());
        return redirect()->route('customers.show', $customer)->with('success', 'Customer Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        // $branches=Branch::orderBy('name')->get();
        // $cities = City::orderBy('name')->get();
        // return view('customer.show', compact('customer','cities','branches'));
        // return view('product-order.create', compact('customer','cities','branches'));
        return redirect()->route('product-orders.create',$customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return $this->create($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());
        return redirect()->route('customers.show', $customer)->with('success', 'Customer Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->back()->with('success', 'Customer Deleted');
    }
    public function view()
    {
        return view('customer.find');
    }
    public function find(Request $request)
    {
        $customer=Customer::where('contact',$request->contact)->first();
        if($customer){
            return redirect()->route('customers.show', $customer);
        }
        return redirect()->route('customers.create', $customer);
    }
}
