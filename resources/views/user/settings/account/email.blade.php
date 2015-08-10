{!! Form::open(['method' => 'POST', 'route' => 'user.account.email']) !!}
    <div class="form-group {{ $errors->has('email') ? "has-error" : "" }}" style="margin-top: 10px;">
        <label class="control-label" for="emailInput">Email :</label>
        {!! Form::email('email', null, ["id" => "emailInput", "class" => "form-control"]) !!}
    </div>
    <div class="form-group {{ $errors->has('email_confirmation') ? "has-error" : "" }}">
        <label class="control-label" for="emailConfirmationInput">Email Confirmation :</label>
        {!! Form::email('email_confirmation', null, ["id" => "emailConfirmationInput", "class" => "form-control"]) !!}
    </div>
    <div align="center">
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> &nbsp;Change Email</button>&nbsp;
    </div>
{!! Form::close() !!}