@extends('master')
@include('templates.header')
@include('templates.navigation')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h4 class="page-head-line">News</h4>

                    @if (session('news'))
                        <p>News!</p>
                    @else
                        <p>No news :'(</p>
                    @endif
                </div>
                <div class="col-md-3">
                    <h4 class="page-head-line">Tweets</h4>
                    <a class="twitter-timeline" href="https://twitter.com/The_TeamElite" data-widget-id="574592409121767424">Tweets by @The_TeamElite</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('templates.footer')