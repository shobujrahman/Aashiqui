@extends('layouts.admin_layout.admin_layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Comments Edit Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Comments</li>
                        <li class="breadcrumb-item active">Comments Edit Form</li>
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
                            <h3 class="card-title font-weight-bold">Edit Comment</h3>
                        </div>
                        <!-- /.card-header -->
                        <form name="commentEditForm" id="commentEditForm"
                            action="{{ url('/comments/update/'.$comment->id) }}" method="post"
                            enctype="multipart/form-data">@csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control form-control-border" id="name" name="name"
                                        value="{{$comment->name}}" placeholder="enter Name">
                                </div>
                                <div class="form-group">
                                    <label>Drop Comment</label>
                                    <textarea name="comment" class="form-control" rows="3" placeholder="type here...">
                                        {{$comment->comment}}
                                    </textarea>
                                </div>
                                <br>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warn">Update</button>
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