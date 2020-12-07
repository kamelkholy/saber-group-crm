<?php

namespace Modules\Sales\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\User;
use App\Customer;
use App\Client;
use Auth;
use App\Customer_Action;
use URL;

class SalesController extends Controller
{
    public function saleshome()
    {
        $client =  Auth::user()->user_client;
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
        return view('sales::layouts.saleshome',[
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

        $date = date('Y-m-d');


        $getlead = new Customer;
        $records = $getlead->getlead_client(Auth::user()->user_client,$date);


        return view('sales::today.todayreport', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }

    //no actions
    //today reports
    public function noactions_today()
    {

        $status = 0;
        $date = date('Y-m-d');


        $getlead = new Customer;
        $records = $getlead->getlead_client_actions(Auth::user()->user_client,$date,$status);


        return view('sales::today.todayreport', [
            'data' => $records,
            'urls' => array(
                'action' => '/crm/sales/action'
            ),
        ]);
    }

    public function done_today()
    {

        $status = 1;
        $date = date('Y-m-d');


        $getlead = new Customer;
        $records = $getlead->getlead_client_actions(Auth::user()->user_client,$date,$status);


        return view('sales::today.todayreport', [
            'data' => $records,
            'urls' => array(
                'action' => '/crm/sales/action',
                'track' => '/crm/sales/getcustomertrack'
            ),
        ]);
    }

    public function onhold_today()
    {

        $status = 2;
        $date = date('Y-m-d');


        $getlead = new Customer;
        $records = $getlead->getlead_client_actions(Auth::user()->user_client,$date,$status);


        return view('sales::today.todayreport', [
            'data' => $records,
            'urls' => array(
                'action' => '/crm/sales/action',
                'track' => '/crm/sales/getcustomertrack'
            ),
        ]);
    }

    public function deal_today()
    {

        $status = 3;
        $date = date('Y-m-d');


        $getlead = new Customer;
        $records = $getlead->getlead_client_actions(Auth::user()->user_client,$date,$status);


        return view('sales::today.todayreport', [
            'data' => $records,
            'urls' => array(
                'track' => '/crm/sales/getcustomertrack'
            ),
        ]);
    }


    public function getcurrentmonth()
    {
      

        $month = date('m');

        $year = date('Y');


        $getlead = new Customer;
        $records = $getlead->getlead_client_month(Auth::user()->user_client,$month,$year);


        return view('sales::today.currentmonth', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }

    //month
    public function getcurrentmonth_noaction()
    {
      

        $month = date('m');

        $year = date('Y');
        $status = 0;


        $getlead = new Customer;
        $records = $getlead->getlead_client_month_actions(Auth::user()->user_client,$month,$year,$status);


        return view('sales::today.currentmonth', [
            'data' => $records,
            'urls' => array(
                 'action' => '/crm/sales/action'
            ),
        ]);
    }

    public function getcurrentmonth_done()
    {
      

        $month = date('m');

        $year = date('Y');
        $status = 1;


        $getlead = new Customer;
        $records = $getlead->getlead_client_month_actions(Auth::user()->user_client,$month,$year,$status);


        return view('sales::today.currentmonth', [
            'data' => $records,
            'urls' => array(
                 'action' => '/crm/sales/action',
                'track' => '/crm/sales/getcustomertrack'
            ),
        ]);
    }

    public function getcurrentmonth_onhold()
    {
      

        $month = date('m');

        $year = date('Y');
        $status = 2;


        $getlead = new Customer;
        $records = $getlead->getlead_client_month_actions(Auth::user()->user_client,$month,$year,$status);


        return view('sales::today.currentmonth', [
            'data' => $records,
            'urls' => array(
                 'action' => '/crm/sales/action',
                'track' => '/crm/sales/getcustomertrack'
            ),
        ]);
    }

    public function getcurrentmonth_deal()
    {
      

        $month = date('m');

        $year = date('Y');
        $status = 3;


        $getlead = new Customer;
        $records = $getlead->getlead_client_month_actions(Auth::user()->user_client,$month,$year,$status);


        return view('sales::today.currentmonth', [
            'data' => $records,
            'urls' => array(
                'track' => '/crm/sales/getcustomertrack'
            ),
        ]);
    }

    public function getcurrentyear()
    {
       
        $year = date('Y');


        $getlead = new Customer;
        $records = $getlead->getlead_client_year(Auth::user()->user_client,$year);


        return view('sales::today.currentyear', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }

    public function getcurrentyear_noaction()
    {
       
        $year = date('Y');
        $status = 0;


        $getlead = new Customer;
        $records = $getlead->getlead_client_year_action(Auth::user()->user_client,$year,$status);


        return view('sales::today.currentyear', [
            'data' => $records,
            'urls' => array(
                'action' => '/crm/sales/action'
            ),
        ]);
    }

    public function getcurrentyear_done()
    {
       
        $year = date('Y');
        $status = 1;


        $getlead = new Customer;
        $records = $getlead->getlead_client_year_action(Auth::user()->user_client,$year,$status);


        return view('sales::today.currentyear', [
            'data' => $records,
            'urls' => array(
                'action' => '/crm/sales/action',
                'track' => '/crm/sales/getcustomertrack'
            ),
        ]);
    }

    public function getcurrentyear_onhold()
    {
       
        $year = date('Y');
        $status = 2;


        $getlead = new Customer;
        $records = $getlead->getlead_client_year_action(Auth::user()->user_client,$year,$status);


        return view('sales::today.currentyear', [
            'data' => $records,
            'urls' => array(
                'action' => '/crm/sales/action',
                'track' => '/crm/sales/getcustomertrack'
            ),
        ]);
    }

    public function getcurrentyear_deal()
    {
       
        $year = date('Y');
        $status = 3;


        $getlead = new Customer;
        $records = $getlead->getlead_client_year_action(Auth::user()->user_client,$year,$status);


        return view('sales::today.currentyear', [
            'data' => $records,
            'urls' => array(
                'track' => '/crm/sales/getcustomertrack'
            ),
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
        $customer = $customer->changestatus($customer_id,$status);

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
        $customer = $customer->changestatus($customer_id,$status);

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
        $customer = $customer->changestatus($customer_id,$status);

        return back();
    }

     public function getcustomertrack($customer_id)
    {
       


        $getlead = new Customer_Action;
        $records = $getlead->gettrack($customer_id);


        return view('sales::track.gettrack', [
            'data' => $records,
            'urls' => array(
            ),
        ]);
    }


     //new update 
    public function action($customer_id)
    {
        return view('sales::track.action');
    }

    public function action_store(Request $request,$customer_id)
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
        $customer = $customer->changestatus($customer_id,$request->input('var1'));

        return back();
    }


}
