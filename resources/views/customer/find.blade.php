@extends('layouts.backend')
@section('title')
Dashbord
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Customers List</div>
            </div>
            <div class="ibox-body">
             <form action="{{route('customers.find')}}" method="post">
                 @csrf
                <div class="d-flex my-5">
                    <div class="col-md-2">
                        <label for="contact">Customer Contact No.</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="contact" id="contact" placeholder="Costumer Contact" autofocus>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Proceed</button>
                    </div>
                </div>
             </form>
            </div>
        </div>
    </div>
</div>
@endsection