@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Email verification</h4>
                </div>
            </div>
            <h3>Verify your email address</h3>
            <h5><a href="{{ route('auth.verify', $token) }}">Click here</a> to verify your account.</h5>
        </div>
    </div>
@endsection