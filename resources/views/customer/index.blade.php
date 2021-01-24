@extends('layouts.backend')
@section('title')
Dashbord
@endsection
@section('content')
<div class="row">
    <div class="col-md-2">
        <a href="{{route('customers.create')}}" class="btn btn-primary mb-2 form-control "> <i class="fa fa-plus"></i> New Customer
        </a>
    </div>
    <div class="col-md-2">

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