@extends('layouts.admin_layout.admin_layout')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>GiftTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Gift</li>
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
                                <p class="font-weight-bold">Total Gifts</p>

                                <h3>9</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-gift mt-4" style="color:#FFC916; font-size:50px;"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"
                                    style="color:#FFC916;"></i></a>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-light">
                            <div class="inner">
                                <p class="font-weight-bold">Gift Sends</p>

                                <h3>8</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-gift mt-4" style="color:#FFC916; font-size:50px;"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"
                                    style="color:#FFC916;"></i></a>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-light">
                            <div class="inner">
                                <p class="font-weight-bold">Gift Receives</p>

                                <h3>8</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-gift mt-4" style="color:#FFC916; font-size:50px;"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"
                                    style="color:#FFC916;"></i></a>
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
                                <h3 class="card-title">All Gifts</h3>
                                <!-- <a href="{{url('/interest/create')}}" style="max-width: 150px; float:right; display:inline-block;" class="btn btn-block btn-warning"><i class="fas fa-plus"></i> Interest</a> -->
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warn" data-toggle="modal"
                                    data-target="#exampleModalCenter"
                                    style="max-width: 200px; float:right; display:inline-block;">
                                    <i class="fas fa-plus-circle"> Gift</i>

                                </button>
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color:#5A6268; color:#fff">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Gift Create Form
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form onsubmit="return validateForm()" id="addGift" name="addGift"
                                                    action="{{ url('/gift/submit') }}" method="post"
                                                    enctype="multipart/form-data">@csrf
                                                    <!-- <div class="card-body"> -->
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input type="text" class="form-control form-control-border"
                                                                name="name" id="name" placeholder="enter title">
                                                        </div>
                                                        <!-- <div class="form-group">
                                                            <label for="ItemUrl">Category Image</label>
                                                           
                                                            <div class="input-group">
                                                                <input type="file"
                                                                    class="form-control @error('ItemUrl') is-invalid @enderror"
                                                                    id="ItemUrl" name="ItemUrl">
                                                                &nbsp; &nbsp;
                                                               
                                                            </div>
                                                    
                                                        </div> -->

                                                        <div class="form-group">
                                                            <label for="ItemUrl">Image</label>
                                                            <div class="input-group">
                                                                <input type="file" id="ItemUrl" name="ItemUrl"
                                                                    class="dropify @error('ItemUrl') is-invalid @enderror"
                                                                    value="{{ old('ItemUrl') }}">
                                                                @error('image')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
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
                                            <th>Name</th>
                                            <th>ItemUrl</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($gifts as $gift)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $gift->name }}</td>
                                            <td>
                                                @if(!empty($gift->ItemUrl))
                                                <img style="width: 100px; height: 100px;" alt="no image"
                                                    src="{{asset('images/'.$gift->ItemUrl)}}" />
                                                @endif
                                            </td>
                                            <td>
                                                <!-- <a href="#" class="btn btn-warning" role="button"><i class="fas fa-pen-fancy"></i></a> -->
                                                <button type="button" class="btn btn-color" data-toggle="modal"
                                                    data-target="#exampleModalCenter{{$gift->id}}">
                                                    <i class="fas fa-pen-fancy"></i>
                                                </button>

                                                <div class="modal fade" id="exampleModalCenter{{$gift->id}}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header"
                                                                style="background-color:#5A6268; color:#fff">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                                    Gift Edit Form</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form onsubmit="return editValidateForm()"
                                                                    name="editGift" id="editGift"
                                                                    action="{{ url('/gift/update/'.$gift->id) }}"
                                                                    method="post" enctype="multipart/form-data">@csrf
                                                                    <input type="hidden" name="old_img"
                                                                        value="{{$gift->ItemUrl}}">
                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="name">Name</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-border"
                                                                                name="name" id="name"
                                                                                value="{{ $gift->name }}"
                                                                                placeholder="enter title">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="ItemUrl">Image</label>
                                                                            <div class="input-group">
                                                                                <input type="file" id="ItemUrl"
                                                                                    name="ItemUrl"
                                                                                    class="dropify @error('ItemUrl') is-invalid @enderror"
                                                                                    value="{{ old('ItemUrl') }}"
                                                                                    data-default-file="{{asset('images/'.$gift->ItemUrl)}}">
                                                                                @error('image')
                                                                                <div class="alert alert-danger">
                                                                                    {{ $message }}</div>
                                                                                @enderror
                                                                            </div>
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
                                                    href="{{url('/gift/delete/'.$gift->id)}}" class="btn btn-color"
                                                    role="button"><i class="far fa-trash-alt"></i></a>
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
    let x = document.forms["addGift"]["name"].value;
    let y = document.forms["addGift"]["ItemUrl"].value;
    if (x == "") {
        alert("Title must be filled out");

        return false;
    }
    if (y == "") {
        alert("Title must be input file");

        return false;
    }
}

function editValidateForm() {
    let x = document.forms["editGift"]["name"].value;
    let y = document.forms["editGift"]["ItemUrl"].value;
    if (x == "") {
        alert("Title must be filled out");

        return false;
    }
}

//create a function with javascript form validation
</script>
@endsection