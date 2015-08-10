@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Email change request</h4>
                </div>
            </div>
            <h3>Change your email</h3>
            <h5><a href="{{ route('user.account.email.confirm', $token) }}">Click here</a> to change your email.</h5>
        </div>
    </div>
@endsection