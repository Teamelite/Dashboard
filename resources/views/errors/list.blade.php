@if (!$errors->isEmpty())
    <div class="panel panel-default">
        <div class="panel-body">
            @foreach($errors->all() as $error)
                <li style="margin: 0; padding: 0;">{{ $error }}</li>
            @endforeach
        </div>
    </div>
@endif