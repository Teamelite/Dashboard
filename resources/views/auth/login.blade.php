@extends('master')
@include('templates.header')
@include('templates.navigation')
@section('content')
    @include('auth.forms.login')
@endsection
@include('templates.footer')