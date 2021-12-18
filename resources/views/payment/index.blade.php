@extends('layouts.admin_layout.admin_layout')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>PaymentsTable</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Payments</li>
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
                        <div class="small-box bg-dark">
                            <div class="inner">
                                <p class="font-weight-bold">Total Sell</p>

                                <h3>9</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users ico"></i>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-dark">
                            <div class="inner">
                                <p class="font-weight-bold">This Month</p>

                                <h3>8</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users ico"></i>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-dark">
                            <div class="inner">
                                <p class="font-weight-bold">This Week</p>

                                <h3>7</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users ico"></i>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-dark">
                            <div class="inner">
                                <p class="font-weight-bold">Today</p>

                                <h3>6</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users ico"></i>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-dark">
                            <div class="inner">
                                <p class="font-weight-bold">This Year</p>

                                <h3>5</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users ico"></i>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-dark">
                            <div class="inner">
                                <p class="font-weight-bold">Subscriber</p>

                                <h3>4</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users ico"></i>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-dark">
                            <div class="inner">
                                <p class="font-weight-bold">Motnhly Pack</p>

                                <h3>3</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users ico"></i>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-dark">
                            <div class="inner">
                                <p class="font-weight-bold">Yearly Pack</p>

                                <h3>2</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users ico"></i>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-dark">
                            <div class="inner">
                                <p class="font-weight-bold">Weekly Pack</p>

                                <h3>1</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users ico"></i>
                            </div>
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
                                <h3 class="card-title">All Payments</h3>

                            </div>
                            <div class="card-body">
                                <table id="example1" class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>UID</th>
                                            <th>User Name</th>
                                            <th>Date</th>
                                            <th>Package</th>
                                            <th>SubscriptionActivate Date</th>
                                            <th>SubscriptionExpire Date</th>
                                            <th>Amount</th>
                                            <th>TranslationId</th>
                                            <th>Package</th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($payments as $payment)
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>



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