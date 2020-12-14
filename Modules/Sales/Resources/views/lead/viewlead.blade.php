@extends('layouts.master')
@section('sabercrm')
<title>Saber Group - View Lead</title>
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

                        <h4 class="mt-0 header-title">View Lead</h4>

                        <button style="background-color: black;border-color: black" class="btn btn-danger btn-lg noPrint" onclick="goBack()"><i class="fa fa-chevron-circle-left"></i> {{__("Back")}}</button>
                        <hr>

                        <div>
                            {{csrf_field()}}
                            @include('layouts.errors')

                            @foreach($customer as $customer)

                            <div class="form-group">
                                <label>Name *</label>
                                <div>
                                    <input disabled value="{{$customer->customer_name}}" name="var1" id="name" type="text" class="form-control" required placeholder="Name" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Mobile *</label>
                                <div>
                                    <input disabled value="{{$customer->customer_phone}}" name="var2" id="var2" min="11" type="Number" class="form-control" required placeholder="Mobile" />

                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div>
                                    <input disabled value="{{$customer->status}}" type="text" class="form-control" required placeholder="Status" />

                                </div>
                            </div>
                            <hr>


                            <div class="form-group">
                                <label>City *</label>
                                <div>
                                    <select disabled name="var3" id="type" type="text" class="form-control" required>
                                        <option style="color: red;font-size: 25px" value="{{$customer->customer_city}}">{{$customer->city_name}} </option>
                                        @foreach($city as $city)
                                        <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Our Clients</label>
                                <div>
                                    <select disabled onchange="getcat_client()" name="var4" id="var3" type="text" class="form-control" required>
                                        <option style="color: red;font-size: 25px" value="{{$customer->client_id}}">{{$customer->client_name}}</option>
                                        @foreach($client as $client)
                                        <option value="{{$client->client_id}}">{{$client->client_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Clients Categories</label>
                                <div>
                                    <select disabled name="var5" id="getcat" type="text" class="form-control" required>
                                        <option style="color: red;font-size: 25px" value="{{$customer->client_category}}">{{$customer->client_categories_name}}</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Message Description </label>
                                <div>
                                    <textarea disabled rows="6" name="var6" id="name" type="text" class="form-control">
                                    {{$customer->customer_message}}
                                    </textarea>
                                </div>
                            </div>

                            @endforeach


                            <hr>

                            <div class="form-group m-b-0">
                                <div>
                                    @if ($customer->status != "Deal")
                                    <a href="{{$urls['action']}}/{{ request()->route('customer_id') }}?back={{request()->path()}}" class="btn btn-success btn-sm"><i class="fa fa-check-circle-o"></i> Action </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


    </div><!-- container -->

</div> <!-- Page content Wrapper -->

</div> <!-- content -->


@include('layouts.footer')
@endsection