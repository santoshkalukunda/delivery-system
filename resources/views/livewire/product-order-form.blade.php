<div>
    <form wire:submit.prevent="save">
        <fieldset class="border p-2">
            <legend  class="w-auto">Shipping Details</legend>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="number" class="required">Contact number</label>
                        <input wire:model.defer="order.contact" type="tel" id="number" name="contact"
                            class="form-control @error('order.contact') is-invalid @enderror" value="{{old('order.contact',$customer->contact)}}" placeholder="98XXXXXXXX">
                        @error('order.contact')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="name" class="required">Customer Name</label>
                        <input wire:model.defer="order.name" type="text" id="name" name="name"
                            class="form-control @error('order.name') is-invalid @enderror" value="{{old('order.name',$customer->name)}}" placeholder="Name">
                        @error('order.name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="city" class="required">City</label>
                        <select wire:model.defer="order.city_id"   class="selectpicker form-control @error('order.city_id') is-invalid @enderror" name="city_id"   id="city" data-live-search="true" data-size="5">
                            <option value="" selected>Select City</option>
                            @foreach ($cities as $city)
                                <option value="{{$city->id}}" data-subtext="{{$city->provinces}}" {{$city->id == $customer->city_id ? 'selected' : ''}}> {{$city->name}}</option>
                            @endforeach
                          </select>
                       
                        @error('order.city_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Email Address</label>
                        <input wire:model.defer="order.email"  type="text" id="email" name="email"
                            class="form-control @error('order.email') is-invalid @enderror" value="{{old('order.email',$customer->email)}}" placeholder="example@domain.com">
                        @error('order.email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                  
                    <div class="col-md-4 form-group">
                        <label for="address">Address</label>
                        <input wire:model.defer="order.address"  type="text" id="address" name="address"
                            class="form-control @error('order.address') is-invalid @enderror" value="{{old('order.address',$customer->address)}}" placeholder="Address">
                        @error('order.address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>   
        </fieldset>
        <fieldset class="border p-2">
            <legend  class="w-auto">Product Information</legend>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="date" class="required">Order Date</label>
                    <input wire:model.defer="order.date"  type="date" name="date" class="form-control @error('order.date') is-invalid @enderror"
                        id="date">
                    @error('order.date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label for="branch_id" class="required">Branch</label>
                    <select wire:model.defer="order.branch_id" class="form-control @error('order.branch_id') is-invalid @enderror" name="branch_id"
                        id="branch_id">
                        <option value="" selected>Select Branch</option>
                        @foreach ($branches as $branch)
                        <option value="{{$branch->id}}" {{$branch->id == $customer->branch_id ? 'selected' : ''}}>
                            {{$branch->name}}</option>
                        @endforeach
                    </select>
                    @error('order.branch_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label for="code" class="required">Product Code</label>
                    <input wire:model.defer="order.code" type="text" name="code" class="form-control @error('order.code') is-invalid @enderror" id="code"
                        placeholder="Product Code">
                    @error('order.code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label for="name" class="required">Product Name</label>
                    <input wire:model.defer="order.product_name" type="text" name="product_name" class="form-control @error('order.product_name') is-invalid @enderror" id="name"
                        placeholder="Product Name">
                    @error('order.product_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label for="quantity" class="required">Product Quantity</label>
                    <input wire:model.defer="order.quantity" type="text" name="quantity" class="form-control @error('order.quantity') is-invalid @enderror"
                        id="quantity" placeholder="Product Quntity with unit.">
                    @error('order.quantity')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label for="price" class="required">Product Price</label>
                    <input wire:model.defer="order.price" type="number" name="price" class="form-control @error('order.price') is-invalid @enderror"
                        id="price" min="0" placeholder="Product price in Rs.">
                    @error('order.price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label for="payment_status" class="required">Payment Status</label>
                    <select wire:model.defer="order.payment_status" type="number" name="payment_status"
                        class="form-control @error('order.payment_status') is-invalid @enderror" id="payment_status">
                        <option value="">Select...</option>
                        <option value="0">Cash on delivery</option>
                        <option value="1">Paid</option>
                    </select>
                    @error('order.payment_status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label for="status" class="required">Status</label>
                    <select wire:model.defer="order.status" type="number" name="status"
                        class="form-control @error('order.status') is-invalid @enderror" id="status">
                        <option value="">selcet</option>
                        <option value="confirmed">Confirm</option>
                        <option value="shipping">Shipping</option>
                        <option value="delivery">Delivery</option>
                        <option value="not-delivery">Not-Delivery</option>
                    </select>
                    @error('order.status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label for="user_id">Delivery Agent</label>
                    <select wire:model.defer="order.user_id" class="form-control @error('order.user_id') is-invalid @enderror" name="user_id"
                        id="user_id">
                        <option value="" selected>Select Delivery Agent</option>
                        {{-- @foreach ($branches as $branch)
                        <option value="{{$branch->id}}" {{$branch->id == $customer->branch_id ? 'selected' : ''}}>
                            {{$branch->name}}</option>
                        @endforeach --}}
                    </select>
                    @error('order.branch_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-12 form-group">
                    <label for="details">Product details</label>
                    <textarea wire:model.defer="order.details" type="text" class="form-control @error('order.details') is-invalid @enderror"
                         placeholder="Product details with unit."></textarea>
                    @error('order.details')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <button type="reset" class="btn btn-danger form-control btn-rounded">Cancel</button>
                </div>
                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-success form-control btn-rounded">Next</button>
                </div>

            </div>
        </fieldset>

    </form>
</div>
