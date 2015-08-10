@section('navigation')
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url() }}">
                    {!! Html::image("img/logo.png") !!}
                </a>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="{{ route("page.home") }}">Home</a></li>
                            <li><a href="{{ route("page.about") }}">About</a></li>
                            <li><a href="{{ route("user.apply") }}">Apply</a></li>
                            @if (Auth::check())
                                @if (Auth::user()->can("dashboard.access"))
                                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                @endif
                                <li><a href="{{ route('user.account') }}">My Account</a></li>
                            @endif
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection