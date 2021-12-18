@extends('layouts.admin_layout.admin_layout')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ReportsTable</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Reports</li>
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
                                <h3 class="card-title">All Reports</h3>

                            </div>
                            <div class="card-body">
                                <table id="example1" class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>Reporter</th>
                                            <th>Reported</th>
                                            <th>Report Issue</th>
                                            <th>Reported Photo</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($userReports as $report)
                                        <tr>

                                            <td>{{ $no++ }}</td>
                                            <td>{{$report->reporterUser->name}}</td>
                                            <td>{{$report->reportedUser->name}}</td>
                                            <td>
                                                {{$report->report_issue}}

                                            </td>
                                            <td>

                                                @if(!empty($report->user_photo_id))

                                                <img style="width: 50px; height: 50px;"
                                                    src="{{env('URL')}}{{$report->reportedPhoto->imageUrl}}" />
                                                @else
                                                <?php echo "no photo"?>
                                                @endif

                                            </td>



                                            <td>
                                                <a href="#" class="btn btn-warning" role="button"><i
                                                        class="fas fa-pen-fancy"></i></a>
                                                <a href="#" class="btn btn-warning" role="button"><i
                                                        class="fas fa-eye"></i></a>

                                                <a href="#" class="btn btn-warning" role="button"><i
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