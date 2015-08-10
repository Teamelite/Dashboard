<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Login form</h4>
            </div>
        </div>
        <div class="row">
            @include('errors.list')
            <div class="col-md-offset-4 col-md-4">
                <h4 align="center">Welcome to Team Elite</h4>
                <br />
                {!! Form::open(['method' => 'POST', 'route' => 'auth.login']) !!}
                    <div class="form-group {{ $errors->has('email') ? "has-error" : "" }}">
                    <label class="control-label" for="emailInput">Email address :</label>
                    {!! Form::email('email', null, ["id" => "emailInput", "class" => "form-control"]) !!}
                    </div>
                    <div class="form-group {{ $errors->has('password') ? "has-error" : "" }}">
                        <label class="control-label" for="passwordInput">Password :</label>
                    {!! Form::password('password', ["id" => "passwordInput", "class" => "form-control"]) !!}
                    </div>
                    <div class="checkbox" align="center">
                        <label>
                            {!! Form::checkbox('remember', 0, false, ["style" => "margin-top: 8px;"]) !!} Remember me
                        </label>
                    </div>
                    <hr />
                    <div align="center">
                        <a href="{{ route('auth.register') }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"></span> &nbsp;Register</a>&nbsp;
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> &nbsp;Login</button>&nbsp;
                    </div>
                {!! Form::close() !!}
                <div align="center" style="margin-top: 10px;">
                    <a href="" style="margin-left: 10px;" data-toggle="modal" data-target="#forgotPasswordModal">Forgot password?</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModal" aria-hidden="true" style="display: none;, border-radius: 0;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="modalTitle">Password Reset</h4>
                    <hr />
                    <div align="left">
                        @include('auth.forms.forgot')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>