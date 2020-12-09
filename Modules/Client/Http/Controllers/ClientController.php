<?php

namespace Modules\Client\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\User;
use App\Customer;
use App\Client;
use App\Client_Category;
use App\City;
use Auth;

class ClientController extends Controller
{
    public function filter(Request $request)
    {

        $input = $request->all();

        $input['city'] = $request->input('city');
        $input['client'] = $request->input('client');
        $input['cc'] = $request->input('cc');

        return redirect($request->query('back').'?city='.json_encode($input['city']).'&client='.json_encode($input['client']).'&category='.json_encode($input['cc']))->withInput($request->all());;
    }
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
    public function gettodayreport(Request $request)
    {
        $getclientid = new Client;
        $getclientid = $getclientid->getclient(Auth::user()->id);

        foreach ($getclientid as $getclientid) {

            $client = $getclientid->client_id;
            
        }

        $date = date('Y-m-d');

        $filter = array([]);
        $filter['city'] = json_decode($request->query('city'));
        $filter['client'] = json_decode($request->query('client'));
        $filter['category'] = json_decode($request->query('category'));
        $cityM = new City;
        $clientM = new Client;
        $ccM = new Client_Category;
        $citiesf = $cityM->getcity();
        $clientsf = [];
        $ccf = NULL;
        $ccf = $ccM->getclientcat($client);

        $getlead = new Customer;
        $records = $getlead->getlead_client($client,$date, $filter);


        return view('client::today.todayreport', [
            'data' => $records,
            'urls' => array(
                'filter' => '/client/gettodayreport',
                'module' => '/client',
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function getcurrentmonth(Request $request)
    {
        $getclientid = new Client;
        $getclientid = $getclientid->getclient(Auth::user()->id);

        foreach ($getclientid as $getclientid) {

            $client = $getclientid->client_id;
            
        }

        $month = date('m');

        $year = date('Y');

        $filter = array([]);
        $filter['city'] = json_decode($request->query('city'));
        $filter['client'] = json_decode($request->query('client'));
        $filter['category'] = json_decode($request->query('category'));
        $cityM = new City;
        $clientM = new Client;
        $ccM = new Client_Category;
        $citiesf = $cityM->getcity();
        $clientsf = [];
        $ccf = NULL;
        $ccf = $ccM->getclientcat($client);


        $getlead = new Customer;
        $records = $getlead->getlead_client_month($client,$month,$year, $filter);


        return view('client::today.currentmonth', [
            'data' => $records,
            'urls' => array(
                'filter' => '/client/getcurrentmonth',
                'module' => '/client',
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function getcurrentyear(Request $request)
    {
        $getclientid = new Client;
        $getclientid = $getclientid->getclient(Auth::user()->id);

        foreach ($getclientid as $getclientid) {

            $client = $getclientid->client_id;
            
        }

        $year = date('Y');

        $filter = array([]);
        $filter['city'] = json_decode($request->query('city'));
        $filter['client'] = json_decode($request->query('client'));
        $filter['category'] = json_decode($request->query('category'));
        $cityM = new City;
        $clientM = new Client;
        $ccM = new Client_Category;
        $citiesf = $cityM->getcity();
        $clientsf = [];
        $ccf = NULL;
        $ccf = $ccM->getclientcat($client);


        $getlead = new Customer;
        $records = $getlead->getlead_client_year($client,$year, $filter);


        return view('client::today.currentyear', [
            'data' => $records,
            'urls' => array(
                'filter' => '/client/getcurrentyear',
                'module' => '/client',
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function allleads(Request $request)
    {
        $getclientid = new Client;
        $getclientid = $getclientid->getclient(Auth::user()->id);

        foreach ($getclientid as $getclientid) {

            $client = $getclientid->client_id;
            
        }

        $filter = array([]);
        $filter['city'] = json_decode($request->query('city'));
        $filter['client'] = json_decode($request->query('client'));
        $filter['category'] = json_decode($request->query('category'));
        $cityM = new City;
        $clientM = new Client;
        $ccM = new Client_Category;
        $citiesf = $cityM->getcity();
        $clientsf = [];
        $ccf = NULL;
        $ccf = $ccM->getclientcat($client);


        $getlead = new Customer;
        $records = $getlead->getlead_client_all($client, $filter);


        return view('client::today.allleads', [
            'data' => $records,
            'urls' => array(
                'filter' => '/client/allleads',
                'module' => '/client',
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    //Dynamic
    //get month Report
    public function monthlyreport_main()
    {
        $getclientid = new Client;
        $getclientid = $getclientid->getclient(Auth::user()->id);

        foreach ($getclientid as $getclientid) {

            $client = $getclientid->client_id;
            
        }

        $cityM = new City;
        $clientM = new Client;
        $ccM = new Client_Category;
        $citiesf = $cityM->getcity();
        $clientsf = $clientM->getclients_view();
        $ccf = $ccM->getclientcat($client);

        return view('client::monthly.monthlymain',[
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function getmonrhlyreport(Request $request)
    {
        $month = $request->input('var1');
        $year = $request->input('var2');

        $cityf = $request->input('city');
        $ccf = $request->input('cc');
        $filter = array([]);
        $filter['city'] = $request->input('city');
        $filter['category'] = $request->input('cc');

        $getclientid = new Client;
        $getclientid = $getclientid->getclient(Auth::user()->id);

        foreach ($getclientid as $getclientid) {

            $client = $getclientid->client_id;
            
        }

        $getlead = new Customer;
        $records = $getlead->getleadmonthlyreport($client,$month,$year, $filter);
        return view('client::monthly.monthlyreport', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }

    public function datemain()
    {
        $getclientid = new Client;
        $getclientid = $getclientid->getclient(Auth::user()->id);

        foreach ($getclientid as $getclientid) {

            $client = $getclientid->client_id;
            
        }

        $cityM = new City;
        $clientM = new Client;
        $ccM = new Client_Category;
        $citiesf = $cityM->getcity();
        $clientsf = $clientM->getclients_view();
        $ccf = $ccM->getclientcat($client);

        return view('client::date.datemain',[
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function datemain_get(Request $request)
    {
        $date = $request->input('var1');

        $cityf = $request->input('city');
        $ccf = $request->input('cc');
        $filter = array([]);
        $filter['city'] = $request->input('city');
        $filter['category'] = $request->input('cc');

        $getclientid = new Client;
        $getclientid = $getclientid->getclient(Auth::user()->id);

        foreach ($getclientid as $getclientid) {

            $client = $getclientid->client_id;
            
        }


        $getlead = new Customer;
        $records = $getlead->getbydate($client,$date, $filter);


        return view('client::date.leadbydate', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }

    public function daterange()
    {
        $getclientid = new Client;
        $getclientid = $getclientid->getclient(Auth::user()->id);

        foreach ($getclientid as $getclientid) {

            $client = $getclientid->client_id;
            
        }

        $cityM = new City;
        $clientM = new Client;
        $ccM = new Client_Category;
        $citiesf = $cityM->getcity();
        $clientsf = $clientM->getclients_view();
        $ccf = $ccM->getclientcat($client);

        return view('client::date.daterange',[
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function daterangereport(Request $request)
    {
        $date = $request->input('var1');
        $enddate = $request->input('var2');

        $cityf = $request->input('city');
        $ccf = $request->input('cc');
        $filter = array([]);
        $filter['city'] = $request->input('city');
        $filter['category'] = $request->input('cc');

        $getclientid = new Client;
        $getclientid = $getclientid->getclient(Auth::user()->id);

        foreach ($getclientid as $getclientid) {

            $client = $getclientid->client_id;
            
        }


        $getlead = new Customer;
        $records = $getlead->daterangereport($client,$date,$enddate, $filter);


        return view('client::date.daterangereport', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }


    public function timemain()
    {
        $getclientid = new Client;
        $getclientid = $getclientid->getclient(Auth::user()->id);

        foreach ($getclientid as $getclientid) {

            $client = $getclientid->client_id;
            
        }

        $cityM = new City;
        $clientM = new Client;
        $ccM = new Client_Category;
        $citiesf = $cityM->getcity();
        $clientsf = $clientM->getclients_view();
        $ccf = $ccM->getclientcat($client);

        return view('client::time.timemain',[
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function timerangereport(Request $request)
    {
        $date = $request->input('var1');
        $starttime = $request->input('var2');
        $endtime = $request->input('var3');

        $cityf = $request->input('city');
        $ccf = $request->input('cc');
        $filter = array([]);
        $filter['city'] = $request->input('city');
        $filter['category'] = $request->input('cc');

        $getclientid = new Client;
        $getclientid = $getclientid->getclient(Auth::user()->id);

        foreach ($getclientid as $getclientid) {

            $client = $getclientid->client_id;
            
        }


        $getlead = new Customer;
        $records = $getlead->timerangereport($client,$date,$starttime,$endtime, $filter);


        return view('client::time.timerangereport', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }

}
