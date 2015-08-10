@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Reset password</h4>
                </div>
            </div>
            <h3>Forgotten your password?</h3>
            <h5><a href="{{ route('auth.reset', $token) }}">Click here</a> to reset your password.</h5>
        </div>
    </div>
@endsection
