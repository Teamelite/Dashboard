@extends('master')
@include('templates.header')
@include('templates.navigation')
@section('content')
    @include('user.forms.apply')
@endsection
@include('templates.footer')