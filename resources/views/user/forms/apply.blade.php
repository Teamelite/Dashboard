<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Application form</h4>
            </div>
        </div>
        <div class="row">
            @include('errors.list')
            <div class="col-md-offset-1 col-md-10">
                @if ($application != null)
                    {!! Form::model($application, ['route' => 'user.apply.update']) !!}
                        {!! Form::hidden('id', $application->id) !!}
                @else
                    {!! Form::open(['method' => 'POST', 'route' => 'user.apply']) !!}
                @endif
                    <div class="form-group {{ $errors->has('skillset') ? "has-error" : "" }}">
                        <label class="control-label" for="skillsetInput">What are your creative skills?</label>
                        {!! Form::textarea('skillset', null, ["id" => "skillsetInput", "class" => "form-control", "rows" => "3"]) !!}
                    </div>
                    <div class="form-group {{ $errors->has('tool_experience') ? "has-error" : "" }}">
                        <label class="control-label" for="toolExperienceInput">Do you have experience with tools such as VoxelSniper & WorldEdit? If so, to what extent?</label>
                        {!! Form::textarea('tool_experience', null, ["id" => "toolExperienceInput", "class" => "form-control", "rows" => "3"]) !!}
                    </div>
                    <div class="form-group {{ $errors->has('team_experience') ? "has-error" : "" }}">
                        <label class="control-label" for="teamExperienceInput">Do you have any experience in regards to working in a team?</label>
                        {!! Form::textarea('team_experience', null, ["id" => "teamExperienceInput", "class" => "form-control", "rows" => "3"]) !!}
                    </div>
                    <div class="form-group {{ $errors->has('builds') ? "has-error" : "" }}">
                        <label class="control-label" for="buildsInput">Please send us 3+ links of seperare builds that you have created :</label>
                        {!! Form::textarea('builds', null, ["id" => "buildsInput", "class" => "form-control", "rows" => "3"]) !!}
                    </div>
                    <div class="form-group {{ $errors->has('reason') ? "has-error" : "" }}">
                        <label class="control-label" for="reasonInput">Why do you want to join Team Elite?</label>
                        {!! Form::textarea('reason', null, ["id" => "reasonInput", "class" => "form-control", "rows" => "3"]) !!}
                    </div>
                    <div class="form-group {{ $errors->has('other') ? "has-error" : "" }}">
                        <label class="control-label" for="otherInput">How will your presence benefit the team?</label>
                        {!! Form::textarea('other', null, ["id" => "otherInput", "class" => "form-control", "rows" => "3"]) !!}
                    </div>
                    <hr />
                    <div align="right">
                        @if ($application->status == "PENDING")
                            <button type="submit" class="btn btn-default" style="padding: 10px 20px;"><span class="glyphicon glyphicon-open-file"></span>&nbsp;
                                @if ($application != null)
                                    Save
                                @else
                                    Submit
                                @endif
                            </button>&nbsp;
                        @else
                            <a class="btn btn-default" href="{{ redirect()->back() }}">Back</a>
                        @endif
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>