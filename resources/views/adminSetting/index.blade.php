@extends('layouts.admin_layout.admin_layout')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Admin Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Admin Settings</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <form name="settingsForm" id="settingsForm" action="{{ url('/settings/update') }}" method="post"
                        enctype="multipart/form-data">@csrf
                        <div class="card">
                            <!-- form start -->
                            <div class="card-header" style="background-color:#5A6268; color:#fff">
                                <h3 class="card-title">Admin Settings</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class=" row card-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fcm_server_key">FCM Sever Key</label>
                                        <input type="text" class="form-control form-control-border" id="fcm_server_key"
                                            name="fcm_server_key" placeholder="fcm server key"
                                            value="{{$settings->fcm_server_key}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="about_us">About us</label>
                                        <textarea class="form-control" id="about_us" name="about_us"
                                            rows="3"> {{$settings->about_us}}</textarea>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="privacy_policy">Privacy Policy</label>

                                        <textarea id="summernote" name="privacy_policy">
                                        {{$settings->privacy_policy}}
                                        </textarea>
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warn">Submit</button>
                            </div>
                        </div>
                    </form>
                    <!-- /.card -->



                </div>

            </div>
        </div>
    </section>
</div>
@endsection