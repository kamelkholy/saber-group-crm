@extends('layouts.master')
@section('sabercrm')
<title>Saber Group - Add New User</title>
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
            
                                            <h4 class="mt-0 header-title">Add New User</h4>
                                            @include('layouts.errors')

                                            <hr>
            
                                            <form method="POST" action="{{url('/admin/addnewuser_store')}}">
                                            	{{csrf_field()}}
            
                                                <div class="form-group">
                                                    <label>User Name *</label>
                                                    <div>
                                                        <input name="var1" type="text" class="form-control" required
                                                                placeholder="User Name"/>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label>E-mail *</label>
                                                    <div>
                                                        <input name="var2" type="email" class="form-control" required
                                                                placeholder="E-mail"/>
                                                    </div>
                                                </div>

                                                 <div class="form-group">
                                                    <label>Password *</label>
                                                    <div>
                                                        <input name="var3" type="password" class="form-control" required
                                                                placeholder="Password"/>
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label>Account Type *</label>
                                                    <div>
                                                        <select name="var4" type="text" class="form-control" required>
                                                           <option value="">Choose One</option>
                                                           <option value="1">Admin</option>
                                                           <option value="3">Moderation</option>
                                                           <option value="4">Client Sales</option>
                                                           <option value="5">Moderation Manager</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Client</label>
                                                    <div>
                                                        <select name="var5" id="type" type="text" class="form-control">
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
