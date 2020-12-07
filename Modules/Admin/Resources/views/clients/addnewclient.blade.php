@extends('layouts.master')
@section('sabercrm')
<title>Saber Group - Add New Client</title>
@include('admin::layouts.side')


	 <!-- ==================
                         PAGE CONTENT START
                         ================== -->

                    <div class="page-content-wrapper">

                        <div class="container-fluid">

                            <div class="row">
                               
            
                                <div style="display: block;margin:auto;" class="col-lg-8">
                                    <div class="card m-b-20">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title">Add New Client</h4>
                                            <button style="background-color: black;border-color: black"  class="btn btn-danger btn-lg noPrint" onclick="goBack()"><i class="fa fa-chevron-circle-left"></i> {{__("Back")}}</button>
                                    

                                            <hr>
            
                                    <form enctype="multipart/form-data" method="POST" action="{{url('/admin/addnewclient_store')}}">
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
                                                        <input name="var2" id="phone" type="text" class="form-control" required
                                                                placeholder="Mobile"/>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label>E-mail *</label>
                                                    <div>
                                                        <input id="mail" name="var3" type="email" class="form-control" required
                                                                placeholder="E-mail"/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Logo</label>
                                                    <div>
                                                        <input name="var4" type="file" class="form-control" 
                                                            placeholder="Logo" />
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label>Account Type</label>
                                                    <div>
                                                        <select name="var5" id="type" type="text" class="form-control" required>
                                                           <option value="">Choose One</option>
                                                           <option value="1">Admin</option>
                                                           <option value="2">Client</option>
                                                           <option value="3">Modration</option>
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
