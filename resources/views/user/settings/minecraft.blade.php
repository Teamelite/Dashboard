<div style="margin-top: 50px;">
    @if (Auth::user()->minecraft())
        <div class="row">
            <div class="col-lg-offset-2 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-2 col-xs-2">
                <img src="https://visage.gameminers.com/face/{{ Auth::user()->minecraft()->unique_id }}" class="img-thumbnail">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-7">
                <h3>{{ Auth::user()->minecraft()->name }}</h3>
                <h5>{{ Auth::user()->minecraft()->unique_id }}</h5>
            </div>
        </div>
    @else
        <h2>You do not currently have an associated minecraft account.</h2>
        <p>You can link your in-game profile with your account by following the steps below:</p>
        <ul class="list-group">
            <li class="list-group-item">Login to "teamelite.io"</li>
            <li class="list-group-item">If you have not already linked your account, you will recieve a notification in chat,</li>
            <li class="list-group-item">You may click this notification to link your account.</li>
        </ul>
    @endif
</div>