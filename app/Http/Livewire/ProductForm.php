<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use App\Models\City;
use App\Models\Customer;
use Livewire\Component;

class ProductForm extends Component
{
    public $customer;
    public function mount(Customer $customer){
        $this->customer = $customer;
    }
    public function render()
    {
        $branches=Branch::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        return view('livewire.product-form',compact('branches','cities'));
    }
}
