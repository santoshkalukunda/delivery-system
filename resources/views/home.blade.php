@extends('layouts.backend')
@section('title')
Dashbord
@endsection
@section('content')
@if (Auth::user()->hasRole(['admin']))
@include('home.admin')
@elseif(Auth::user()->hasRole(['user']))   
@include('home.admin')
@else
@include('home.delivery-agent')
@endif

@endsection