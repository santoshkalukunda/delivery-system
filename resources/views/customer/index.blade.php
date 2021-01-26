@extends('layouts.backend')
@section('title')
Customer List
@endsection
@section('content')
<div class="row">
    <div class="col-md-2">
        <button type="button" class="btn btn-primary mb-2 form-control" data-toggle="modal"
            data-target="#findCustomerModal"> <i class="fa fa-plus"></i> New Costumer
        </button>
    </div>
    @include('modal.find-customer-modal')
    <div class="col-md-2">
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#filter" role="button" aria-expanded="false"
                aria-controls="filter">
                <i class="fa fa-filter"></i> Filter
            </a>
        </p>
    </div>
    <div class="col-md-12 mb-2">
        <div class="collapse" id="filter">
            <div class="card card-body">
                <form action="{{route('customers.search')}}" method="get">
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <input type="text" class=" form-control" name="contact" placeholder="Contact no.">
                        </div>
                        
                        <div class="col-md-3 form-group">
                            <input type="text" class=" form-control" name="name" placeholder="Name">
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" class=" form-control" name="email" placeholder="Email">
                        </div>
                        <div class="col-md-3 form-group">
                            <select  class="selectpicker form-control @error('city_id') is-invalid @enderror" name="city_id"   id="city" data-live-search="true" data-size="5">
                                <option value="" selected>Select City</option>
                                @foreach ($cities as $city)
                                    <option value="{{$city->id}}" data-subtext="{{$city->provinces}}"> {{$city->name}}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" class=" form-control" name="address" placeholder="Address">
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
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Customers List</div>
            </div>
            <div class="ibox-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Contact</th>
                                <th>Name</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($customers as $customer)
                            <tr>
                                <td>
                                    {{$customer->contact}}
                                </td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->city->name}} <span
                                        class="text-secondary">{{$customer->city->provinces}}</span></td>
                                <td>{{$customer->address}}</td>
                                <td>{{$customer->email}}</td>
                                <td>
                                    <a href="{{ route('customers.show', $customer) }}" class="text-muted"><i
                                            class="fa fa-eye"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('customers.edit', $customer) }}" class="text-muted"><i
                                            class="fa fa-edit"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('customers.destroy', $customer) }}"
                                        onsubmit="return confirm('Are you sure to delete?')" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="border-0 my-0 p-0 text-danger bg-transparent"><i
                                                class="fa fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10"><span class="text-danger">*No data list Found</span></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection