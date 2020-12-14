<?php

namespace Modules\Sales\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\User;
use App\Customer;
use App\City;
use App\Client;
use App\Client_Category;
use Auth;
use App\Customer_Action;
use URL;

class SalesController extends Controller
{
    public function filter(Request $request)
    {

        $input = $request->all();

        $input['city'] = $request->input('city');
        $input['client'] = $request->input('client');
        $input['cc'] = $request->input('cc');

        return redirect($request->query('back') . '?city=' . json_encode($input['city']) . '&client=' . json_encode($input['client']) . '&category=' . json_encode($input['cc']))->withInput($request->all());;
    }
    public function viewlead($customer_id)
    {
        $customer = new Customer;
        $customer = $customer->getcustomerupdate($customer_id);
        if (empty($customer)) {
            return redirect('/sales');
        }
        $client = new Client;
        $client = $client->getclients_view();
        $city = new City;
        $city = $city->getcity();
        return view('sales::lead.viewlead', [
            'customer' => $customer, 'city' => $city, 'client' => $client,
            'urls' => array(
                'action' => '/crm/sales/action',
            ),
        ]);
    }
    public function saleshome()
    {
        $client =  Auth::user()->user_client;
        $date = date('Y-m-d');
        $month = date('m');
        $year = date('Y');
        $today = Customer::where('customer_date', $date)->where('client_id', $client)->count('customer_date');
        $currmonth = Customer::where('customer_month', $month)
            ->where('customer_year', $year)->where('client_id', $client)->count('customer_month');
        $curryear = Customer::where('customer_year', $year)->where('client_id', $client)->count('customer_year');
        $allleads = Customer::where('client_id', $client)->count();
        $deals = Customer::where('customer_status', 3)->where('client_id', $client)->count('customer_status');
        $calls = Customer::where('customer_status', 1)->where('client_id', $client)->count('customer_status');
        $hold = Customer::where('customer_status', 2)->where('client_id', $client)->count('customer_status');
        $noaction = Customer::where('customer_status', 0)
            ->where('client_id', $client)->count('customer_status');
        $notifications = $this->notifications();

        return view('sales::layouts.saleshome', [
            'notifications' => $notifications,
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
    public function notifications()
    {
        return json_encode(Auth::user()->unreadNotifications()->get()->toArray());
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
        $clientsf = [];
        $ccf = NULL;
        $ccf = $ccM->getclientcat(Auth::user()->user_client);


        $getlead = new Customer;
        $records = $getlead->getlead_client(Auth::user()->user_client, $date, $filter);
        $notifications = $this->notifications();


        return view('sales::today.todayreport', [
            'data' => $records,
            'urls' => array(
                'filter' => '/sales/gettodayreport',
                'module' => '/sales',
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    //no actions
    //today reports
    public function noactions_today(Request $request)
    {

        $status = 0;
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
        $ccf = $ccM->getclientcat(Auth::user()->user_client);


        $getlead = new Customer;
        $records = $getlead->getlead_client_actions(Auth::user()->user_client, $date, $status, $filter);
        $notifications = $this->notifications();


        return view('sales::today.todayreport', [
            'data' => $records,
            'urls' => array(
                'action' => '/crm/sales/action',
                'back'  => '/sales/noactions_today',
                'filter' => '/sales/noactions_today',
                'module' => '/sales',
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function done_today(Request $request)
    {

        $status = 1;
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
        $ccf = $ccM->getclientcat(Auth::user()->user_client);


        $getlead = new Customer;
        $records = $getlead->getlead_client_actions(Auth::user()->user_client, $date, $status, $filter);
        $unique = array();
        $comments = array([]);
        foreach ($records as $key => $value) {
            if (array_key_exists($value->ID, $unique)) {
                array_push($comments[$value->ID], $value->Comment);
            } else {
                $comments[$value->ID] = array($value->Comment);
                unset($value->Comment);
                $unique[$value->ID] = $value;
            }
        }
        $notifications = $this->notifications();

        return view('sales::today.todayreport', [
            'data' => $unique,
            'comments' => $comments,
            'urls' => array(
                'action' => '/crm/sales/action',
                'track' => '/crm/sales/getcustomertrack',
                'back'  => '/sales/done_today',
                'filter' => '/sales/done_today',
                'module' => '/sales',
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function onhold_today(Request $request)
    {
        $status = 2;
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
        $ccf = $ccM->getclientcat(Auth::user()->user_client);


        $getlead = new Customer;
        $records = $getlead->getlead_client_actions(Auth::user()->user_client, $date, $status, $filter);
        $unique = array();
        $comments = array([]);
        foreach ($records as $key => $value) {
            if (array_key_exists($value->ID, $unique)) {
                array_push($comments[$value->ID], $value->Comment);
            } else {
                $comments[$value->ID] = array($value->Comment);
                unset($value->Comment);
                $unique[$value->ID] = $value;
            }
        }
        $notifications = $this->notifications();

        return view('sales::today.todayreport', [
            'data' => $unique,
            'comments' => $comments,
            'urls' => array(
                'action' => '/crm/sales/action',
                'track' => '/crm/sales/getcustomertrack',
                'back'  => '/sales/onhold_today',
                'filter' => '/sales/onhold_today',
                'module' => '/sales',
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function deal_today(Request $request)
    {

        $status = 3;
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
        $ccf = $ccM->getclientcat(Auth::user()->user_client);


        $getlead = new Customer;
        $records = $getlead->getlead_client_actions(Auth::user()->user_client, $date, $status, $filter);
        $unique = array();
        $comments = array([]);
        foreach ($records as $key => $value) {
            if (array_key_exists($value->ID, $unique)) {
                array_push($comments[$value->ID], $value->Comment);
            } else {
                $comments[$value->ID] = array($value->Comment);
                unset($value->Comment);
                $unique[$value->ID] = $value;
            }
        }
        $notifications = $this->notifications();

        return view('sales::today.todayreport', [
            'data' => $unique,
            'comments' => $comments,
            'urls' => array(
                'track' => '/crm/sales/getcustomertrack',
                'filter' => '/sales/deal_today',
                'module' => '/sales',
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
        $clientsf = [];
        $ccf = NULL;
        // if(isset(Auth::user()->user_client)){
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // } else {
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // }
        $ccf = $ccM->getclientcat(Auth::user()->user_client);

        $getlead = new Customer;
        $records = $getlead->getlead_client_month(Auth::user()->user_client, $month, $year, $filter);
        $notifications = $this->notifications();


        return view('sales::today.currentmonth', [
            'data' => $records,
            'urls' => array(
                'filter' => '/sales/getcurrentmonth',
                'module' => '/sales',
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    //month
    public function getcurrentmonth_noaction(Request $request)
    {


        $month = date('m');

        $year = date('Y');
        $status = 0;

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
        // if(isset(Auth::user()->user_client)){
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // } else {
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // }
        $ccf = $ccM->getclientcat(Auth::user()->user_client);

        $getlead = new Customer;
        $records = $getlead->getlead_client_month_actions(Auth::user()->user_client, $month, $year, $status, $filter);
        $notifications = $this->notifications();


        return view('sales::today.currentmonth', [
            'data' => $records,
            'urls' => array(
                'action' => '/crm/sales/action',
                'back'  => '/sales/getcurrentmonth_noaction',
                'filter' => '/sales/getcurrentmonth_noaction',
                'module' => '/sales',
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function getcurrentmonth_done(Request $request)
    {


        $month = date('m');

        $year = date('Y');
        $status = 1;

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
        // if(isset(Auth::user()->user_client)){
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // } else {
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // }
        $ccf = $ccM->getclientcat(Auth::user()->user_client);

        $getlead = new Customer;
        $records = $getlead->getlead_client_month_actions(Auth::user()->user_client, $month, $year, $status, $filter);
        $unique = array();
        $comments = array([]);
        foreach ($records as $key => $value) {
            if (array_key_exists($value->ID, $unique)) {
                array_push($comments[$value->ID], $value->Comment);
            } else {
                $comments[$value->ID] = array($value->Comment);
                unset($value->Comment);
                $unique[$value->ID] = $value;
            }
        }
        $notifications = $this->notifications();

        return view('sales::today.currentmonth', [
            'data' => $unique,
            'comments' => $comments,
            'urls' => array(
                'action' => '/crm/sales/action',
                'track' => '/crm/sales/getcustomertrack',
                'back'  => '/sales/getcurrentmonth_done',
                'filter' => '/sales/getcurrentmonth_done',
                'module' => '/sales',
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function getcurrentmonth_onhold(Request $request)
    {


        $month = date('m');

        $year = date('Y');
        $status = 2;

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
        // if(isset(Auth::user()->user_client)){
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // } else {
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // }
        $ccf = $ccM->getclientcat(Auth::user()->user_client);

        $getlead = new Customer;
        $records = $getlead->getlead_client_month_actions(Auth::user()->user_client, $month, $year, $status, $filter);
        $unique = array();
        $comments = array([]);
        foreach ($records as $key => $value) {
            if (array_key_exists($value->ID, $unique)) {
                array_push($comments[$value->ID], $value->Comment);
            } else {
                $comments[$value->ID] = array($value->Comment);
                unset($value->Comment);
                $unique[$value->ID] = $value;
            }
        }
        $notifications = $this->notifications();

        return view('sales::today.currentmonth', [
            'data' => $unique,
            'comments' => $comments,
            'urls' => array(
                'action' => '/crm/sales/action',
                'track' => '/crm/sales/getcustomertrack',
                'back'  => '/sales/getcurrentmonth_onhold',
                'filter' => '/sales/getcurrentmonth_onhold',
                'module' => '/sales',
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function getcurrentmonth_deal(Request $request)
    {


        $month = date('m');

        $year = date('Y');
        $status = 3;

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
        // if(isset(Auth::user()->user_client)){
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // } else {
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // }
        $ccf = $ccM->getclientcat(Auth::user()->user_client);

        $getlead = new Customer;
        $records = $getlead->getlead_client_month_actions(Auth::user()->user_client, $month, $year, $status, $filter);
        $unique = array();
        $comments = array([]);
        foreach ($records as $key => $value) {
            if (array_key_exists($value->ID, $unique)) {
                array_push($comments[$value->ID], $value->Comment);
            } else {
                $comments[$value->ID] = array($value->Comment);
                unset($value->Comment);
                $unique[$value->ID] = $value;
            }
        }
        $notifications = $this->notifications();

        return view('sales::today.currentmonth', [
            'data' => $unique,
            'comments' => $comments,
            'urls' => array(
                'track' => '/crm/sales/getcustomertrack',
                'filter' => '/sales/getcurrentmonth_deal',
                'module' => '/sales',
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
        $clientsf = [];
        $ccf = NULL;
        // if(isset(Auth::user()->user_client)){
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // } else {
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // }
        $ccf = $ccM->getclientcat(Auth::user()->user_client);

        $getlead = new Customer;
        $records = $getlead->getlead_client_year(Auth::user()->user_client, $year, $filter);
        $notifications = $this->notifications();


        return view('sales::today.currentyear', [
            'data' => $records,
            'urls' => array(
                'filter' => '/sales/getcurrentyear',
                'module' => '/sales',
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function getcurrentyear_noaction(Request $request)
    {

        $year = date('Y');
        $status = 0;

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
        // if(isset(Auth::user()->user_client)){
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // } else {
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // }
        $ccf = $ccM->getclientcat(Auth::user()->user_client);

        $getlead = new Customer;
        $records = $getlead->getlead_client_year_action(Auth::user()->user_client, $year, $status, $filter);
        $notifications = $this->notifications();


        return view('sales::today.currentyear', [
            'data' => $records,
            'urls' => array(
                'action' => '/crm/sales/action',
                'back'  => '/sales/getcurrentyear_noaction',
                'filter' => '/sales/getcurrentyear_noaction',
                'module' => '/sales',
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function getcurrentyear_done(Request $request)
    {

        $year = date('Y');
        $status = 1;

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
        // if(isset(Auth::user()->user_client)){
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // } else {
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // }
        $ccf = $ccM->getclientcat(Auth::user()->user_client);

        $getlead = new Customer;
        $records = $getlead->getlead_client_year_action(Auth::user()->user_client, $year, $status, $filter);
        $unique = array();
        $comments = array([]);
        foreach ($records as $key => $value) {
            if (array_key_exists($value->ID, $unique)) {
                array_push($comments[$value->ID], $value->Comment);
            } else {
                $comments[$value->ID] = array($value->Comment);
                unset($value->Comment);
                $unique[$value->ID] = $value;
            }
        }
        $notifications = $this->notifications();

        return view('sales::today.currentyear', [
            'data' => $unique,
            'comments' => $comments,
            'urls' => array(
                'action' => '/crm/sales/action',
                'track' => '/crm/sales/getcustomertrack',
                'back'  => '/sales/getcurrentyear_done',
                'filter' => '/sales/getcurrentyear_done',
                'module' => '/sales',
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function getcurrentyear_onhold(Request $request)
    {

        $year = date('Y');
        $status = 2;

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
        // if(isset(Auth::user()->user_client)){
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // } else {
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // }
        $ccf = $ccM->getclientcat(Auth::user()->user_client);

        $getlead = new Customer;
        $records = $getlead->getlead_client_year_action(Auth::user()->user_client, $year, $status, $filter);
        $unique = array();
        $comments = array([]);
        foreach ($records as $key => $value) {
            if (array_key_exists($value->ID, $unique)) {
                array_push($comments[$value->ID], $value->Comment);
            } else {
                $comments[$value->ID] = array($value->Comment);
                unset($value->Comment);
                $unique[$value->ID] = $value;
            }
        }
        $notifications = $this->notifications();

        return view('sales::today.currentyear', [
            'data' => $unique,
            'comments' => $comments,
            'urls' => array(
                'action' => '/crm/sales/action',
                'track' => '/crm/sales/getcustomertrack',
                'back'  => '/sales/getcurrentyear_onhold',
                'filter' => '/sales/getcurrentyear_onhold',
                'module' => '/sales',
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }

    public function getcurrentyear_deal(Request $request)
    {

        $year = date('Y');
        $status = 3;

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
        // if(isset(Auth::user()->user_client)){
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // } else {
        //     $ccf = $ccM->getclientcat(Auth::user()->user_client);
        // }
        $ccf = $ccM->getclientcat(Auth::user()->user_client);

        $getlead = new Customer;
        $records = $getlead->getlead_client_year_action(Auth::user()->user_client, $year, $status, $filter);
        $unique = array();
        $comments = array([]);
        foreach ($records as $key => $value) {
            if (array_key_exists($value->ID, $unique)) {
                array_push($comments[$value->ID], $value->Comment);
            } else {
                $comments[$value->ID] = array($value->Comment);
                unset($value->Comment);
                $unique[$value->ID] = $value;
            }
        }
        $notifications = $this->notifications();

        return view('sales::today.currentyear', [
            'data' => $unique,
            'comments' => $comments,
            'urls' => array(
                'track' => '/crm/sales/getcustomertrack',
                'filter' => '/sales/getcurrentyear_deal',
                'module' => '/sales',
            ),
            'citiesf' => $citiesf,
            'clientsf' => $clientsf,
            'ccf' => $ccf,
        ]);
    }


    //call on action 
    //on hold
    public function onhold($customer_id)
    {
        $status = 2;

        $action = new Customer_Action;
        $action->user_id = Auth::user()->id;
        $action->action = 2;
        $action->customer_id = $customer_id;
        $action->action_date = date('Y-m-d');
        $action->action_time = date('H:i:s');
        $action->save();

        $customer = new Customer;
        $customer = $customer->changestatus($customer_id, $status);

        return back();
    }

    public function call($customer_id)
    {
        $status = 1;

        $action = new Customer_Action;
        $action->user_id = Auth::user()->id;
        $action->action = 1;
        $action->customer_id = $customer_id;
        $action->action_date = date('Y-m-d');
        $action->action_time = date('H:i:s');
        $action->save();

        $customer = new Customer;
        $customer = $customer->changestatus($customer_id, $status);

        return back();
    }

    public function deal($customer_id)
    {
        $status = 3;

        $action = new Customer_Action;
        $action->user_id = Auth::user()->id;
        $action->action = 3;
        $action->customer_id = $customer_id;
        $action->action_date = date('Y-m-d');
        $action->action_time = date('H:i:s');
        $action->save();

        $customer = new Customer;
        $customer = $customer->changestatus($customer_id, $status);

        return back();
    }

    public function getcustomertrack($customer_id)
    {



        $getlead = new Customer_Action;
        $records = $getlead->gettrack($customer_id);
        $notifications = $this->notifications();


        return view('sales::track.gettrack', [
            'data' => $records,
            'urls' => array(),
        ]);
    }


    //new update 
    public function action(Request $request)
    {
        // if ($request->session->has('backUrl')) {
        //     $request->session->keep('backUrl');
        // }
        $notifications = $this->notifications();

        return view('sales::track.action');
    }

    public function action_store(Request $request, $customer_id)
    {
        $action = new Customer_Action;
        $action->user_id = Auth::user()->id;
        $action->action = $request->input('var1');
        $action->action_comment = $request->input('var2');
        $action->customer_id = $customer_id;
        $action->action_date = date('Y-m-d');
        $action->action_time = date('H:i:s');
        $action->save();

        $customer = new Customer;
        $customer = $customer->changestatus($customer_id, $request->input('var1'));

        return redirect($request->query('back'));
    }
}
