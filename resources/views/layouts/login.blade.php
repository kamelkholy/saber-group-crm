@extends('layouts.master')
@section('sabercrm')
<title>Saber Group </title>


 
	 <!-- Begin page -->
        <div style="background-color: #d72928;"  class="accountbg"></div>
        <div style="margin-right: 100px"  class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="index.html" class="logo logo-admin"><img src="{{url('/public/pic/logo.png')}}" height="100px" alt="logo"></a>

                    </h3>

                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Welcome To !</h4>
                        <p style="font-size: 25px;font-weight: bold;" class="text-muted text-center">Saber Group CRM</p>

                        <form class="form-horizontal m-t-30" method="POST" action="{{url('/checkuser')}}">
                            {{csrf_field()}}
                            @include('layouts.errors')
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter username">
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                            </div>

                            <div style="float: right;" class="form-group row m-t-20">
                                <div class="col-sm-6 text-right">
                                    <button class="btn btn-pink w-md waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>


                        </form>
                    </div>

                </div>
            </div>

            <div style="color: white" class="m-t-40 text-center">
               
                <p>© 2020 Customer Relationship Management System <i style="color:white" class="mdi mdi-heart text-default"></i> by Saber Group</p>
            </div>

        </div>




@endsection




