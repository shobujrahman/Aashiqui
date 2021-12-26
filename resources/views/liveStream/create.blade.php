@extends('layouts.admin_layout.admin_layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Stream Create Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">LiveStream</li>
                        <li class="breadcrumb-item active">Stream Create Form</li>
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
                            <h3 class="card-title font-weight-bold">Add Stream</h3>
                        </div>
                        <!-- /.card-header -->
                        <form name="streamForm" id="streamForm" action="{{ url('/liveStream/submit') }}" method="post"
                            enctype="multipart/form-data">@csrf
                            <div class="card-body">




                                <div class="form-group">
                                    <label>Fake Users</label>
                                    <div class="select2-purple">
                                        <select class="custom-select form-control-border" data-placeholder="Choose User"
                                            data-dropdown-css-class="select2-purple" style="width: 100%;"
                                            name="user_id">
                                            <option disabled selected value>Choose User</option>
                                            @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Url Type</label>
                                    <div class="select2-purple">
                                        <select id="type" style="width: 100%;" name="url_type"
                                            class="custom-select form-control-border">

                                            <option disabled selected value>Choose Type</option>
                                            <option value="Youtube">Youtube</option>
                                            <option value="Hls">Hls</option>
                                            <option value="Rtsp">Rtsp</option>
                                            <option value="Rtmp">Rtmp</option>
                                            <option value="Ts">Ts</option>
                                            <option value="Mpd">Mpd</option>
                                            <option value="Others">Others</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" style="display: none;" id='url'>
                                    <label for="url">Url</label>
                                    <input type="text" class="form-control form-control-border" id="url" name="url"
                                        placeholder="enter url">
                                </div>

                                <div class="form-group" style="display: none;" id="upload_video">
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