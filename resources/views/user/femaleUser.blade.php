@extends('layouts.admin_layout.admin_layout')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Female User Table</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Female User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!--  -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-light">
                            <div class="inner">
                                <p class="font-weight-bold">Male Users</p>

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

                    <!--  -->
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class=" content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Female Users</h3>

                            </div>
                            <div class="card-body">
                                <table id="example1" class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>UserName</th>
                                            <th>Name</th>
                                            <th>UserType</th>
                                            <th>Gender</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>
                                                @if($user['isVerified']==1)
                                                <label class="label" style=" background-color: #25CE2A;"><a
                                                        href="{{url('user/update-verify',$user['id'])}}"
                                                        style="color:white;"> verified
                                                    </a></label>

                                                @else

                                                <label class="label" style=" background-color: #F15A27;"><a
                                                        href="{{url('user/update-verify',$user['id'])}}"
                                                        style="color:white;">un-verified
                                                    </a></label>

                                                @endif
                                            </td>
                                            <td>{{$user->gender}}</td>




                                            <td>
                                                <a href="{{url('/user/show/'.$user['id'])}}" class="btn btn-color"
                                                    role="button"><i class="fas fa-eye"></i></a>

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
    </div>
</div>

@endsection