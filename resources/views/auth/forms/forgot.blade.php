{!! Form::open(['method' => 'POST', 'route' => 'auth.forgot']) !!}
    @include('errors.list')
    <div class="form-group {{ $errors->has('email') ? "has-error" : "" }}">
        <label class="control-label" for="forgotEmailInput">Email address :</label>
        {!! Form::email('email', null, ["id" => "forgotEmailInput", "class" => "form-control"]) !!}
    </div>
    <div align="right">
        <button type="submit" class="btn btn-default" style="margin-top: 10px;">Reset Password</button>
    </div>
{!! Form::close() !!}