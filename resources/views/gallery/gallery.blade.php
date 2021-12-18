@extends('layouts.admin_layout.admin_layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gallery</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Gallery</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-light">
                        <div class="card-header">
                            <h4 class="card-title">All Users Photos</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($user_photos as $user)
                                <div class="col-sm-2">
                                    <div class="row px-3">
                                        <img src="{{env('URL')}}{{$user->user->profile_pic}}"
                                            class="profile-pic img-thumbnail" alt="white sample" />
                                        &nbsp;
                                        <div class="flex-column mt-2">
                                            <label class="label p-2"
                                                style=" background-color: #045CA6;">{{$user->user->name}}</label>
                                        </div>
                                    </div>
                                    &nbsp;
                                    <a href="{{env('URL')}}{{$user->imageUrl}}" data-toggle="lightbox"
                                        data-title="Photos" data-gallery="gallery">
                                        <img src="{{env('URL')}}{{$user->imageUrl}}" class="card-img-top img-thumbnail"
                                            alt="white sample" />
                                    </a>

                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection