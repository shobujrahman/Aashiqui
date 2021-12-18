@extends('layouts.admin_layout.admin_layout')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>VerificationsTable</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Verifications</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!--  -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-light">
                            <div class="inner">
                                <p class="font-weight-bold">Total Stream</p>

                                <h3>9</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users" style="color:#FF2626;"></i>
                            </div>
                            <a href="{{url('/femaleUser')}}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right" style="color:#FF2626;"></i></a>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-light">
                            <div class="inner">
                                <p class="font-weight-bold">Total View</p>

                                <h3>8</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users" style="color:#FF2626;"></i>
                            </div>
                            <a href="{{url('/femaleUser')}}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right" style="color:#FF2626;"></i></a>
                        </div>
                    </div>
                    <!--  -->
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
                                <h3 class="card-title">All Stream</h3>

                            </div>
                            <div class="card-body">
                                <table id="example1" class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>UserName</th>
                                            <th>Name</th>
                                            <th>UserType</th>
                                            <th>Status</th>
                                            <th>Insert Viewer</th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>



                                            <td>
                                                <a href="#" class="btn btn-color" role="button"><i
                                                        class="fas fa-pen-fancy"></i></a>
                                                <a href="#" class="btn btn-color" role="button"><i
                                                        class="fas fa-eye"></i></a>

                                                <a href="#" class="btn btn-color" role="button"><i
                                                        class="far fa-trash-alt"></i></a>
                                            </td>
                                        </tr>

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