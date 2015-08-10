{!! Form::open(['method' => 'POST', 'route' => 'user.account.password']) !!}
    <div class="form-group {{ $errors->has('current_password') ? "has-error" : "" }}" style="margin-top: 10px;">
        <label class="control-label" for="currentPasswordInput">Current Password :</label>
        {!! Form::password('current_password', ["id" => "currentPasswordInput", "class" => "form-control"]) !!}
    </div>
    <div class="form-group {{ $errors->has('password') ? "has-error" : "" }}">
        <label class="control-label" for="passwordInput">New password :</label>
        {!! Form::password('password', ["id" => "passwordInput", "class" => "form-control"]) !!}
    </div>
    <div class="form-group {{ $errors->has('password_confirmation') ? "has-error" : "" }}">
        <label class="control-label" for="passwordConfirmationInput">Password confirmation :</label>
        {!! Form::password('password_confirmation', ["id" => "passwordConfirmationInput", "class" => "form-control"]) !!}
    </div>
    <div align="center">
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> &nbsp;Change Password</button>&nbsp;
    </div>
{!! Form::close() !!}