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
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputBorder">Name</label>
                                <input type="text" class="form-control form-control-border" id="exampleInputBorder"
                                    name="videoUrl" placeholder="enter url">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBorder">Email</label>
                                <input type="text" class="form-control form-control-border" id="exampleInputBorder"
                                    name="videoUrl" placeholder="enter url">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBorder">ContactNo</label>
                                <input type="text" class="form-control form-control-border" id="exampleInputBorder"
                                    name="videoUrl" placeholder="enter url">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBorder">School</label>
                                <input type="text" class="form-control form-control-border" id="exampleInputBorder"
                                    name="videoUrl" placeholder="enter url">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBorder">Gender</label>
                                <input type="text" class="form-control form-control-border" id="exampleInputBorder"
                                    name="videoUrl" placeholder="enter url">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBorder">BirthDate</label>
                                <input type="text" class="form-control form-control-border" id="exampleInputBorder"
                                    name="videoUrl" placeholder="enter url">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBorder">UserPhoto</label>
                                <input type="text" class="form-control form-control-border" id="exampleInputBorder"
                                    name="videoUrl[]" placeholder="enter url">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBorder">Upload Video</label>
                                <input type="file" class="form-control form-control-border" id="exampleInputBorder"
                                    name="uploadVideo" placeholder="enter url">
                            </div>
                            <br>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warn" id="formSubmit">Create</button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->

@endsection