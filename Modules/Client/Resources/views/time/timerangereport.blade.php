@extends('layouts.master')

@section('sabercrm')
<title>Saber Group - Time Range Report</title>
@include('client::layouts.clientside')



	<div class="page-content-wrapper">

                        <div class="container-fluid">



                        	<div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div  class="card-body">
            
                                            <h4 class="mt-0 header-title">Time Range Report</h4>
                                            <button style="background-color: black;border-color: black"  class="btn btn-danger btn-lg noPrint" onclick="goBack()"><i class="fa fa-chevron-circle-left"></i> {{__("Back")}}</button>


                                            <hr>

                                            <div class="clearfix"></div>
            
                                            @include('layouts.tables')
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->


                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->



@include('layouts.footer')
@endsection