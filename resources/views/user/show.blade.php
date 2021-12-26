@extends('layouts.admin_layout.admin_layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header text-white" style=" background-color: #045CA6;">
                            <!-- <h3 class="widget-user-username text-right">Name</h3> -->
                            <h5 class="widget-user-desc text-left">{{$user->name}}</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class=" img-circle" src="{{env('URL')}}{{$user->profile_pic}}" alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-2 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Username</h5>
                                        <span class="description-text"> {{$user->email}}</span>
                                    </div>

                                </div>
                                <!-- /.col -->
                                <div class="col-sm-2 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Gender</h5>
                                        <span class="description-text">{{$user->gender}}</span>
                                    </div>

                                </div>
                                <!-- /.col -->
                                <div class="col-sm-2">
                                    <div class="description-block ">
                                        <h5 class="description-header">Account Type</h5>
                                        <span class="description-text">
                                            @if($user->isVerified == 1)
                                            <?php echo "Verified"?>
                                            @else
                                            <?php echo "Un-Verified"?>
                                            @endif
                                        </span>
                                    </div>

                                </div>
                                <!-- /.col -->
                                <!-- /.col -->
                                <div class="col-sm-2 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Age</h5>
                                        <span class="description-text">{{$user->age}}</span>
                                    </div>

                                </div>
                                <!-- /.col -->
                                <!-- /.col -->
                                <div class="col-sm-2 border-right">
                                    <div class="description-block ">
                                        <h5 class="description-header">Followers</h5>
                                        <span class="description-text">{{$user->followerCount}}</span>
                                    </div>

                                </div>
                                <!-- /.col -->
                                <!-- /.col -->
                                <div class="col-sm-2">
                                    <div class="description-block">
                                        <h5 class="description-header">Following</h5>
                                        <span class="description-text">{{$user->followingCount}}</span>
                                    </div>

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                <!-- /.col -->

                <!--Analytics-->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="small-box bg-light">
                                                <div class="inner">
                                                    <p class="font-weight-bold">Total Users Who Liked Me</p>

                                                    <h3>{{$usersWhoLikedMe}}</h3>
                                                </div>
                                                <div class="icon">
                                                    <i class="far fa-thumbs-up mt-4"
                                                        style="color:blue; font-size:50px;"></i>
                                                </div>
                                                <a href="{{url('/usersWhoLikedMe/'.$user['id'])}}"
                                                    class="small-box-footer">More info <i
                                                        class="fas fa-arrow-circle-right"
                                                        style="color:#1DB9C3;"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="small-box bg-light">
                                                <div class="inner">
                                                    <p class="font-weight-bold">Total Live</p>

                                                    <h3>2</h3>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-wifi mt-4" style="color:red; font-size:50px;"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="small-box bg-light">
                                                <div class="inner">
                                                    <p class="font-weight-bold">Total Match</p>

                                                    <h3>{{$matchUsers}}</h3>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-user mt-4"
                                                        style="color:#0DBA2C; font-size:50px;"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="small-box bg-light">
                                                <div class="inner">
                                                    <p class="font-weight-bold">Total Photos</p>

                                                    <h3>{{$photos}}</h3>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-images mt-4"
                                                        style="color:#e533a5; font-size:50px;"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-3">
                                            <div class="small-box bg-light">
                                                <div class="inner">
                                                    <p class="font-weight-bold">Total Views</p>

                                                    <h3>5</h3>
                                                </div>

                                                <div class="icon">
                                                    <i class="fas fa-eye mt-4"
                                                        style="color:#BE4BDB; font-size:50px;"></i>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="col-md-6">
                                            <div class="small-box bg-light">
                                                <div class="inner">
                                                    <p class="font-weight-bold">Total Users Who I Liked</p>

                                                    <h3>{{$usersIliked}}</h3>
                                                </div>
                                                <div class="icon">
                                                    <i class="far fa-thumbs-up mt-4"
                                                        style="color:blue; font-size:50px;"></i>
                                                </div>
                                                <a href="{{url('/usersIliked/'.$user['id'])}}"
                                                    class="small-box-footer">More info <i
                                                        class="fas fa-arrow-circle-right"
                                                        style="color:#1DB9C3;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-dark">
                        <div class="card-header d-flex justify-content-center">
                            <h4 class="card-title">Options</h4>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="small-box bg-light">

                                                <div class="inner" style=" background-color: #3E7C17;"><a
                                                        href="{{url('/user/edit/'.$user['id'])}}"
                                                        style="color:white;"><i class="fas fa-pen-fancy"></i> Edit User
                                                    </a></div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="small-box bg-light">
                                                <div class="inner" style=" background-color: #E02401;"><a
                                                        href="{{url('user/delete',$user['id'])}}"
                                                        onclick="return confirm('Are you sure want to delete this User?')"
                                                        style="color:white;"><i class="far fa-trash-alt"></i> Delete
                                                        User
                                                    </a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="small-box bg-light">
                                                @if($user['isBlocked']==1)
                                                <div class="inner" style=" background-color: #E02401;"><a
                                                        href="{{url('user/block',$user['id'])}}" style="color:white;">
                                                        <i class="fas fa-ban"></i>
                                                        Blocked
                                                    </a></div>

                                                @else

                                                <div class="inner" style=" background-color: #F15A27;"><a
                                                        href="{{url('user/block',$user['id'])}}" style="color:white;"><i
                                                            class="fas fa-check-circle"></i>
                                                        Unblocked
                                                    </a></div>

                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="small-box bg-light">
                                                @if($user['isVerified']==1)
                                                <div class="inner" style=" background-color: #25CE2A;"><a
                                                        href="{{url('user/update-verify',$user['id'])}}"
                                                        style="color:white;"> <i class="fas fa-check-circle"></i>
                                                        Verified User
                                                    </a></div>

                                                @else

                                                <div class="inner" style=" background-color: #F15A27;"><a
                                                        href="{{url('user/update-verify',$user['id'])}}"
                                                        style="color:white;"><i class="fas fa-check-circle"></i>
                                                        unVerified User
                                                    </a></div>

                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="small-box bg-light">

                                                <div class="inner" style=" background-color: #F15A27;"><a
                                                        href="{{url('user/update-verify',$user['id'])}}"
                                                        style="color:white;"><i class="fas fa-bolt"></i> Boost User
                                                    </a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 rounded">
                                            <div class="small-box bg-light ">

                                                <div class="inner" style=" background-color: #4B89BE;"><a href="#"
                                                        style="color:white;"> <i class="fas fa-envelope-open-text"></i>
                                                        User Chat
                                                    </a></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-dark">
                        <div class="card-header d-flex justify-content-center">
                            <h4 class="card-title">BlockList</h4>

                        </div>
                        <div class="card-body" style="overflow-x:auto;">
                            <table id="" class="table table-hover overflow-auto">
                                <thead>
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>UserName</th>
                                        <th>Email</th>
                                        <th>ProfilePic</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user->blockedUsers as $blocked)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$blocked->name}}</td>
                                        <td>{{$blocked->email}}</td>
                                        <td>
                                            @if(!empty($blocked->profile_pic))

                                            <img style="width: 50px; height: 50px;"
                                                src="{{env('URL')}}{{$blocked->profile_pic}}" />
                                            @else
                                            <?php echo "no photo"?>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header d-flex justify-content-center">
                            <h4 class="card-title">{{$user->name}} Photos</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($user->userPhotos as $user)
                                <div class="col-sm-2">
                                    <a href="{{env('URL')}}{{$user->imageUrl}}" data-toggle="lightbox"
                                        data-title="Photos" data-gallery="gallery">
                                        <img src="{{env('URL')}}{{$user->imageUrl}}" class="card-img-top img-thumbnail"
                                            alt="white sample" />
                                    </a>
                                    <br>
                                    <br>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>

@endsection