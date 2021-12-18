@extends('layouts.admin_layout.admin_layout')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-light">
                            <div class="card-header">
                                <h3 class="card-title">Edit User</h3>
                            </div>
                            <!-- /.card-header -->
                            <form name="userForm" id="userForm" action="{{ url('/user/update/'.$user->id) }}"
                                method="post" enctype="multipart/form-data">@csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control form-control-border" id="name"
                                            name="name" value="{{$user->name}}" placeholder="enter name">
                                    </div>
                                    <div class="form-group">
                                        <label for="jobTitle">Job Title</label>
                                        <input type="text" class="form-control form-control-border"
                                            id="exampleInputBorder" name="jobTitle" placeholder="enter job title"
                                            value="{{$user->jobTitle}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Company</label>
                                        <input type="text" class="form-control form-control-border"
                                            id="exampleInputBorder" name="company" placeholder="enter company"
                                            value="{{$user->company}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">School</label>
                                        <input type="text" class="form-control form-control-border"
                                            id="exampleInputBorder" name="school" placeholder="enter school"
                                            value="{{$user->school}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">City</label>
                                        <input type="text" class="form-control form-control-border"
                                            id="exampleInputBorder" name="city" placeholder="enter city"
                                            value="{{$user->city}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control select2" style="width: 100%;" id="gender"
                                            name="gender">
                                            <option value="male" <?php if($user->gender=='male'){ echo "selected";} ?>>
                                                Male
                                            </option>
                                            <option value="female"
                                                <?php if($user->gender=='female'){ echo "selected";} ?>>
                                                Female</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">About Me</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                            name="aboutMe" id="aboutMe">{{$user->aboutMe}}</textarea>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="update" class="btn btn-warn">Update</button>
                                </div>
                            </form>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection