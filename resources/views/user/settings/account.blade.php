<div class="panel-body">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#accountSettings" data-toggle="tab">Settings</a></li>
        <li class=""><a href="#changePassword" data-toggle="tab">Change Password</a></li>
        <li class=""><a href="#changeEmail" data-toggle="tab">Change Email</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade active in" id="accountSettings">
            <div class="row">
                <div class="col-md-offset-3 col-md-6" style="margin-top: 25px;">
                    @include('user.settings.account.settings')
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="changePassword">
            <div class="row">
                <div class="col-md-offset-3 col-md-6" style="margin-top: 25px;">
                    @include('user.settings.account.password')
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="changeEmail">
            <div class="row">
                <div class="col-md-offset-3 col-md-6" style="margin-top: 25px;">
                    @include('user.settings.account.email')
                </div>
            </div>
        </div>
    </div>
</div>

