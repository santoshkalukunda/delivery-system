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
                        <div class="form-group col-md-4">
                            <label for="number">Contact number</label>
                            <input type="text" id="number" name="contact"
                                class="form-control @error('contact') is-invalid @enderror" value="{{old('contact')}}" placeholder="98XXXXXXXX">
                            @error('contact')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Customer Name</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="">City</label>
                            <select  class="selectpicker form-control" data-live-search="true" >
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
                        <div class="form-group col-md-4">
                            <label for="email">Email Address</label>
                            <input type="text" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="example@domain.com">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                      
                        <div class="col-md-4 form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address"
                                class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}" placeholder="Address">
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="details">Other details</label>
                            <textarea type="text" id="details" name="details"
                                class="form-control  @error('details') is-invalid @enderror"
                                value="{{old('details')}}" rows="2" placeholder="Details..."></textarea>
                            @error('details')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2" >
                            <button type="reset" class="btn btn-danger form-control btn-rounded">Cancel</button>
                        </div>
                        <div class="form-group col-md-2" >
                            <button type="submit" class="btn btn-success form-control btn-rounded">Next</button>
                        </div>
                    </div>
                </form>           
            </div>
        </div>
    </div>
</div>
@endsection