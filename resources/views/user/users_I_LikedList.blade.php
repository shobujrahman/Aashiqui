@extends('layouts.admin_layout.admin_layout')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>UsersILiked</h1>
                        <h4>{{$user->name}} <img style="width: 60px; height: 50px; border-radius: 60%;"
                                src="{{env('URL')}}{{$user['profile_pic']}}" /></h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">UsersILiked</li>
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
                                <!-- <h3 class="card-title">Likers of {{$user->name}}</h3> -->

                            </div>
                            <div class="card-body">
                                <table id="example1" class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>Liked</th>
                                            <th>UserPhoto</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @forelse($users as $key=>$item)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$item['name']}}</td>
                                            <td>

                                                @if(!empty($item['profile_pic']))

                                                <img style="width: 50px; height: 50px;"
                                                    src="{{env('URL')}}{{$item['profile_pic']}}" />
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
                                        @empty
                                        <tr>
                                            <td></td>
                                            <td colspan="7">
                                                No Records Found
                                            </td>

                                        </tr>


                                        @endforelse

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