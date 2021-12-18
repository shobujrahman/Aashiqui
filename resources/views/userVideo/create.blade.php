@extends('layouts.admin_layout.admin_layout')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
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
                            <h3 class="card-title font-weight-bold">Add User Video </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="form-group">
                                <label for="userId">User</label>
                                <select class="custom-select form-control-border" id="userId" name="userId">
                                    <option disabled selected value>Choose User</option>
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectBorder">Video Type</label>
                                <select class="custom-select form-control-border" id="video_type" name="video_type">
                                    <option value="youtube">YouTube</option>
                                    <option value="hls">HLS</option>
                                    <option value="rtmp">RTMP</option>
                                    <option value="rtsp">RTSP</option>
                                    <option value="ts">TS</option>
                                    <option value="embed">EMBED</option>
                                    <option value="daily motion">DAILY MOTION</option>
                                    <option value="vimeo">VIMEO</option>
                                    <option value="others">OTHERS</option>

                                </select>
                            </div>
                            <div class="form-group" style="display: none;" id="videoUrl">
                                <label for="exampleInputBorder">Video Url</label>
                                <input type="text" class="form-control form-control-border" id="exampleInputBorder"
                                    name="videoUrl" placeholder="enter url">
                            </div>
                            <div class="form-group" style="display: none;" id="uploadVideo">
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