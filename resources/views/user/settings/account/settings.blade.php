{!! Form::model(Auth::user(), ['route' => 'user.account.settings']) !!}

    <div class="form-group {{ $errors->has('name') ? "has-error" : "" }}">
        <label class="control-label" for="nameInput">Name :</label>
        {!! Form::text('name', null, ["id" => "nameInput", "class" => "form-control", "placeholder" => "Name"]) !!}
    </div>
    <label class="control-label">Birthday :</label>
    <?php
        $birthday = Auth::user()->birthday;
        $birthday->setToStringFormat('d-m-Y');
    ?>
    <p class="form-control-static">{{ $birthday->toFormattedDateString() }}</p>
    <div class="form-group {{ $errors->has('country') ? "has-error" : "" }}">
        <label class="control-label" for="countryInput">Country :</label>
        {!! Form::select('country', $countries, null, ["id" => "countryInput", "class" => "form-control", "placeholder" => "country"]) !!}
    </div>
    <div align="center">
        <button type="submit" class="btn btn-default" style="padding: 10px 20px;"><span class="glyphicon glyphicon-open-file"></span>&nbsp;Save</button>&nbsp;
    </div>
{!! Form::close() !!}