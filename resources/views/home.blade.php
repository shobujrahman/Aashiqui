@extends('layouts.admin_layout.admin_layout')
@section('content')

<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!--  -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="inner">
                            <p class="font-weight-bold">Total Real Users</p>

                            <h3>{{$userCount}}</h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users mt-4" style="color:#9e4296; font-size:50px;"></i>
                        </div>
                        <a href="{{url('/user')}}" class="small-box-footer">More info
                            <i class="fas fa-arrow-circle-right" style="color:#9e4296;"></i></a>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="inner">
                            <p class="font-weight-bold">Total Fake Users</p>

                            <h3>{{$fakeUserCount}}</h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users mt-4" style="color:red; font-size:50px;"></i>
                        </div>
                        <a href="{{url('/fakeUsers')}}" class="small-box-footer">More info
                            <i class="fas fa-arrow-circle-right" style="color:red;"></i></a>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="inner">
                            <p class="font-weight-bold">Recently Active</p>

                            <h3>{{$recentActive}}</h3>
                        </div>
                        <div class="icon">
                            <i class="far fa-dot-circle mt-4" style="color:#0DBA2C; font-size:50px;"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"
                                style="color:#0DBA2C;"></i></a>
                    </div>
                </div>
                <!--  -->
                <!--  -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="inner">
                            <p class="font-weight-bold">Male</p>

                            <h3>{{$maleCount}}</h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-male mt-4" style="color:#02A3FE; font-size:50px;"></i>
                        </div>
                        <a href="{{url('/maleUser')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right" style="color:#02A3FE;"></i></a>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="inner">
                            <p class="font-weight-bold">Female</p>

                            <h3>{{$femaleCount}}</h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-female mt-4" style="color:#E648A2; font-size:50px;"></i>
                        </div>
                        <a href="{{url('/femaleUser')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right" style="color:#E648A2;"></i></a>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="inner">
                            <p class="font-weight-bold">Verified</p>

                            <h3>{{$verifyCount}}</h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle mt-4" style="color:#0DBA2C; font-size:50px;"></i>
                        </div>
                        <a href="{{url('/verification')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right" style="color:#0DBA2C;"></i></a>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="inner">
                            <p class="font-weight-bold">UnVerified</p>

                            <h3>{{$unVerifyCount}}</h3>
                        </div>
                        <div class="icon">
                            <i class="far fa-times-circle mt-4" style="color:red; font-size:50px;"></i>
                        </div>
                        <a href="{{url('/unVerifiedUser')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right" style="color:red;"></i></a>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="inner">
                            <p class="font-weight-bold">Reports</p>

                            <h3>150</h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-exclamation-triangle mt-4" style="color:orange; font-size:50px;"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"
                                style="color:orange;"></i></a>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="inner">
                            <p class="font-weight-bold">Live Stream</p>

                            <h3>150</h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-wifi mt-4" style="color:red; font-size:50px;"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"
                                style="color:red ;"></i></a>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="inner">
                            <p class="font-weight-bold">Total Like</p>

                            <h3>{{$likeCount}}</h3>
                        </div>
                        <div class="icon">
                            <i class="far fa-thumbs-up mt-4" style="color:blue; font-size:50px;"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"
                                style="color:blue;"></i></a>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="inner">
                            <p class="font-weight-bold">Total Match</p>

                            <h3>{{$matchCount}}</h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user mt-4" style="color:#0DBA2C; font-size:50px;"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"
                                style="color:#0DBA2C;"></i></a>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="inner">
                            <p class="font-weight-bold">Total Subscriptions</p>

                            <h3>{{$subscriptionCount}}</h3>
                        </div>
                        <div class="icon">
                            <i class="far fa-hand-point-up mt-4" style="color:red; font-size:50px;"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"
                                style="color:red;"></i></a>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="inner">
                            <p class="font-weight-bold">Active Subscriptions</p>

                            <h3>{{ $subscription}}</h3>
                        </div>
                        <div class="icon">
                            <i class="far fa-hand-point-up mt-4" style="color:red; font-size:50px;"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"
                                style="color:red;"></i></a>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="inner">
                            <p class="font-weight-bold">Support Messages</p>

                            <h3>150</h3>
                        </div>
                        <div class="icon">
                            <i class="far fa-comment-alt mt-4" style="color:#02A3FE; font-size:50px;"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"
                                style="color:#02A3FE;"></i></a>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="inner">
                            <p class="font-weight-bold">Total Gifts</p>

                            <h3>{{$giftCount}}</h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-gift mt-4" style="color:#FFC916; font-size:50px;"></i>
                        </div>
                        <a href="{{url('/gift')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right" style="color:#02A3FE;"></i></a>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </section>
</div>
@endsection