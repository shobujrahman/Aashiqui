@extends('layouts.admin_layout.admin_layout')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>FakeUserTable</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">FakeUsers</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!--  -->

        <!--  -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Fake Users</h3>
                                <a href="{{url('/fakeUsers/create')}}"
                                    style="max-width: 150px; float:right; display:inline-block;"
                                    class="btn btn-block btn-warn"><i class="fas fa-plus"></i> Fake User</a>

                            </div>
                            <div class="card-body" style="overflow-x:auto;">
                                <table id="example1" class="table table-hover overflow-auto">
                                    <thead>
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>UserName</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Age</th>
                                            <th>UserType</th>
                                            <th>Subscription</th>
                                            <th>Like</th>

                                            <th>Match</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $user['email'] }}</td>
                                            <td>{{ $user['name'] }}</td>
                                            <td>{{ $user['gender'] }}</td>
                                            <td>{{ $user['birthdate'] }}</td>


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

                                            <td>
                                                @if($user['isSubscribed']==1)
                                                <label class="label" style=" background-color: #FFCC1D;">Paid</label>
                                                @else
                                                <label class="label" style=" background-color: #F15A27;">Free</label>
                                                @endif
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>



                                            <td>
                                                <a href="{{url('/user/edit/'.$user['id'])}}" class="btn btn-color"
                                                    role="button"><i class="fas fa-pen-fancy"></i></a>
                                                <a href="{{url('/user/show/'.$user['id'])}}" class="btn btn-color"
                                                    role="button"><i class="fas fa-eye"></i></a>

                                                <a href="{{url('/user/delete/'.$user['id'])}}" class="btn btn-color"
                                                    onclick="return confirm('Are you sure want to delete this User?')"
                                                    role="button"><i class="far fa-trash-alt"></i></a>
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