<div class="col-md-12 mb-2">
    <div class="collapse" id="filter">
        <div class="card card-body">
            <form action="{{route('product-orders.search')}}" method="get">
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="">Branch</label>
                        <select name="branch_id" id="" class="form-control">
                            <option value="">Select Branch</option>
                            @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}" class=" text-capitalize">
                                {{$branch->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="">City</label>
                        <select class="selectpicker form-control @error('city_id') is-invalid @enderror" name="city_id"
                            id="city" data-live-search="true" data-size="5">
                            <option value="" selected>Select City</option>
                            @foreach ($cities as $city)
                            <option value="{{$city->id}}" data-subtext="{{$city->provinces}}"> {{$city->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="">User</label>
                        <select class="selectpicker form-control " name="user_id" data-live-search="true" data-size="5">
                            <option value="" selected>Select User</option>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}" data-subtext="{{$user->branch->name}}"> {{$user->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="">Sender Contact</label>
                        <select class="selectpicker form-control" name="customer_id" data-live-search="true"
                            data-size="5">
                            <option value="">Select Contact</option>
                            @foreach ($customers as $customer)
                            <option value="{{$customer->id}}" data-subtext="{{$customer->name}}">
                                {{$customer->contact}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 form-group">
                        <label for="">Reciever Contact</label>
                        <input type="text" class=" form-control" name="contact" placeholder="Reciever Contact no.">
                    </div>

                    <div class="col-md-3 form-group">
                        <label for="">Reciever Name</label>
                        <input type="text" class=" form-control" name="name" placeholder="Reciever Name">

                    </div>
                    <div class="col-md-3 form-group">
                        <label for="">Reciever Email</label>
                        <input type="text" class=" form-control" name="email" placeholder="Reciever Email">
                    </div>



                    <div class="col-md-3 form-group">
                        <label for="">Reciever Address</label>
                        <input type="text" class=" form-control" name="address" placeholder="Address">
                    </div>

                    <div class="col-md-3 form-group">
                        <label for="">Order Date From</label>
                        <input type="text" class=" form-control" id="from" name="from" placeholder="YYYY-MM-DD">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="">Order Date to</label>
                        <input type="text" class=" form-control" name="to" id="to" placeholder="YYYY-MM-DD">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="">Product Name</label>
                        <input type="text" class=" form-control" name="product_name" placeholder="Product Name">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="">Product Code</label>
                        <input type="text" class=" form-control" name="code" placeholder="Product code">
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="">Minimum Quantity</label>
                        <input type="number" min="0" class=" form-control" name="min_quantity"
                            placeholder="Quantity Min.">

                    </div>
                    <div class="col-md-2 form-group">
                        <label for="">Maximum Quantity</label>
                        <input type="number" min="0" class=" form-control" name="max_quantity"
                            placeholder="Quantity Max.">
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="">Minimum Price</label>
                        <input type="number" class=" form-control" name="min_price" placeholder="Min. Price">
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="">Maximum Price</label>
                        <input type="number" class=" form-control" name="max_price" placeholder="Max. Price">
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="">Payment Method</label>
                        <select name="payment_status" id="" class="form-control">
                            <option value="">Select Method</option>
                            <option value="0">Cash on Delivery</option>
                            <option value="1">Paid</option>
                        </select>
                    </div>

                    <div class="col-md-2 form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="">Select status</option>
                            <option value="confirm">Confirm</option>
                            <option value="shipping">Shipping</option>
                            <option value="delivered">Delivered</option>
                            <option value="not-deliver">Not-Deliver</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <input type="submit" class="form-control btn- btn-primary" value="Search">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    var mainInput = document.getElementById("from");
 
 /* Initialize Datepicker with options */
 mainInput.nepaliDatePicker({
     ndpYear: true,
     ndpMonth: true,
     ndpYearCount: 100
 });
 
   var mainInput = document.getElementById("to");
 /* Initialize Datepicker with options */
 mainInput.nepaliDatePicker({
     ndpYear: true,
     ndpMonth: true,
     ndpYearCount: 100
 });
</script>
@endpush