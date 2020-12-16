@extends('layouts.backend')
@section('title')
Dashbord
@endsection
@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">City Form</div>
            </div>
            <div class="ibox-body">
                <form action="{{$city->id ? route('cities.update',$city) : route('cities.store')}}" method="post">
                    @csrf
                    @if ($city->id)
                    @method('put')
                    @endif
                    <div class="">
                        <label for="provinces">Provinces</label>
                        <select class="browser-default custom-select @error('provinces') is-invalid @enderror"
                            name="provinces">
                            <option value="">Select provinces</option>
                            @foreach (config('provinces.name') as $key => $value)
                            <option value="{{ $key }}" {{$city->provinces == $key ? "selected" : ""}}>
                                {{ $value ?? $key }}</option>
                            @endforeach
                        </select>
                        @error('provinces')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="md-form">
                        <input type="text" id="name" name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{old('name',$city->name)}}">
                        <label for="name">Name City</label>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit"
                            class="btn btn-success btn-rounded">{{$city->id ? "upadete" : "Add"}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="ibox">
            <div class="ibox-body table-responsive">
                <div class="row">
                    <div class="col-md">
                        <h3 class="m-0">Cities List</h3>
                    </div>
                    <div class="col-md text-right">
                        <span>Total Record: {{$cities->total()}}</span>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Provinces</th>
                            <th>City</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cities as $city)
                        <tr>
                            <td>
                                {{$city->provinces}}
                            </td>
                            <td>{{$city->name}}</td>
                            <td>
                                <a href="{{ route('cities.edit', $city) }}" class="text-muted"><i
                                        class="fa fa-edit"></i></a>
                                <span class="mx-3">|</span>
                                <form action="{{ route('cities.destroy', $city) }}"
                                    onsubmit="return confirm('Are you sure to delete?')" method="POST" class="d-inline">
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
                {{$cities->links()}}
            </div>
        </div>
    </div>
</div>
@endsection