<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use App\Models\City;
use App\Models\Customer;
use App\Models\ProductOrder;
use Livewire\Component;

class ProductOrderForm extends Component
{
    public $customer;
    public $order;
    // protected $listeners = ['orderCreated'];
    protected $rules = [
        'order.name' => 'required',
        'order.contact' => 'required',
        'order.address' => 'required',
        'order.city_id' => 'required',
        'order.email' => 'nullable|email',
        'order.date' => 'required',
        'order.branch_id' => 'required',
        'order.code' => 'required',
        'order.product_name' => 'required',
        'order.quantity' => 'required',
        'order.price' => 'required',
        'order.payment_status' => 'required',
        'order.status' => 'required',
        'order.user_id' => 'nullable',
        'order.details' => 'required',
        'order.comments' => 'nullable',
    ];


    // public function orderCreated(){

    // }
    public function mount(Customer $customer)
    {
        $this->customer = $customer;
        $this->order['name'] = $customer->name;
        $this->order['contact'] = $customer->contact;
        $this->order['city_id'] = $customer->city_id;
        $this->order['address'] = $customer->address;
        $this->order['email'] = $customer->email;
        // $this->order['customer_id']=$customer->id;
    }

    public function save(){

        $this->validate();
        $product_order = new ProductOrder($this->order);
        $this->customer->productOrder()->save($product_order);
        $this->reset('order');
        $this->emitSelf('orderCreated');
        $this->render();
    }
    public function render()
    {
        $branches = Branch::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        return view('livewire.product-order-form', compact('branches', 'cities'));
    }
}
