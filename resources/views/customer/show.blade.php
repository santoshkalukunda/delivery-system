@extends('layouts.backend')
@section('title')
Dashbord
@endsection
@section('content')
<div>
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Product Order</div>
                </div>
                <div class="ibox-body">
                    <livewire:product-form :customer=$customer />
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Customer Information</div>
                </div>
                <div class="ibox-body table-responsive">
                    <table class="table">
                        <tr>
                            <td>Name : </td><td> {{$customer->name}}</td>
                        </tr>
                        <tr>
                            <td>Contact : </td><td> {{$customer->contact}}</td>
                        </tr>
                        <tr>
                            <td>Province : </td><td> {{$customer->city->provinces}}</td>
                        </tr>
                        <tr>
                            <td>City : </td><td> {{$customer->city->name}}</td>
                        </tr>
                        <tr>
                            <td>Address :</td><td> {{$customer->address}}</td>
                        </tr>
                        <tr>
                            <td>Email : </td><td> {{$customer->email}}</td>
                        </tr>
                    </table>
                    <div>Details</div>
                    <div class="my-2" style="overflow-y: scroll; height: 100%; width: 100%;">
                        {!!$customer->details!!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection