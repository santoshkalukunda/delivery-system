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
        $cities=City::get();
        return view('customer.index', compact('customers','cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer = null, $contact = null)
    {
        if (!$customer) {
            $customer = new Customer;
        }
        $cities = City::orderBy('name')->get();
        return view('customer.create', compact('cities', 'customer', 'contact'));
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
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city_id' => 'required',
            'email' => 'nullable|email',
            'details' => 'nullable'
        ]);
        $customer->update($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer Updated.');
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
    public function find(Request $request)
    {
        $customer=Customer::where('contact',$request->contact)->first();
        if($customer){
            return redirect()->route('customers.show', $customer);
        }
        return redirect()->route('customers.create');
    }

    public function search(Request $request)
    {
        $customers = new Customer;
        if ($request->has('city_id')) {
            if ($request->city_id != null)
                $customers = $customers->where('city_id', ["$request->city_id"]);
        }
        if ($request->has('name')) {
            if ($request->name != null)
                $customers = $customers->where('name', 'LIKE', ["$request->name%"]);
        }
        if ($request->has('email')) {
            if ($request->email != null)
                $customers = $customers->where('email', 'LIKE', ["$request->email%"]);
        }
        if ($request->has('contact')) {
            if ($request->contact != null)
                $customers = $customers->where('contact',["$request->contact"]);
        }
        if ($request->has('address')) {
            if ($request->address != null)
            $customers = $customers->where('address', 'LIKE', ["$request->address%"]);
        }
        $customers = $customers->paginate();
        $cities=City::get();
        return view('customer.index', compact('customers','cities'));
    }
}
