<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Registration form</h4>
            </div>

        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <h4 align="center">Welcome to Team Elite</h4>
                <br />
                {!! Form::open(['method' => 'POST', 'route' => 'auth.register']) !!}
                    <div class="row">
                        @include('errors.list')
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('name') ? "has-error" : "" }}">
                                <label class="control-label" for="nameInput">Name :</label>
                                {!! Form::text('name', null, ["id" => "nameInput", "class" => "form-control", "placeholder" => "Name"]) !!}
                            </div>
                            <div class="form-group {{ $errors->has('birthday') ? "has-error" : "" }}">
                                <label class="control-label" for="birthdayInput">Birthday :</label>
                                {!! Form::text('birthday', null, ["id" => "birthdayInput", "class" => "form-control", "placeholder" => "dd-mm-yyyy"]) !!}
                            </div>
                            <div class="form-group {{ $errors->has('country') ? "has-error" : "" }}">
                                <label class="control-label" for="countryInput">Country :</label>
                                {!! Form::select('country', $countries, null, ["id" => "countryInput", "class" => "form-control", "placeholder" => "country"]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('email') || $errors->has('email_confirmation') ? "has-error" : "" }}">
                                <label class="control-label" for="emailInput">Email address :</label>
                                {!! Form::email('email', null, ["id" => "emailInput", "class" => "form-control", "placeholder" => "example@example.com"]) !!}
                                <label class="control-label" for="emailConfirmationInput">Email address confirmation :</label>
                                {!! Form::email('email_confirmation', null, ["id" => "emailConfirmationInput", "class" => "form-control", "placeholder" => "example@example.com"]) !!}
                            </div>
                            <div class="form-group {{ $errors->has('password') || $errors->has('password_confirmation') ? "has-error" : "" }}">
                                <label class="control-label" for="passwordInput">Password :</label>
                                {!! Form::password('password', ["id" => "passwordInput", "class" => "form-control", "placeholder" => "password"]) !!}
                                <label class="control-label" for="passwordConfirmationInput">Password confirmation :</label>
                                {!! Form::password('password_confirmation', ["id" => "passwordConfirmationInput", "class" => "form-control", "placeholder" => "password"]) !!}
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div align="right">
                        <button class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"></span> &nbsp;Register</button>&nbsp;
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>