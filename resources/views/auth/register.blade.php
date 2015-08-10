@extends('master')
@include('templates.header')
@include('templates.navigation')
@section('content')
    @include('auth.forms.register')
@endsection
@include('templates.footer')