@extends('layouts.admin_layout.admin_layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Fake User Create Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">FakeUsers</li>
                        <li class="breadcrumb-item active">Fake User Create Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <!-- general form elements -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Add Fake User</h3>
                        </div>
                        <!-- /.card-header -->
                        <form name="fakeUser" id="fakeUser" action="{{ url('/fakeUsers/submit') }}" method="post"
                            enctype="multipart/form-data">@csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="texemailt" class="form-control" id="email" name="email"
                                        placeholder="enter Email">
                                </div>
                                <div class="form-group">
                                    <label for="contactNo">ContactNo</label>
                                    <input type="text" class="form-control" id="contactNo" name="contactNo"
                                        placeholder="enter ContactNo">
                                </div>
                                <div class="form-group">
                                    <label for="school">School</label>
                                    <input type="text" class="form-control" id="school" name="school"
                                        placeholder="enter School">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <!-- <input type="text" class="form-control" id="exampleInputBorder" name="videoUrl"
                                    placeholder="enter Gender"> -->
                                    <select class="form-control" name="gender">

                                        <option value="male">Male</option>
                                        <option value="female">Female</option>

                                    </select>
                                </div>



                                <div class="form-group">
                                    <label>Interests</label>
                                    <div class="select2-purple">
                                        <select class="select2" multiple="multiple" data-placeholder="Choose Interests"
                                            data-dropdown-css-class="select2-purple" style="width: 100%;"
                                            name="interestId[]">
                                            @foreach($interests as $interest)
                                            <option value="{{$interest->id}}">{{$interest->interestName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <label>BirthDate</label>
                                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                        <input type="datetime" class="form-control datetimepicker-input"
                                            data-target="#reservationdatetime" name="birthdate" />
                                        <div class="input-group-append" data-target="#reservationdatetime"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label for="birthdate">BirthDate</label>
                                    <input type="datetime-local" id="birthdate" name="birthdate">
                                </div>

                                <div class="form-group">
                                    <label for="imageUrl">UserPhoto</label>
                                    <input type="file" class="form-control form-control-border" id="imageUrl"
                                        name="imageUrl[]" multiple placeholder="enter image url">
                                </div>
                                <div class="form-group">
                                    <label for="live_stream_url">Upload Video</label>
                                    <input type="file" class="form-control form-control-border" id="live_stream_url"
                                        name="live_stream_url" placeholder="enter url">
                                </div>
                                <br>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warn">Create</button>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->

@endsection