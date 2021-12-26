@extends('layouts.admin_layout.admin_layout')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Comments Table</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Comments</li>
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
                                <h3 class="card-title">Comments</h3>
                                <a href="{{url('/comments/create')}}"
                                    style="max-width: 150px; float:right; display:inline-block;"
                                    class="btn btn-block btn-warn"><i class="fas fa-plus"></i> Comment</a>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>User Name</th>
                                            <th>Comments</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($comments as $comment)
                                        <tr>

                                            <td>{{$no++}}</td>
                                            <td>{{$comment->name}}</td>
                                            <td>{{$comment->comment}}</td>
                                            <td>
                                                <a href="{{url('/comments/edit/'.$comment->id)}}" class="btn btn-color"
                                                    role="button"><i class="fas fa-pen-fancy"></i></a>
                                                <!-- <a href="#" class="btn btn-color" role="button"><i
                                                        class="fas fa-eye"></i></a> -->

                                                <a onclick="return confirm('Are you sure want to delete this Comment?')"
                                                    href="{{url('/comments/delete/'.$comment->id)}}"
                                                    class="btn btn-color" role="button"><i
                                                        class="far fa-trash-alt"></i></a>
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