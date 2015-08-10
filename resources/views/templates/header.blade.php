@section('header')
    @if(session('notice'))
        <div class="alert alert-notice alert-dismissible" role="alert" align="center" style="border-radius: 0; position: fixed; width: 100%; z-index: 1000; padding: 10px;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="left: -10px; top: 5px;"><span aria-hidden="true">&times;</span></button>
            {{ session('notice') }}
        </div>
    @endif

    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if (Auth::check())
                        <a class="link" href="{{ route('auth.logout') }}">Logout ({{ Auth::user()->name }})</a>
                    @else
                        <a class="link" href="{{ route('auth.register') }}">Register</a>
                        <a class="link" href="{{ route('auth.login') }}">Login</a>
                    @endif
                </div>
            </div>
        </div>
    </header>
@endsection