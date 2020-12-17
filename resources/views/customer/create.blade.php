@extends('layouts.backend')
@section('title')
Dashbord
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Customer Form</div>
            </div>
            <div class="ibox-body">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="md-form col-md-4">
                            <input type="text" id="number" name="contact"
                                class="form-control @error('contact') is-invalid @enderror" value="{{old('contact')}}">
                            <label for="number">Contact number</label>
                            @error('contact')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="md-form col-md-4">
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                            <label for="name">Customer Name</label>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4 mt-3 control-label">
                            {{-- <label for="">City</label> --}}
                            <select  class="selectpicker form-control  dropdown-danger" data-live-search="true" >
                                <option value="" selected>Select City</option>
                                @foreach ($cities as $city)
                                    <option value="{{$city->id}}" data-subtext="{{$city->provinces}}" > {{$city->name}}</option>
                                @endforeach
                              </select>
                            {{-- <select class="custom-select">
                                <option value="">Select City</option>
                                @foreach ($cities as $city)
                                <option value="{{$city->id}}">
                                    <span style="float:left;">Option 1</span>
                                    <span style="float:right;">Test</span>
                                </option>
                                @endforeach
                            </select> --}}
                            @error('city')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="md-form col-md-4">
                            <input type="text" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                            <label for="email">Email Address</label>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                      
                        <div class="md-form col-md-4">
                            <input type="text" id="address" name="address"
                                class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}">
                            <label for="address">Address</label>
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="md-form col-md-4">
                            <textarea type="text" id="details" name="details"
                                class="form-control md-textarea @error('details') is-invalid @enderror"
                                value="{{old('details')}}" rows="2"></textarea>
                            <label for="details">Other details</label>
                            @error('details')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <button type="reset" class="btn btn-danger btn-rounded">Cancel</button>
                            <button type="submit" class="btn btn-success btn-rounded">Next</button>

                        </div>
                    </div>
                </form>           
            </div>
        </div>
    </div>
</div>
@endsection