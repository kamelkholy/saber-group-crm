@extends('layouts.master')
@section('sabercrm')
<title>Saber Group - Add New Client Category</title>
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
            
                                            <h4 class="mt-0 header-title">Add New Client Category</h4>

                                            <button style="background-color: black;border-color: black"  class="btn btn-danger btn-lg noPrint" onclick="goBack()"><i class="fa fa-chevron-circle-left"></i> {{__("Back")}}</button>
                                            <hr>
            
                                    <form enctype="multipart/form-data" method="POST" action="{{url('/moderation/addnewcat_store')}}">
                                            	{{csrf_field()}}
                                                @include('layouts.errors')
            
                                                <div class="form-group">
                                                    <label>Category Name *</label>
                                                    <div>
                                                        <input name="var1" id="name" type="text" class="form-control" required
                                                                placeholder="Name"/>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label>Clients</label>
                                                    <div>
                                                        <select name="var2" id="type" type="text" class="form-control" required>
                                                           <option value="">Choose Client</option>
                                                           @foreach($client as $client)
                                                            <option value="{{$client->client_id}}">{{$client->client_name}}</option>
                                                            @endforeach
                                                        </select>
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
