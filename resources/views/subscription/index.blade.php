@extends('layouts.admin_layout.admin_layout')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>SubsriptionTable</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Subsriptions</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section class="content">
            <div class="d-flex justify-content-center">
                <div class="form-group">
                    <label>FilterBySeason</label>
                    <form class="form-inline" action="">
                        <input type="text" class="form-control form-control-border" name="search" id="search"
                            placeholder="enter title">
                        <button type='submit' class="btn btn-warn">Filter</button>
                    </form>
                </div>
            </div>
        </section> -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Subsriptions</h3>
                                <!-- <a href="{{url('/interest/create')}}" style="max-width: 150px; float:right; display:inline-block;" class="btn btn-block btn-warning"><i class="fas fa-plus"></i> Interest</a> -->
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warn" data-toggle="modal"
                                    data-target="#exampleModalCenter"
                                    style="max-width: 200px; float:right; display:inline-block;">
                                    <i class="fas fa-plus-circle"> Subscription</i>

                                </button>
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color:#5A6268; color:#fff">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Subscription Create
                                                    Form
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form onsubmit="return validateForm()" name="iterestForm"
                                                    id="iterestForm" action="{{ url('/subscription/submit') }}"
                                                    method="post" enctype="multipart/form-data">@csrf

                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="name">Title</label>
                                                            <input type="text" class="form-control form-control-border"
                                                                name="name" id="name" placeholder="enter title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="price">Price</label>
                                                            <input type="text" class="form-control form-control-border"
                                                                name="price" id="price" placeholder="enter price">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="durationInMonth">Duration</label>
                                                            <input type="text" class="form-control form-control-border"
                                                                name="durationInMonth" id="durationInMonth"
                                                                placeholder="enter duration">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="viewCountMultiplier">ViewCount
                                                                Multiplier</label>
                                                            <input type="text" class="form-control form-control-border"
                                                                name="viewCountMultiplier" id="viewCountMultiplier"
                                                                placeholder="enter viewCountMultiplier as optional">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="metadata">Meta Data</label>
                                                            <input type="text" class="form-control form-control-border"
                                                                name="metadata" id="metadata"
                                                                placeholder="enter metadata as optional">
                                                        </div>

                                                    </div>


                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-warn"
                                                            id="formSubmit">Create</button>
                                                        <button type="button" class="btn"
                                                            style="background-color:#5A6268; color:#fff"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>DurationMonth</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subscriptions as $subscription)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $subscription->name }}</td>
                                            <td>{{ $subscription->price }}</td>
                                            <td>{{ $subscription->durationInMonth }}</td>
                                            <td>
                                                @if($subscription->isBlocked==0)
                                                <!-- <a href="{{url('subscription/update-status',$subscription->id)}}"
                                                    class="btn" style=" background-color: #25CE2A; color:#fff"> Enabled
                                                </a> -->
                                                <label class="label" style=" background-color: #25CE2A;"><a
                                                        href="{{url('subscription/update-status',$subscription->id)}}"
                                                        style="color:white;"> Enabled
                                                    </a></label>
                                                @else
                                                <!-- <a href="{{url('subscription/update-status',$subscription->id)}}"
                                                    class="btn" style=" background-color: #F15A27; color:#fff">Disabled
                                                </a> -->
                                                <label class="label" style=" background-color: #F15A27;"><a
                                                        href="{{url('subscription/update-status',$subscription->id)}}"
                                                        style="color:white;">Disabled
                                                    </a></label>
                                                @endif
                                            </td>
                                            <td>

                                                <button type="button" class="btn btn-color" data-toggle="modal"
                                                    data-target="#exampleModalCenter{{$subscription->id}}">
                                                    <i class="fas fa-pen-fancy"></i>
                                                </button>

                                                <div class="modal fade" id="exampleModalCenter{{$subscription->id}}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header"
                                                                style="background-color:#5A6268; color:#fff">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                                    Subscription Edit Form</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form onsubmit="return editValidateForm()"
                                                                    name="iterest" id="iterest"
                                                                    action="{{ url('/subscription/update/'.$subscription->id) }}"
                                                                    method="post" enctype="multipart/form-data">@csrf
                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="name">Title</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-border"
                                                                                name="name" id="name"
                                                                                placeholder="enter title"
                                                                                value="{{$subscription->name}}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="price">Price</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-border"
                                                                                name="price" id="price"
                                                                                placeholder="enter price"
                                                                                value="{{$subscription->price}}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="durationInMonth">Duration</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-border"
                                                                                name="durationInMonth"
                                                                                id="durationInMonth"
                                                                                placeholder="enter duration"
                                                                                value="{{$subscription->durationInMonth}}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="viewCountMultiplier">ViewCount
                                                                                Multiplier</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-border"
                                                                                name="viewCountMultiplier"
                                                                                id="viewCountMultiplier"
                                                                                placeholder="enter viewCountMultiplier optional"
                                                                                value="{{$subscription->viewCountMultiplier}}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="metadata">Meta Data</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-border"
                                                                                name="metadata" id="metadata"
                                                                                placeholder="enter metadata"
                                                                                value="{{$subscription->metadata}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-warn">Update</button>
                                                                        <button type="button" class="btn"
                                                                            style="background-color:#5A6268; color:#fff"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                &nbsp;
                                                <a onclick="return confirm('Are you sure want to delete this Subscription?')"
                                                    href="{{url('/subscription/delete/'.$subscription->id)}}"
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
<!-- ./wrapper -->


<script type="text/javascript">
function validateForm() {
    let x = document.forms["iterestForm"]["interestName"].value;
    if (x == "") {
        alert("Title must be filled out");

        return false;
    }
}

function editValidateForm() {
    let x = document.forms["iterest"]["interestName"].value;
    if (x == "") {
        alert("Title must be filled out");

        return false;
    }
}

//create a function with javascript form validation
</script>
@endsection