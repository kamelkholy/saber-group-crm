@extends('layouts.master')
@section('sabercrm')
<title>Saber Group - Lead Actions</title>
@include('sales::layouts.salesside')


	 <!-- ==================
                         PAGE CONTENT START
                         ================== -->

                    <div class="page-content-wrapper">

                        <div class="container-fluid">

                            <div class="row">
                               
            
                                <div style="display: block;margin:auto;" class="col-lg-8">
                                    <div class="card m-b-20">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title">Lead Actions</h4>

                                            <button style="background-color: black;border-color: black"  class="btn btn-danger btn-lg noPrint" onclick="goBack()"><i class="fa fa-chevron-circle-left"></i> {{__("Back")}}</button>
                                            <hr>
            
                                    <form enctype="multipart/form-data" method="POST" action="{{url('/sales/action_store/'.request()->route('customer_id'))}}">
                                            	{{csrf_field()}}
                                                @include('layouts.errors')
            
                                                <div class="form-group">
                                                    <label>Action *</label>
                                                    <div>
                                                        <select name="var1" id="name" type="text" class="form-control" required
                                                                placeholder="Name">
                                                                    
                                                                <option value="">Choose Action</option>
                                                                <option value="1">Done or Call</option>
                                                                <option value="2">On Hold</option>
                                                                <option value="3">Deal</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label>Action Comment*</label>
                                                    <div>

                                                        <textarea rows="6" name="var2" id="name" type="text" class="form-control" required
                                                                placeholder="Action Comment"></textarea>
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
