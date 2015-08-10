@extends('master')
@include('templates.header')
@include('templates.navigation')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">About</h4>

                    <p>Image rail goes here...</p>
                </div>
                <div class="col-md-offset-1 col-md-10">
                    <p class="description">
                        Team Elite is a minecraft build team that was founded under the wing of the MCGamer Network.
                    </p>
                    <p class="description">
                        The team currently holds a little over 40 members with talented skills that range from building to terraforming.
                        Team Elite is run by a number of staff members including the owner Dave. We officially build for MCGamer and Aevium,
                        two great server networks. We have a large portfolio which include builds and terrain from server spawns and maps to
                        network hubs and lobbies.
                    </p>
                    <p class="description">
                        The team was founded in June 2012 and has been lead by a number of people since then, it was founded by xBayani, Joshkey and Teije.
                        xBayani left the team, Dave was then promoted to leader, shortly after Kezzer promoted and joined the leadership.
                        Joshkey was demoted, and a few weeks later Kezzer left. Dave is now the owner of Team Elite. He was once administrator
                        of the MCGamer network and currently the owner of Aevium.
                    </p>
                </div>
            </div>
            <div class="row" style="margin-top: 50px;">
                <div class="col-md-offset-1 col-md-10">
                    <h4 class="page-head-line">Membership</h4>
                    <p class="description">
                        Applications here at Team Elite are a crucial part in becoming a member. We read through each application extensively
                        and only accept those willing to dedicate their time and skills towards helping their fellow members. The application
                        process is fairly simple, once you've filled out your application, it is then voted by the team at which point if
                        successful, you will be granted with trial status. In order to become a full member, you will be required to complete
                        your trial.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('templates.footer')