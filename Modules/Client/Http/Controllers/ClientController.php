<?php

namespace Modules\Client\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\User;
use App\Customer;
use App\Client;
use Auth;

class ClientController extends Controller
{
    
    public function home()
    {
        $getclientid = new Client;
        $getclientid = $getclientid->getclient(Auth::user()->id);

        foreach ($getclientid as $getclientid) {

            $client = $getclientid->client_id;
            
        }

        $date = date('Y-m-d');
        $month = date('m');
        $year = date('Y');
        $today = Customer::where('customer_date',$date)->where('client_id',$client)->count('customer_date');
        $currmonth = Customer::where('customer_month',$month)
        ->where('customer_year',$year)->where('client_id',$client)->count('customer_month');
        $curryear = Customer::where('customer_year',$year)->where('client_id',$client)->count('customer_year');
        $allleads = Customer::where('client_id',$client)->count();
        $deals = Customer::where('customer_status',3)->where('client_id',$client)->count('customer_status');
        $calls = Customer::where('customer_status',1)->where('client_id',$client)->count('customer_status');
        $hold = Customer::where('customer_status',2)->where('client_id',$client)->count('customer_status');
        $noaction = Customer::where('customer_status',0)
        ->where('client_id',$client)->count('customer_status');
        return view('client::layouts.clienthome',[
            'allleads' => $allleads,
            'currmonth' => $currmonth,
            'curryear' => $curryear,
            'today' => $today,
            'deals' => $deals,
            'calls' => $calls,
            'hold' => $hold,
            'noaction' => $noaction

        ]);
    }

    //today reports
    public function gettodayreport()
    {
        $getclientid = new Client;
        $getclientid = $getclientid->getclient(Auth::user()->id);

        foreach ($getclientid as $getclientid) {

            $client = $getclientid->client_id;
            
        }

        $date = date('Y-m-d');


        $getlead = new Customer;
        $records = $getlead->getlead_client($client,$date);


        return view('client::today.todayreport', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }

    public function getcurrentmonth()
    {
        $getclientid = new Client;
        $getclientid = $getclientid->getclient(Auth::user()->id);

        foreach ($getclientid as $getclientid) {

            $client = $getclientid->client_id;
            
        }

        $month = date('m');

        $year = date('Y');


        $getlead = new Customer;
        $records = $getlead->getlead_client_month($client,$month,$year);


        return view('client::today.currentmonth', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }

    public function getcurrentyear()
    {
        $getclientid = new Client;
        $getclientid = $getclientid->getclient(Auth::user()->id);

        foreach ($getclientid as $getclientid) {

            $client = $getclientid->client_id;
            
        }

        $year = date('Y');


        $getlead = new Customer;
        $records = $getlead->getlead_client_year($client,$year);


        return view('client::today.currentyear', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }

    public function allleads()
    {
        $getclientid = new Client;
        $getclientid = $getclientid->getclient(Auth::user()->id);

        foreach ($getclientid as $getclientid) {

            $client = $getclientid->client_id;
            
        }


        $getlead = new Customer;
        $records = $getlead->getlead_client_all($client);


        return view('client::today.allleads', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }

    //Dynamic
    //get month Report
    public function monthlyreport_main()
    {
        return view('client::monthly.monthlymain');
    }

    public function getmonrhlyreport(Request $request)
    {
        $month = $request->input('var1');
        $year = $request->input('var2');

        $getclientid = new Client;
        $getclientid = $getclientid->getclient(Auth::user()->id);

        foreach ($getclientid as $getclientid) {

            $client = $getclientid->client_id;
            
        }

        $getlead = new Customer;
        $records = $getlead->getleadmonthlyreport($client,$month,$year);
        return view('client::monthly.monthlyreport', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }

    public function datemain()
    {
        return view('client::date.datemain');
    }

    public function datemain_get(Request $request)
    {
        $date = $request->input('var1');


        $getclientid = new Client;
        $getclientid = $getclientid->getclient(Auth::user()->id);

        foreach ($getclientid as $getclientid) {

            $client = $getclientid->client_id;
            
        }


        $getlead = new Customer;
        $records = $getlead->getbydate($client,$date);


        return view('client::date.leadbydate', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }

    public function daterange()
    {
        return view('client::date.daterange');
    }

    public function daterangereport(Request $request)
    {
        $date = $request->input('var1');
        $enddate = $request->input('var2');


        $getclientid = new Client;
        $getclientid = $getclientid->getclient(Auth::user()->id);

        foreach ($getclientid as $getclientid) {

            $client = $getclientid->client_id;
            
        }


        $getlead = new Customer;
        $records = $getlead->daterangereport($client,$date,$enddate);


        return view('client::date.daterangereport', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }


    public function timemain()
    {
        return view('client::time.timemain');
    }

    public function timerangereport(Request $request)
    {
        $date = $request->input('var1');
        $starttime = $request->input('var2');
        $endtime = $request->input('var3');



        $getclientid = new Client;
        $getclientid = $getclientid->getclient(Auth::user()->id);

        foreach ($getclientid as $getclientid) {

            $client = $getclientid->client_id;
            
        }


        $getlead = new Customer;
        $records = $getlead->timerangereport($client,$date,$starttime,$endtime);


        return view('client::time.timerangereport', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }

}
