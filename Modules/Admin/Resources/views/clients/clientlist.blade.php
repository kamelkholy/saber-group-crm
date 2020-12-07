@extends('layouts.master')

@section('sabercrm')
<title>Saber Group - Client List</title>
@include('admin::layouts.side')



	<div class="page-content-wrapper">

                        <div class="container-fluid">



                        	<div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div  class="card-body">
            
                                            <h4 class="mt-0 header-title">Client List</h4>
                                            <button style="background-color: black;border-color: black"  class="btn btn-danger btn-lg noPrint" onclick="goBack()"><i class="fa fa-chevron-circle-left"></i> {{__("Back")}}</button>
                                            @if (isset($urls['add']))
						                    <a   href="{{$urls['add']}}" class="btn btn-primary btn-lg"><i class="fa fa-plus"></i> {{__("Add New Client")}} </a>
						                   @endif


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