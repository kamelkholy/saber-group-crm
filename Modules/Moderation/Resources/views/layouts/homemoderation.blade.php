@extends('layouts.master')
@section('sabercrm')
<title>Saber Group - Moderation</title>
@include('moderation::layouts.modside')

 <!-- ==================
                         PAGE CONTENT START
                         ================== -->

                    <div class="page-content-wrapper">


                        <div class="container-fluid">
                             <div class="row">
                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-info">{{$today}}</h3>
                                            Today Leads
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-purple">{{$currmonth}}</h3>
                                            Current Month
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-primary">{{$curryear}}</h3>
                                            Current Year
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-danger">{{$allleads}}</h3>
                                            All Leads
                                        </div>
                                    </div>
                                </div>

                                 <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-info">{{$deals}}</h3>
                                            Deals 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-purple">{{$calls}}</h3>
                                            Calls
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-primary">{{$hold}}</h3>
                                            On Hold
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-danger">{{$noaction}}</h3>
                                            No Actions
                                        </div>
                                    </div>
                                </div>

                                  <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-info">{{$clients}}</h3>
                                            Clients 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-purple">{{$mod}}</h3>
                                            Moderations
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-primary">{{$sales}}</h3>
                                            Sales
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-danger">{{$admin}}</h3>
                                            Admins
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <img style="display: block;margin: auto;padding-top: 20px;padding-bottom: 10px" width="200px" src="{{url('/public/pic/logo.png')}}"
                    height="90px" alt="logo">
                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

@include('layouts.footer')
@endsection
