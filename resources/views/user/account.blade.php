@extends('master')
@include('templates.header')
@include('templates.navigation')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('errors.list')
                    <h4 class="page-head-line">Account settings</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="nav list-group">
                                <a class="list-group-item" href="#account" data-toggle="tab">Account</a>
                                <a class="list-group-item" href="#applications" data-toggle="tab">Applications</a>
                                <a class="list-group-item" href="#minecraft" data-toggle="tab">Minecraft Association</a>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="account">
                                    <h4>My Account</h4>
                                    @include('user.settings.account')
                                </div>
                                <div class="tab-pane fade in" id="applications">
                                    <h4>My Applications</h4>
                                    @include('user.settings.applications')
                                </div>
                                <div class="tab-pane fade in" id="minecraft">
                                    <h4>Minecraft Association</h4>
                                    @include('user.settings.minecraft')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('templates.footer')