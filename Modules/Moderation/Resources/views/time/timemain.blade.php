@extends('layouts.master')
@section('sabercrm')
<title>Saber Group - Time Range Report</title>
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
            
                                            <h4 class="mt-0 header-title">Time Range Report</h4>
                                            <button style="background-color: black;border-color: black"  class="btn btn-danger btn-lg noPrint" onclick="goBack()"><i class="fa fa-chevron-circle-left"></i> {{__("Back")}}</button>


                                            <hr>

                                            <div class="clearfix"></div>
                                        <form method="POST" action="{{url('/moderation/timerangereport')}}">
                                        {{csrf_field()}}
                                            <div class="row">

                                                <div class="form-group col-lg-6">
                                                    <label>Client *</label>
                                                    <div>
                                                        <select name="var0" id="month"  class="form-control" required>
                                                            <option value="">Choose Client</option>
                                                            @foreach($client as $client)
                                                                <option value="{{$client->client_id}}">{{$client->client_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group col-lg-6">
                                                    <label>Choose Date *</label>
                                                    <div>
                                                        <input   name="var1" id="month" type="date" class="form-control" required
                                                                placeholder="Month"/>
                                                    </div>
                                                </div>


                                                <div class="form-group col-lg-6">
                                                    <label>Choose Start Time *</label>
                                                    <div>
                                                        <input  name="var2" id="month" type="text" class="form-control" required
                                                                placeholder="Just Write Number For Example 11:00"/>
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label>Choose End Time *</label>
                                                    <div>
                                                        <input  name="var3" id="month" type="text" class="form-control" required
                                                                placeholder="Just Write Number For Example 3:00"/>
                                                    </div>
                                                </div>

                                        
                                            </div>
                                            <div class = "row">
    <div class="container">
        <div class="row" style="align-items: baseline;">
            <h6 class="col-sm-2">Cities Filter :</h6>
            <div class="col-md-10">
            <div class="row">
            @foreach($citiesf as $city)
            <div class="col-sm-2 form-check-inline">
            <label class="form-check-label" for="{{$city->city_id}}">
            <input class="form-check-input" type="checkbox" name="city[]" value="{{$city->city_id}}" id="city_{{$city->city_id}}">{{$city->city_name}}
            </label>
            </div> 
            @endforeach
            </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row" style="align-items: baseline;">
        <h6 class="col-sm-2">Categories Filter :</h6>
        <div class="col-md-10">
        <div class="row">
        @foreach($ccf as $cc)
        <div class="col-sm-2 form-check-inline">
        <label class="form-check-label" for="{{$cc->client_categories_id}}">
        <input class="form-check-input" type="checkbox" name="cc[]" value="{{$cc->client_categories_id}}" id="cc_{{$cc->client_categories_id}}">{{$cc->client_categories_name}}
        </label>
        </div> 
        @endforeach
        </div>
        </div>
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
