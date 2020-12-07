@extends('layouts.master')
@section('sabercrm')
<title>Saber Group - Add New Lead</title>
@include('moderation::layouts.modside')


	 <!-- ==================
                         PAGE CONTENT START
                         ================== -->

                    <div class="page-content-wrapper">

                        <div class="container-fluid">

                            <div class="row">
                               
            
                                <div style="display: block;margin:auto;" class="col-lg-8">
                                    <div class="card m-b-20">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title">Add New Lead</h4>

                                            <button style="background-color: black;border-color: black"  class="btn btn-danger btn-lg noPrint" onclick="goBack()"><i class="fa fa-chevron-circle-left"></i> {{__("Back")}}</button>
                                            <hr>
            
                                    <form enctype="multipart/form-data" method="POST" action="{{url('/moderation/addnewlead_store')}}">
                                            	{{csrf_field()}}
                                                @include('layouts.errors')
            
                                                <div class="form-group">
                                                    <label>Name *</label>
                                                    <div>
                                                        <input name="var1" id="name" type="text" class="form-control" required
                                                                placeholder="Name"/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Mobile *</label>
                                                    <div>
                                                        <input name="var2" id="var2" min="11"  type="Number" class="form-control" required
                                                                placeholder="Mobile"/>

                                                        <br>

                                                    <input  style="background-color: #660099;border-color: #660099;"
                                                    class="btn btn-danger btn-lg noPrint" onclick="checknumber_leads()" value="Check Number" type="button">


                                                    <ul id="number" style="margin-top: 10px;color: #6fd088">
                                                    </ul>

                                                    </div>
                                                </div>

                                                <hr>


                                                <div class="form-group">
                                                    <label>City *</label>
                                                    <div>
                                                        <select name="var5" id="type" type="text" class="form-control" required>
                                                           <option value="">Choose City</option>
                                                           @foreach($city as $city)
                                                            <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label>Our Clients</label>
                                                    <div>
                                                        <select onchange="getcat_client()" name="var3" id="var3" type="text" class="form-control" required>
                                                           <option value="">Choose Client</option>
                                                           @foreach($client as $client)
                                                            <option value="{{$client->client_id}}">{{$client->client_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                                  <div class="form-group">
                                                    <label>Clients Categories</label>
                                                    <div>
                                                        <select name="var7" id="getcat" type="text" class="form-control" required>
                                                           <option value="">Choose Client Category</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label>Message Description </label>
                                                    <div>
                                                        <textarea rows="6" name="var4" id="name" type="text" class="form-control" >
                                                            
                                                        </textarea>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label>File *</label>
                                                    <div>
                                                        <input name="var6" id="name" type="file" class="form-control"
                                                                placeholder="City"/>
                                                    </div>
                                                </div>

                                               
                                                	<hr>
            
                                                <div class="form-group m-b-0">
                                                    <div>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                            Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
            

                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->


@include('layouts.footer')
@endsection
