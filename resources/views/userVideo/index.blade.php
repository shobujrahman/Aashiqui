@extends('layouts.admin_layout.admin_layout')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 mt-4">
                    <div class="col-sm-6">
                        <h1>UsersVideo Table</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">UsersVideo</li>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All UsersVideo</h3>
                                <a href="{{ url('/uservideo/create') }}"
                                    style="max-width: 150px; float:right; display:inline-block;"
                                    class="btn btn-block btn-warn"><i class="fas fa-plus"></i> Add Video</a>
                            </div>
                            <div class="card-body" style="overflow-x:auto;">
                                <table id="example1" class="table table-hover overflow-auto">
                                    <thead>
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>User Name</th>
                                            <th>Video Url</th>
                                            <th>Url Type</th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($usersVideos as $video)
                                        <tr>
                                            <td>
                                                {{$no++}}
                                            </td>
                                            <td>
                                                {{$video->user->name}}
                                            </td>
                                            <td>
                                                {{$video->videoUrl}}
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