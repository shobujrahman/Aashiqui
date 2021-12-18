@extends('layouts.admin_layout.admin_layout')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>InterestTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Interests</li>
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
                                <h3 class="card-title">All Interests</h3>
                                <!-- <a href="{{url('/interest/create')}}" style="max-width: 150px; float:right; display:inline-block;" class="btn btn-block btn-warning"><i class="fas fa-plus"></i> Interest</a> -->
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warn" data-toggle="modal"
                                    data-target="#exampleModalCenter"
                                    style="max-width: 200px; float:right; display:inline-block;">
                                    <i class="fas fa-plus-circle"> Interest</i>

                                </button>
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color:#5A6268; color:#fff">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Interest Create Form
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form onsubmit="return validateForm()" name="iterestForm"
                                                    id="iterestForm" action="{{ url('/interest/submit') }}"
                                                    method="post" enctype="multipart/form-data">@csrf
                                                    <!-- <div class="card-body"> -->
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="interestName">Title</label>
                                                            <input type="text" class="form-control form-control-border"
                                                                name="interestName" id="interestName"
                                                                placeholder="enter title">
                                                        </div>
                                                    </div>
                                                    <!-- </div> -->

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
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($interests as $interest)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $interest->interestName }}</td>
                                            <td>
                                                <!-- <a href="#" class="btn btn-warning" role="button"><i class="fas fa-pen-fancy"></i></a> -->
                                                <button type="button" class="btn btn-color" data-toggle="modal"
                                                    data-target="#exampleModalCenter{{$interest->id}}">
                                                    <i class="fas fa-pen-fancy"></i>
                                                </button>

                                                <div class="modal fade" id="exampleModalCenter{{$interest->id}}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header"
                                                                style="background-color:#5A6268; color:#fff">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                                    Interest Edit Form</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form onsubmit="return editValidateForm()"
                                                                    name="iterest" id="iterest"
                                                                    action="{{ url('/interest/update/'.$interest->id) }}"
                                                                    method="post" enctype="multipart/form-data">@csrf
                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="interestName">Title</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-border"
                                                                                name="interestName" id="interestName"
                                                                                placeholder="enter title"
                                                                                value="{{$interest->interestName}}">
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
                                                <a onclick="return confirm('Are you sure want to delete this Interest?')"
                                                    href="{{url('/interest/delete/'.$interest->id)}}"
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


<!-- <script type="text/javascript">

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





</script> -->
@endsection