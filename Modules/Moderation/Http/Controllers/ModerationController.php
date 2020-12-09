<?php

namespace Modules\Moderation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;



use App\Client;
use App\Customer;
use App\Shift;
use App\User;
use App\City;
use App\Client_Category;
use App\Customer_Action;
use Auth;
use Twilio\Rest\Client as TwilioClient;
class ModerationController extends Controller
{

    // public function sendMsg()
    // {
    //     $keySid = 'SKbb84ab7444cc3fbe1300e1dd2290a40a';
    //     $keySecret = 'FgO2mCewrfsDzlkuVd660FQNTrTJcxE6';
    //     $accountSid = 'AC483f749c339374f304fea796c9a4cded';
    //     $client = new TwilioClient($keySid, $keySecret, $accountSid);
    //     $message = $client->messages->create(
    //     '+20 111 365 3665', // Text this number
    //     [
    //         'from' => '+14235887285', // From a valid Twilio number
    //         'body' => 'Hello from Twilio!'
    //     ]
    //     );

    //     echo $message->sid;
    // }
    public function home()
    {
        $date = date('Y-m-d');
        $month = date('m');
        $year = date('Y');
        $today = Customer::where('customer_date',$date)->count('customer_date');
        $currmonth = Customer::where('customer_month',$month)->where('customer_year',$year)->count('customer_month');
        $curryear = Customer::where('customer_year',$year)->count('customer_year');
        $allleads = Customer::count();
        $deals = Customer::where('customer_status',3)->count('customer_status');
        $calls = Customer::where('customer_status',1)->count('customer_status');
        $hold = Customer::where('customer_status',2)->count('customer_status');
        $noaction = Customer::where('customer_status',0)->count('customer_status');
        $clients = User::where('user_type',2)->count('user_type');
        $mod = User::where('user_type',3)->count('user_type');
        $sales = User::where('user_type',4)->count('user_type');
        $admin = User::where('user_type',1)->count('user_type');
        return view('moderation::layouts.homemoderation',[
            'allleads' => $allleads,
            'currmonth' => $currmonth,
            'curryear' => $curryear,
            'today' => $today,
            'deals' => $deals,
            'calls' => $calls,
            'hold' => $hold,
            'noaction' => $noaction,
            'clients' => $clients,
            'mod' => $mod,
            'sales' => $sales,
            'admin' => $admin

        ]);
    }

    public function addnewlead()
    {
        $client = new Client;
        $client = $client->getclients_view();
        $city = new City;
        $city = $city->getcity();
        return view('moderation::lead.addnewlead',['client' => $client,'city' => $city]);
    }

    public function addnewlead_store(Request $request)
    {

        $lead = new Customer;
        $lead->customer_name = $request->input('var1');
        $lead->customer_phone = $request->input('var2');
        $lead->client_id = $request->input('var3');
        if($request->input('var4') != null){
            $lead->customer_message = $request->input('var4');
        }
        $lead->customer_city = $request->input('var5');
        $lead->customer_date = date('Y-m-d');
        $lead->customer_day = date('d');
        $lead->customer_month = date('m');
        $lead->customer_year = date('Y');
        $lead->customer_time = date('H:i:s');
        $lead->customer_am_pm = date('A');
        if($request->file('var6') != null){
            $file = $request->file('var6');
            $stored = Storage::putFileAs('public/files', $file, $file->getClientOriginalName());
            $stored = str_replace ( 'public/', '', $stored); 
            $lead->customer_file = $stored;
        }
        $lead->user_id = Auth::user()->id;
        $lead->client_category = $request->input('var7');
        $lead->email = $request->input('var8');
        $lead->save();


        return redirect()->back()
        ->with('success','Lead Added Successfully !');

    }


     //today reports
    public function gettodayreport(Request $request)
    {   
        $date = date('Y-m-d');

        $filter = array([]);
        $filter['city'] = json_decode($request->query('city'));
        $filter['client'] = json_decode($request->query('client'));
        $filter['category'] = json_decode($request->query('category'));
        $cityM = new City;
        $clientM = new Client;
        $ccM = new Client_Category;
        $citiesf = $cityM->getcity();
        $clientsf = $clientM->getclients_view();
        $ccf = NULL;
        // if(isset(Auth::user()->user_client)){
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // } else {
        //     $ccf = $ccM->getcat();
        // }
        $ccf = $ccM->getcat();

        $getlead = new Customer;
        $records = $getlead->getlead_client_admin($date, $filter);

        return view('moderation::today.todayreport', [
            'data' => $records,
            'urls' => array(
                'filter' => '/moderation/gettodayreport',
                'module' => '/moderation',
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function getcurrentmonth(Request $request)
    {

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
        $clientsf = $clientM->getclients_view();
        $ccf = NULL;
        // if(isset(Auth::user()->user_client)){
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // } else {
        //     $ccf = $ccM->getcat();
        // }
        $ccf = $ccM->getcat();

        $getlead = new Customer;
        $records = $getlead->getlead_client_month_admin($month,$year, $filter);


        return view('moderation::today.currentmonth', [
            'data' => $records,
            'urls' => array(
                'filter' => '/moderation/getcurrentmonth',
                'module' => '/moderation',
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function getcurrentyear(Request $request)
    {
        $year = date('Y');

        $filter = array([]);
        $filter['city'] = json_decode($request->query('city'));
        $filter['client'] = json_decode($request->query('client'));
        $filter['category'] = json_decode($request->query('category'));
        $cityM = new City;
        $clientM = new Client;
        $ccM = new Client_Category;
        $citiesf = $cityM->getcity();
        $clientsf = $clientM->getclients_view();
        $ccf = NULL;
        // if(isset(Auth::user()->user_client)){
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // } else {
        //     $ccf = $ccM->getcat();
        // }
        $ccf = $ccM->getcat();

        $getlead = new Customer;
        $records = $getlead->getlead_client_year_admin($year, $filter);


        return view('moderation::today.currentyear', [
            'data' => $records,
            'urls' => array(
                'filter' => '/moderation/getcurrentyear',
                'module' => '/moderation',
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function allleads(Request $request)
    {
        $filter = array([]);
        $filter['city'] = json_decode($request->query('city'));
        $filter['client'] = json_decode($request->query('client'));
        $filter['category'] = json_decode($request->query('category'));
        $cityM = new City;
        $clientM = new Client;
        $ccM = new Client_Category;
        $citiesf = $cityM->getcity();
        $clientsf = $clientM->getclients_view();
        $ccf = NULL;
        // if(isset(Auth::user()->user_client)){
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // } else {
        //     $ccf = $ccM->getcat();
        // }
        $ccf = $ccM->getcat();

        $getlead = new Customer;
        $records = $getlead->getlead_client_all_admin($filter);


        return view('moderation::today.allleads', [
            'data' => $records,
            'urls' => array(
                'filter' => '/moderation/allleads',
                'module' => '/moderation',
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function manageleads(Request $request)
    {
        
        $filter = array([]);
        $filter['city'] = json_decode($request->query('city'));
        $filter['client'] = json_decode($request->query('client'));
        $filter['category'] = json_decode($request->query('category'));
        $cityM = new City;
        $clientM = new Client;
        $ccM = new Client_Category;
        $citiesf = $cityM->getcity();
        $clientsf = $clientM->getclients_view();
        $ccf = NULL;
        // if(isset(Auth::user()->user_client)){
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // } else {
        //     $ccf = $ccM->getcat();
        // }
        $ccf = $ccM->getcat();

        $getlead = new Customer;
        $records = $getlead->getlead_client_all_admin_manage($filter);
        
        return view('moderation::today.allleads', [
            'data' => $records,
            'urls' => array(
                'filter' => '/moderation/manageleads',
                'module' => '/moderation',
                'update' => '/crm/moderation/updatelead',
                'delete' => '/crm/moderation/deletecustomer'
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }
    public function filter(Request $request)
    {

        $input = $request->all();

        $input['city'] = $request->input('city');
        $input['client'] = $request->input('client');
        $input['cc'] = $request->input('cc');

        return redirect($request->query('back').'?city='.json_encode($input['city']).'&client='.json_encode($input['client']).'&category='.json_encode($input['cc']))->withInput($request->all());;
    }

    //delete 
    public function deletecustomer($customer_id)
    {
        $customer = new Customer;
        $customer = $customer->deletecustomer($customer_id);

        $action = new Customer_Action;
        $action = $action->deletecustomer($customer_id);

        return redirect()->back()
        ->with('success','Customer Deleted Successfully !');


    }

    public function updatelead($customer_id)
    {
        $customer = new Customer;
        $customer = $customer->getcustomerupdate($customer_id);
        $client = new Client;
        $client = $client->getclients_view();
        $city = new City;
        $city = $city->getcity();
        return view('moderation::lead.updatelead',['customer' => $customer,'city' => $city,'client' => $client]);
    }


    public function updatelead_store(Request $request,$customer_id)
    {
        $customer = new Customer;
        $customer = $customer->updatelead($request,$customer_id);
        return back();
    }

//Dynamic
    //get month Report
    public function monthlyreport_main()
    {
        $client = new Client;
        $client = $client->getallclients();

        $cityM = new City;
        $clientM = new Client;
        $ccM = new Client_Category;
        $citiesf = $cityM->getcity();
        $clientsf = $clientM->getclients_view();
        $ccf = $ccM->getcat();


        return view('moderation::monthly.monthlymain',[
            'client' => $client,
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function getmonrhlyreport(Request $request)
    {
        $month = $request->input('var1');
        $year = $request->input('var2');
        $client = $request->input('var0');
        
        $cityf = $request->input('city');
        $ccf = $request->input('cc');
        $filter = array([]);
        $filter['city'] = $request->input('city');
        $filter['category'] = $request->input('cc');

        $getlead = new Customer;
        $records = $getlead->getleadmonthlyreport($client,$month,$year, $filter);
        return view('moderation::monthly.monthlyreport', [
            'data' => $records,
            'urls' => array(
            ),

        ]);
    }


    public function datemain()
    {
        $client = new Client;
        $client = $client->getallclients();

        $cityM = new City;
        $clientM = new Client;
        $ccM = new Client_Category;
        $citiesf = $cityM->getcity();
        $clientsf = $clientM->getclients_view();
        $ccf = $ccM->getcat();

        return view('moderation::date.datemain',[
            'client' => $client,
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function datemain_get(Request $request)
    {
        $date = $request->input('var1');
        $client = $request->input('var0');

        $cityf = $request->input('city');
        $ccf = $request->input('cc');
        $filter = array([]);
        $filter['city'] = $request->input('city');
        $filter['category'] = $request->input('cc');

        $getlead = new Customer;
        $records = $getlead->getbydate($client,$date, $filter);

        return view('moderation::date.leadbydate', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }

    public function daterange()
    {
        $client = new Client;
        $client = $client->getallclients();

        $cityM = new City;
        $clientM = new Client;
        $ccM = new Client_Category;
        $citiesf = $cityM->getcity();
        $clientsf = $clientM->getclients_view();
        $ccf = $ccM->getcat();

        return view('moderation::date.daterange',[
            'client' => $client,
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function daterangereport(Request $request)
    {
        $date = $request->input('var1');
        $enddate = $request->input('var2');
        $client = $request->input('var0');

        $cityf = $request->input('city');
        $ccf = $request->input('cc');
        $filter = array([]);
        $filter['city'] = $request->input('city');
        $filter['category'] = $request->input('cc');

        $getlead = new Customer;
        $records = $getlead->daterangereport($client,$date,$enddate, $filter);


        return view('moderation::date.daterangereport', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }

    public function timemain()
    {
        $client = new Client;
        $client = $client->getallclients();

        $cityM = new City;
        $clientM = new Client;
        $ccM = new Client_Category;
        $citiesf = $cityM->getcity();
        $clientsf = $clientM->getclients_view();
        $ccf = $ccM->getcat();
        
        return view('moderation::time.timemain',[
            'client' => $client,
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
        $client = $request->input('var0');

        $cityf = $request->input('city');
        $ccf = $request->input('cc');
        $filter = array([]);
        $filter['city'] = $request->input('city');
        $filter['category'] = $request->input('cc');

        $getlead = new Customer;
        $records = $getlead->timerangereport($client,$date,$starttime,$endtime, $filter);


        return view('moderation::time.timerangereport', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }

//Shift 
    public function normalshiftper()
    {
        $client = new Client;
        $client = $client->getallclients();
        return view('moderation::shifts.normalshiftper',['client' => $client]);
    }

    public function normalshiftperreport(Request $request)
    {
        $date = $request->input('var1');
        $starttime = $request->input('var2');
        $endtime = $request->input('var3');
        $client = $request->input('var0');
        $user = Auth::user()->id;


        $getlead = new Customer;
        $records = $getlead->normalshift($client,$date,$starttime,$endtime,$user);


        return view('moderation::shifts.normalshiftperreport', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }

    public function nightshiftper()
    {
        $client = new Client;
        $client = $client->getallclients();
        return view('moderation::shifts.nightshiftper',['client' => $client]);
    }

    public function nightshiftperreport(Request $request)
    {
        $date = $request->input('var1');
        $enddate = $request->input('var2');
        $starttime = $request->input('var3');
        $endtime = $request->input('var4');
        $client = $request->input('var0');
        $user = Auth::user()->id;


        $getlead = new Customer;
        $records = $getlead->nightshift($client,$date,$enddate,$starttime,$endtime,$user);


        return view('moderation::shifts.nightshiftperreport', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }

//all clients 
    public function normalallclients()
    {
        return view('moderation::shifts.normalallclients');
    }

    public function normalallclientsreport(Request $request)
    {
        $date = $request->input('var1');
        $starttime = $request->input('var2');
        $endtime = $request->input('var3');
        $user = Auth::user()->id;


        $getlead = new Customer;
        $records = $getlead->normalallclientsreport($date,$starttime,$endtime,$user);


        return view('moderation::shifts.normalallclientsreport', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }

    public function nightallclients()
    {
        return view('moderation::shifts.nightallclients');
    }

    public function nightallclientsreport(Request $request)
    {
        $date = $request->input('var1');
        $enddate = $request->input('var2');
        $starttime = $request->input('var3');
        $endtime = $request->input('var4');
        $user = Auth::user()->id;


        $getlead = new Customer;
        $records = $getlead->nightallclientsreport($date,$enddate,$starttime,$endtime,$user);


        return view('moderation::shifts.nightallclientsreport', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }

    //cities functions

    public function addnewcity()
    {
        return view('moderation::city.addnewcity');
    }

    public function addnewcity_store(Request $request)
    {
        $city = new City;
        $city->city_name = $request->input('var1');
        $city->save();

        return redirect()->back()
        ->with('success','City Added Successfully !');
    }

     public function citylist()
    {

        $city = new City;
        $records = $city->citylist();


        return view('moderation::city.citylist', [
            'data' => $records,
            'urls' => array(
                'delete' => '/crm/moderation/deletecity'
            ),
        ]);
    }

    public function deletecity($city_id)
    {
        $city = new City;
        $city = $city->deletecity($city_id);

        return redirect()->back()
        ->with('success','City Deleted Successfully !');

    }


    //client category 
    public function addnewclientcat()
    {
        $client = new Client;
        $client = $client->getclients_view();

        return view('moderation::clientcat.addnewcat',['client' => $client]);
    }


    public function addnewcat_store(Request $request)
    {
        $cat = new Client_Category;
        $cat->client_categories_name = $request->input('var1');
        $cat->client_id = $request->input('var2');
        $cat->save();

        return redirect()->back()
        ->with('success','Client Category Added Successfully !');
    }


    public function catlist()
    {

        $cat = new Client_Category;
        $records = $cat->catlist();


        return view('moderation::clientcat.catlist', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }

    public function getclientcat($cat_id)
    {
        $cat = new Client_Category;
        $cat = $cat->getclientcat($cat_id);
        return json_encode($cat, 1);

    }


    public function checknumber_lead($number)
    {
        $lead = new Customer;
        $lead = $lead->getcutomerbynumber($number);
        return json_encode($lead, 1);
    }



}
