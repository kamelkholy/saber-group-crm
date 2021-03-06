@extends('layouts.master')
@section('sabercrm')
<title>Saber Group - Night Shift Report</title>
@include('moderation::layouts.modside')


	 <!-- ==================
                         PAGE CONTENT START
                         ================== -->

                    <div class="page-content-wrapper">

                        <div class="container-fluid">



                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div  class="card-body">
            
                                            <h4 class="mt-0 header-title">Night Shift Report</h4>
                                            <button style="background-color: black;border-color: black"  class="btn btn-danger btn-lg noPrint" onclick="goBack()"><i class="fa fa-chevron-circle-left"></i> {{__("Back")}}</button>


                                            <hr>

                                            <div class="clearfix"></div>
                                        <form method="POST" action="{{url('/moderation/nightallclientsreport')}}">
                                        {{csrf_field()}}
                                            <div class="row">
                                                
                                                <div class="form-group col-lg-6">
                                                    <label>Start Date *</label>
                                                    <div>
                                                        <input   name="var1" id="month" type="date" class="form-control" required
                                                                placeholder="Month"/>
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label>End Date *</label>
                                                    <div>
                                                        <input   name="var2" id="month" type="date" class="form-control" required
                                                                placeholder="Month"/>
                                                    </div>
                                                </div>


                                                <div class="form-group col-lg-6">
                                                    <label>Choose Start Time *</label>
                                                    <div>
                                                        <input  name="var3" id="month" type="text" class="form-control" required
                                                                placeholder="Just Write Number For Example 11:00"/>
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label>Choose End Time *</label>
                                                    <div>
                                                        <input  name="var4" id="month" type="text" class="form-control" required
                                                                placeholder="Just Write Number For Example 3:00"/>
                                                    </div>
                                                </div>

                                        
                                            </div>
                                            <button  class="btn btn-primary waves-effect waves-light">
                                                            Show Report
                                                        </button>

                                                <br>
                                                <br>

                                            </form>

                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->


                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                
@include('layouts.footer')
@endsection
