@extends('layouts.master')
@section('sabercrm')
<title>Saber Group - Monthly Report</title>
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
            
                                            <h4 class="mt-0 header-title">Monthly Report</h4>
                                            <button style="background-color: black;border-color: black"  class="btn btn-danger btn-lg noPrint" onclick="goBack()"><i class="fa fa-chevron-circle-left"></i> {{__("Back")}}</button>


                                            <hr>

                                            <div class="clearfix"></div>

                                            <form method="POST" action="{{url('/moderation/getmonrhlyreport')}}">
                                                {{csrf_field()}}
                                            <div class="row">

                                                <div class="form-group col-lg-12">
                                                    <label>Client *</label>
                                                    <div>
                                                        <select style="width: 50%" name="var0" id="month" class="form-control" required>
                                                            <option value="">Choose Client</option>
                                                            @foreach($client as $client)
                                                                <option value="{{$client->client_id}}">{{$client->client_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group col-lg-6">
                                                    <label>Month *</label>
                                                    <div>
                                                        <input  name="var1" id="month" type="Number" class="form-control" required
                                                                placeholder="Month"/>
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label>Year *</label>
                                                    <div>
                                                        <input name="var2" id="year" type="Number" class="form-control" required
                                                                placeholder="year"/>
                                                    </div>
                                                </div>

                                        
                                            </div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
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
