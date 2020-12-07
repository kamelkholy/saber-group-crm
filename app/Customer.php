<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Customer extends Model
{
    public $table = "customers";
    protected $primaryKey = 'customer_id';	

    protected $fillable = 
    ['var0','var1','var2','var3','var4','var5','var6','var7','var8','var9','var10','var11',];


    public function getlead_client($client_id,$date_now)
    {
    	$customers = DB::select('

    		SELECT 
    			customers.customer_name AS "Name",
    			customers.customer_phone AS "Mobile",
    			cities.city_name AS "City",
    			customers.customer_date AS "Date",
    			customers.customer_time AS "Time",
                customers.customer_am_pm AS "AM/PM",
                clients.client_name AS "Client",
                client_categories.client_categories_name AS "Category",
                customers.customer_message AS "Message",
            CASE 
                WHEN customers.customer_file IS NULL THEN "N/A"
                WHEN customers.customer_file = "null" THEN "N/A"
                WHEN customers.customer_file IS NOT NULL THEN customers.customer_file
            END AS "File",
    			users.name AS "Moderation",
            CASE
                WHEN customers.customer_status = 0 THEN "No.Action" 
                WHEN customers.customer_status = 1 THEN "Done"
                WHEN customers.customer_status = 2 THEN "On Hold"
                WHEN customers.customer_status = 3 THEN "Deal" 
            END AS "Status"  
    		FROM customers
    		JOIN users ON users.id = customers.user_id
            JOIN cities ON cities.city_id = customers.customer_city
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN clients ON clients.client_id = customers.client_id
    		WHERE customers.client_id = :client_id AND customers.customer_date = :date_now
    		',['client_id' => $client_id,'date_now' => $date_now]);


    	return $customers;
    }

    public function getlead_client_month($client_id,$month,$year)
    {
    	$customers = DB::select('

    		SELECT 
                customers.customer_name AS "Name",
                customers.customer_phone AS "Mobile",
                cities.city_name AS "City",
                customers.customer_date AS "Date",
                customers.customer_time AS "Time",
                customers.customer_am_pm AS "AM/PM",
                clients.client_name AS "Client",
                client_categories.client_categories_name AS "Category",
                customers.customer_message AS "Message",
            CASE 
                WHEN customers.customer_file IS NULL THEN "N/A"
                WHEN customers.customer_file = "null" THEN "N/A"
                WHEN customers.customer_file IS NOT NULL THEN customers.customer_file
            END AS "File",
                users.name AS "Moderation",
            CASE
                WHEN customers.customer_status = 0 THEN "No.Action" 
                WHEN customers.customer_status = 1 THEN "Done"
                WHEN customers.customer_status = 2 THEN "On Hold"
                WHEN customers.customer_status = 3 THEN "Deal" 
            END AS "Status"  
            FROM customers
            JOIN users ON users.id = customers.user_id
            JOIN cities ON cities.city_id = customers.customer_city
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN clients ON clients.client_id = customers.client_id
    		WHERE customers.client_id = :client_id AND customers.customer_month = :month AND customers.customer_year = :year
    		',['client_id' => $client_id,'month' => $month,'year' => $year]);


    	return $customers;
    }

    public function getlead_client_year($client_id,$year)
    {
    	$customers = DB::select('

    		SELECT 
                customers.customer_name AS "Name",
                customers.customer_phone AS "Mobile",
                cities.city_name AS "City",
                customers.customer_date AS "Date",
                customers.customer_time AS "Time",
                customers.customer_am_pm AS "AM/PM",
                clients.client_name AS "Client",
                client_categories.client_categories_name AS "Category",
                customers.customer_message AS "Message",
            CASE 
                WHEN customers.customer_file IS NULL THEN "N/A"
                WHEN customers.customer_file = "null" THEN "N/A"
                WHEN customers.customer_file IS NOT NULL THEN customers.customer_file
            END AS "File",
                users.name AS "Moderation",
            CASE
                WHEN customers.customer_status = 0 THEN "No.Action" 
                WHEN customers.customer_status = 1 THEN "Done"
                WHEN customers.customer_status = 2 THEN "On Hold"
                WHEN customers.customer_status = 3 THEN "Deal" 
            END AS "Status"  
            FROM customers
            JOIN users ON users.id = customers.user_id
            JOIN cities ON cities.city_id = customers.customer_city
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN clients ON clients.client_id = customers.client_id
    		WHERE customers.client_id = :client_id AND customers.customer_year = :year
    		',['client_id' => $client_id,'year' => $year]);


    	return $customers;
    }

    public function getlead_client_all($client_id)
    {
    	$customers = DB::select('

    		SELECT 
                customers.customer_name AS "Name",
                customers.customer_phone AS "Mobile",
                cities.city_name AS "City",
                customers.customer_date AS "Date",
                customers.customer_time AS "Time",
                customers.customer_am_pm AS "AM/PM",
                clients.client_name AS "Client",
                client_categories.client_categories_name AS "Category",
                customers.customer_message AS "Message",
            CASE 
                WHEN customers.customer_file IS NULL THEN "N/A"
                WHEN customers.customer_file = "null" THEN "N/A"
                WHEN customers.customer_file IS NOT NULL THEN customers.customer_file
            END AS "File",
                users.name AS "Moderation",
            CASE
                WHEN customers.customer_status = 0 THEN "No.Action" 
                WHEN customers.customer_status = 1 THEN "Done"
                WHEN customers.customer_status = 2 THEN "On Hold"
                WHEN customers.customer_status = 3 THEN "Deal" 
            END AS "Status"  
            FROM customers
            JOIN users ON users.id = customers.user_id
            JOIN cities ON cities.city_id = customers.customer_city
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN clients ON clients.client_id = customers.client_id
    		WHERE customers.client_id = :client_id
    		',['client_id' => $client_id]);


    	return $customers;
    }



    public function getleadmonthlyreport($client_id,$month,$year)
    {
    	$customers = DB::select('

    		SELECT 
                customers.customer_name AS "Name",
                customers.customer_phone AS "Mobile",
                cities.city_name AS "City",
                customers.customer_date AS "Date",
                customers.customer_time AS "Time",
                customers.customer_am_pm AS "AM/PM",
                clients.client_name AS "Client",
                client_categories.client_categories_name AS "Category",
                customers.customer_message AS "Message",
            CASE 
                WHEN customers.customer_file IS NULL THEN "N/A"
                WHEN customers.customer_file = "null" THEN "N/A"
                WHEN customers.customer_file IS NOT NULL THEN customers.customer_file
            END AS "File",
                users.name AS "Moderation",
            CASE
                WHEN customers.customer_status = 0 THEN "No.Action" 
                WHEN customers.customer_status = 1 THEN "Done"
                WHEN customers.customer_status = 2 THEN "On Hold"
                WHEN customers.customer_status = 3 THEN "Deal" 
            END AS "Status"  
            FROM customers
            JOIN users ON users.id = customers.user_id
            JOIN cities ON cities.city_id = customers.customer_city
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN clients ON clients.client_id = customers.client_id
    		WHERE customers.client_id = :client_id AND customers.customer_month = :month AND customers.customer_year =  :year
    		',['client_id' => $client_id,'month' => $month,'year' => $year]);


    	return $customers;
    }

    public function getbydate($client_id,$date_val)
    {
        $customers = DB::select('

            SELECT 
                customers.customer_name AS "Name",
                customers.customer_phone AS "Mobile",
                cities.city_name AS "City",
                customers.customer_date AS "Date",
                customers.customer_time AS "Time",
                customers.customer_am_pm AS "AM/PM",
                clients.client_name AS "Client",
                client_categories.client_categories_name AS "Category",
                customers.customer_message AS "Message",
            CASE 
                WHEN customers.customer_file IS NULL THEN "N/A"
                WHEN customers.customer_file = "null" THEN "N/A"
                WHEN customers.customer_file IS NOT NULL THEN customers.customer_file
            END AS "File",
                users.name AS "Moderation",
            CASE
                WHEN customers.customer_status = 0 THEN "No.Action" 
                WHEN customers.customer_status = 1 THEN "Done"
                WHEN customers.customer_status = 2 THEN "On Hold"
                WHEN customers.customer_status = 3 THEN "Deal" 
            END AS "Status"  
            FROM customers
            JOIN users ON users.id = customers.user_id
            JOIN cities ON cities.city_id = customers.customer_city
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN clients ON clients.client_id = customers.client_id
            WHERE customers.client_id = :client_id AND customers.customer_date = :date_val 
            ',['client_id' => $client_id,'date_val' => $date_val]);


        return $customers;
    }


    public function daterangereport($client_id,$date_val,$date_end)
    {
        $customers = DB::select('

            SELECT 
                customers.customer_name AS "Name",
                customers.customer_phone AS "Mobile",
                cities.city_name AS "City",
                customers.customer_date AS "Date",
                customers.customer_time AS "Time",
                customers.customer_am_pm AS "AM/PM",
                clients.client_name AS "Client",
                client_categories.client_categories_name AS "Category",
                customers.customer_message AS "Message",
            CASE 
                WHEN customers.customer_file IS NULL THEN "N/A"
                WHEN customers.customer_file = "null" THEN "N/A"
                WHEN customers.customer_file IS NOT NULL THEN customers.customer_file
            END AS "File",
                users.name AS "Moderation",
            CASE
                WHEN customers.customer_status = 0 THEN "No.Action" 
                WHEN customers.customer_status = 1 THEN "Done"
                WHEN customers.customer_status = 2 THEN "On Hold"
                WHEN customers.customer_status = 3 THEN "Deal" 
            END AS "Status"  
            FROM customers
            JOIN users ON users.id = customers.user_id
            JOIN cities ON cities.city_id = customers.customer_city
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN clients ON clients.client_id = customers.client_id
            WHERE customers.client_id = :client_id AND customers.customer_date >= :date_val AND customers.customer_date <= :date_end
            ',['client_id' => $client_id,'date_val' => $date_val,'date_end' => $date_end]);


        return $customers;
    }


    public function timerangereport($client_id,$date_val,$start_time,$end_time,$start_am_pm,$end_am_pm)
    {
        $customers = DB::select('

            SELECT 
                customers.customer_name AS "Name",
                customers.customer_phone AS "Mobile",
                cities.city_name AS "City",
                customers.customer_date AS "Date",
                customers.customer_time AS "Time",
                customers.customer_am_pm AS "AM/PM",
                clients.client_name AS "Client",
                client_categories.client_categories_name AS "Category",
                customers.customer_message AS "Message",
            CASE 
                WHEN customers.customer_file IS NULL THEN "N/A"
                WHEN customers.customer_file = "null" THEN "N/A"
                WHEN customers.customer_file IS NOT NULL THEN customers.customer_file
            END AS "File",
                users.name AS "Moderation",
            CASE
                WHEN customers.customer_status = 0 THEN "No.Action" 
                WHEN customers.customer_status = 1 THEN "Done"
                WHEN customers.customer_status = 2 THEN "On Hold"
                WHEN customers.customer_status = 3 THEN "Deal" 
            END AS "Status"  
            FROM customers
            JOIN users ON users.id = customers.user_id
            JOIN cities ON cities.city_id = customers.customer_city
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN clients ON clients.client_id = customers.client_id
            WHERE customers.client_id = :client_id AND customers.customer_date = :date_val AND customers.customer_time >= :start_time AND customers.customer_time <= :end_time 
            ',['client_id' => $client_id,'date_val' => $date_val,'start_time' => $start_time,'end_time' => $end_time]);


        return $customers;
    }


    //admin & mod
    public function getlead_client_admin($date_now)
    {
        $customers = DB::select('

           SELECT 
                customers.customer_name AS "Name",
                customers.customer_phone AS "Mobile",
                cities.city_name AS "City",
                customers.customer_date AS "Date",
                customers.customer_time AS "Time",
                customers.customer_am_pm AS "AM/PM",
                clients.client_name AS "Client",
                client_categories.client_categories_name AS "Category",
                customers.customer_message AS "Message",
            CASE 
                WHEN customers.customer_file IS NULL THEN "N/A"
                WHEN customers.customer_file = "null" THEN "N/A"
                WHEN customers.customer_file IS NOT NULL THEN customers.customer_file
            END AS "File",
                users.name AS "Moderation",
            CASE
                WHEN customers.customer_status = 0 THEN "No.Action" 
                WHEN customers.customer_status = 1 THEN "Done"
                WHEN customers.customer_status = 2 THEN "On Hold"
                WHEN customers.customer_status = 3 THEN "Deal" 
            END AS "Status"  
            FROM customers
            JOIN users ON users.id = customers.user_id
            JOIN cities ON cities.city_id = customers.customer_city
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN clients ON clients.client_id = customers.client_id
            WHERE customers.customer_date = :date_now
            ',['date_now' => $date_now]);


        return $customers;
    }


    public function getlead_client_month_admin($month,$year)
    {
        $customers = DB::select('

            SELECT 
                customers.customer_name AS "Name",
                customers.customer_phone AS "Mobile",
                cities.city_name AS "City",
                customers.customer_date AS "Date",
                customers.customer_time AS "Time",
                customers.customer_am_pm AS "AM/PM",
                clients.client_name AS "Client",
                client_categories.client_categories_name AS "Category",
                customers.customer_message AS "Message",
            CASE 
                WHEN customers.customer_file IS NULL THEN "N/A"
                WHEN customers.customer_file = "null" THEN "N/A"
                WHEN customers.customer_file IS NOT NULL THEN customers.customer_file
            END AS "File",
                users.name AS "Moderation",
            CASE
                WHEN customers.customer_status = 0 THEN "No.Action" 
                WHEN customers.customer_status = 1 THEN "Done"
                WHEN customers.customer_status = 2 THEN "On Hold"
                WHEN customers.customer_status = 3 THEN "Deal" 
            END AS "Status"  
            FROM customers
            JOIN users ON users.id = customers.user_id
            JOIN cities ON cities.city_id = customers.customer_city
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN clients ON clients.client_id = customers.client_id
            WHERE customers.customer_month = :month AND customers.customer_year = :year
            ',['month' => $month,'year' => $year]);


        return $customers;
    }

    public function getlead_client_year_admin($year)
    {
        $customers = DB::select('

            SELECT 
                customers.customer_name AS "Name",
                customers.customer_phone AS "Mobile",
                cities.city_name AS "City",
                customers.customer_date AS "Date",
                customers.customer_time AS "Time",
                customers.customer_am_pm AS "AM/PM",
                clients.client_name AS "Client",
                client_categories.client_categories_name AS "Category",
                customers.customer_message AS "Message",
            CASE 
                WHEN customers.customer_file IS NULL THEN "N/A"
                WHEN customers.customer_file = "null" THEN "N/A"
                WHEN customers.customer_file IS NOT NULL THEN customers.customer_file
            END AS "File",
                users.name AS "Moderation",
            CASE
                WHEN customers.customer_status = 0 THEN "No.Action" 
                WHEN customers.customer_status = 1 THEN "Done"
                WHEN customers.customer_status = 2 THEN "On Hold"
                WHEN customers.customer_status = 3 THEN "Deal" 
            END AS "Status"  
            FROM customers
            JOIN users ON users.id = customers.user_id
            JOIN cities ON cities.city_id = customers.customer_city
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN clients ON clients.client_id = customers.client_id
            WHERE customers.customer_year = :year
            ',['year' => $year]);


        return $customers;
    }

     public function getlead_client_all_admin()
    {
        $customers = DB::select('

            SELECT 
                customers.customer_name AS "Name",
                customers.customer_phone AS "Mobile",
                cities.city_name AS "City",
                customers.customer_date AS "Date",
                customers.customer_time AS "Time",
                customers.customer_am_pm AS "AM/PM",
                clients.client_name AS "Client",
                client_categories.client_categories_name AS "Category",
                customers.customer_message AS "Message",
            CASE 
                WHEN customers.customer_file IS NULL THEN "N/A"
                WHEN customers.customer_file = "null" THEN "N/A"
                WHEN customers.customer_file IS NOT NULL THEN customers.customer_file
            END AS "File",
                users.name AS "Moderation",
            CASE
                WHEN customers.customer_status = 0 THEN "No.Action" 
                WHEN customers.customer_status = 1 THEN "Done"
                WHEN customers.customer_status = 2 THEN "On Hold"
                WHEN customers.customer_status = 3 THEN "Deal" 
            END AS "Status"  
            FROM customers
            JOIN users ON users.id = customers.user_id
            JOIN cities ON cities.city_id = customers.customer_city
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN clients ON clients.client_id = customers.client_id
            ');


        return $customers;
    }


     public function getlead_client_all_admin_data()
    {
        $customers = DB::select('

            SELECT 
                customers.customer_id,
                customers.customer_name,
                customers.customer_phone,
                customers.customer_message,
                customers.customer_city,
                customers.customer_date,
                customers.customer_month,
                customers.customer_year,
                customers.customer_day,
                customers.customer_time,
                customers.customer_am_pm,
                customers.customer_file,
                customers.user_id,
                customers.client_id,
                customers.client_category,
                customers.customer_status,
                customers.created_at,
                customers.updated_at 
            FROM customers
            ');


        return $customers;
    }

     public function getlead_client_all_admin_manage()
    {
        $customers = DB::select('

            SELECT 
                customers.customer_id AS "ID",
                customers.customer_name AS "Name",
                customers.customer_phone AS "Mobile",
                cities.city_name AS "City",
                customers.customer_date AS "Date",
                customers.customer_time AS "Time",
                customers.customer_am_pm AS "AM/PM",
                clients.client_name AS "Client",
                client_categories.client_categories_name AS "Category",
                users.name AS "Moderation"  
            FROM customers
            JOIN users ON users.id = customers.user_id
            JOIN cities ON cities.city_id = customers.customer_city
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN clients ON clients.client_id = customers.client_id
            ');


        return $customers;
    }


//=======================================================
    //shift
    public function normalshift($client_id,$date_val,$start_time,$end_time,$user_id)
    {
        $customers = DB::select('

            SELECT 
                customers.customer_name AS "Name",
                customers.customer_phone AS "Mobile",
                cities.city_name AS "City",
                customers.customer_date AS "Date",
                customers.customer_time AS "Time",
                customers.customer_am_pm AS "AM/PM",
                clients.client_name AS "Client",
                client_categories.client_categories_name AS "Category",
                customers.customer_message AS "Message",
            CASE 
                WHEN customers.customer_file IS NULL THEN "N/A"
                WHEN customers.customer_file = "null" THEN "N/A"
                WHEN customers.customer_file IS NOT NULL THEN customers.customer_file
            END AS "File",
                users.name AS "Moderation",
            CASE
                WHEN customers.customer_status = 0 THEN "No.Action" 
                WHEN customers.customer_status = 1 THEN "Done"
                WHEN customers.customer_status = 2 THEN "On Hold"
                WHEN customers.customer_status = 3 THEN "Deal" 
            END AS "Status"  
            FROM customers
            JOIN users ON users.id = customers.user_id
            JOIN cities ON cities.city_id = customers.customer_city
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN clients ON clients.client_id = customers.client_id
            WHERE customers.client_id = :client_id AND customers.customer_date = :date_val AND customers.customer_time >= :start_time AND customers.customer_time <= :end_time  AND customers.user_id = :user_id
            ',['client_id' => $client_id,'date_val' => $date_val,'start_time' => $start_time,'end_time' => $end_time,'user_id' => $user_id]);


        return $customers;
    }


    public function nightshift($client_id,$date_val,$date_end,$start_time,$end_time,$user_id)
    {
        $customers = DB::select('

           SELECT 
                customers.customer_name AS "Name",
                customers.customer_phone AS "Mobile",
                cities.city_name AS "City",
                customers.customer_date AS "Date",
                customers.customer_time AS "Time",
                customers.customer_am_pm AS "AM/PM",
                clients.client_name AS "Client",
                client_categories.client_categories_name AS "Category",
                customers.customer_message AS "Message",
            CASE 
                WHEN customers.customer_file IS NULL THEN "N/A"
                WHEN customers.customer_file = "null" THEN "N/A"
                WHEN customers.customer_file IS NOT NULL THEN customers.customer_file
            END AS "File",
                users.name AS "Moderation",
            CASE
                WHEN customers.customer_status = 0 THEN "No.Action" 
                WHEN customers.customer_status = 1 THEN "Done"
                WHEN customers.customer_status = 2 THEN "On Hold"
                WHEN customers.customer_status = 3 THEN "Deal" 
            END AS "Status"  
            FROM customers
            JOIN users ON users.id = customers.user_id
            JOIN cities ON cities.city_id = customers.customer_city
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN clients ON clients.client_id = customers.client_id
            WHERE customers.client_id = :client_id AND customers.customer_date >= :date_val AND customers.customer_date <= :date_end AND customers.customer_time >= :start_time AND customers.customer_time <= :end_time  AND customers.user_id = :user_id
            ',['client_id' => $client_id,'date_val' => $date_val,'start_time' => $start_time,'end_time' => $end_time,'user_id' => $user_id,'date_end' => $date_end]);


        return $customers;
    }


    //all clients shift

    public function normalallclientsreport($date_val,$start_time,$end_time,$user_id)
    {
        $customers = DB::select('

            SELECT 
                customers.customer_name AS "Name",
                customers.customer_phone AS "Mobile",
                cities.city_name AS "City",
                customers.customer_date AS "Date",
                customers.customer_time AS "Time",
                customers.customer_am_pm AS "AM/PM",
                clients.client_name AS "Client",
                client_categories.client_categories_name AS "Category",
                customers.customer_message AS "Message",
            CASE 
                WHEN customers.customer_file IS NULL THEN "N/A"
                WHEN customers.customer_file = "null" THEN "N/A"
                WHEN customers.customer_file IS NOT NULL THEN customers.customer_file
            END AS "File",
                users.name AS "Moderation",
            CASE
                WHEN customers.customer_status = 0 THEN "No.Action" 
                WHEN customers.customer_status = 1 THEN "Done"
                WHEN customers.customer_status = 2 THEN "On Hold"
                WHEN customers.customer_status = 3 THEN "Deal" 
            END AS "Status"  
            FROM customers
            JOIN users ON users.id = customers.user_id
            JOIN cities ON cities.city_id = customers.customer_city
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN clients ON clients.client_id = customers.client_id
            WHERE customers.user_id = :user_id AND customers.customer_date = :date_val AND customers.customer_time >= :start_time AND customers.customer_time <= :end_time 
            ',['user_id' => $user_id,'date_val' => $date_val,'start_time' => $start_time,'end_time' => $end_time]);


        return $customers;
    }

    public function nightallclientsreport($date_val,$end_date,$start_time,$end_time,$user_id)
    {
        $customers = DB::select('

            SELECT 
                customers.customer_name AS "Name",
                customers.customer_phone AS "Mobile",
                cities.city_name AS "City",
                customers.customer_date AS "Date",
                customers.customer_time AS "Time",
                customers.customer_am_pm AS "AM/PM",
                clients.client_name AS "Client",
                client_categories.client_categories_name AS "Category",
                customers.customer_message AS "Message",
            CASE 
                WHEN customers.customer_file IS NULL THEN "N/A"
                WHEN customers.customer_file = "null" THEN "N/A"
                WHEN customers.customer_file IS NOT NULL THEN customers.customer_file
            END AS "File",
                users.name AS "Moderation",
            CASE
                WHEN customers.customer_status = 0 THEN "No.Action" 
                WHEN customers.customer_status = 1 THEN "Done"
                WHEN customers.customer_status = 2 THEN "On Hold"
                WHEN customers.customer_status = 3 THEN "Deal" 
            END AS "Status"  
            FROM customers
            JOIN users ON users.id = customers.user_id
            JOIN cities ON cities.city_id = customers.customer_city
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN clients ON clients.client_id = customers.client_id
            WHERE customers.user_id = :user_id AND customers.customer_date >= :date_val AND customers.customer_date <= :end_date AND customers.customer_time >= :start_time AND customers.customer_time <= :end_time 
            ',['user_id' => $user_id,'date_val' => $date_val,'end_date' => $end_date,'start_time' => $start_time,'end_time' => $end_time]);


        return $customers;
    }


    //customer reports call on actions
    public function getlead_client_actions($client_id,$date_now,$status)
    {
        $customers = DB::select('

            SELECT 
                customers.customer_id AS "ID",
                customers.customer_name AS "Name",
                customers.customer_phone AS "Mobile",
                cities.city_name AS "City",
                customers.customer_date AS "Date",
                customers.customer_time AS "Time",
                customers.customer_am_pm AS "AM/PM",
                clients.client_name AS "Client",
                client_categories.client_categories_name AS "Category",
                customers.customer_message AS "Message",
            CASE 
                WHEN customers.customer_file IS NULL THEN "N/A"
                WHEN customers.customer_file = "null" THEN "N/A"
                WHEN customers.customer_file IS NOT NULL THEN customers.customer_file
            END AS "File",
                users.name AS "Moderation",
            CASE
                WHEN customers.customer_status = 0 THEN "No.Action" 
                WHEN customers.customer_status = 1 THEN "Done"
                WHEN customers.customer_status = 2 THEN "On Hold"
                WHEN customers.customer_status = 3 THEN "Deal" 
            END AS "Status"  
            FROM customers
            JOIN users ON users.id = customers.user_id
            JOIN cities ON cities.city_id = customers.customer_city
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN clients ON clients.client_id = customers.client_id
            WHERE customers.client_id = :client_id AND customers.customer_date = :date_now AND customers.customer_status = :status
            ',['client_id' => $client_id,'date_now' => $date_now,'status' => $status]);


        return $customers;
    }


    public function getlead_client_month_actions($client_id,$month,$year,$status)
    {
        $customers = DB::select('

            SELECT 
                customers.customer_id AS "ID",
                customers.customer_name AS "Name",
                customers.customer_phone AS "Mobile",
                cities.city_name AS "City",
                customers.customer_date AS "Date",
                customers.customer_time AS "Time",
                customers.customer_am_pm AS "AM/PM",
                clients.client_name AS "Client",
                client_categories.client_categories_name AS "Category",
                customers.customer_message AS "Message",
            CASE 
                WHEN customers.customer_file IS NULL THEN "N/A"
                WHEN customers.customer_file = "null" THEN "N/A"
                WHEN customers.customer_file IS NOT NULL THEN customers.customer_file
            END AS "File",
                users.name AS "Moderation",
            CASE
                WHEN customers.customer_status = 0 THEN "No.Action" 
                WHEN customers.customer_status = 1 THEN "Done"
                WHEN customers.customer_status = 2 THEN "On Hold"
                WHEN customers.customer_status = 3 THEN "Deal" 
            END AS "Status"  
            FROM customers
            JOIN users ON users.id = customers.user_id
            JOIN cities ON cities.city_id = customers.customer_city
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN clients ON clients.client_id = customers.client_id
            WHERE customers.client_id = :client_id AND customers.customer_month = :month AND customers.customer_year = :year AND customers.customer_status = :status
            ',['client_id' => $client_id,'month' => $month,'year' => $year,'status' => $status]);


        return $customers;
    }


     public function getlead_client_year_action($client_id,$year,$status)
    {
        $customers = DB::select('

            SELECT 
                customers.customer_id AS "ID",
                customers.customer_name AS "Name",
                customers.customer_phone AS "Mobile",
                cities.city_name AS "City",
                customers.customer_date AS "Date",
                customers.customer_time AS "Time",
                customers.customer_am_pm AS "AM/PM",
                clients.client_name AS "Client",
                client_categories.client_categories_name AS "Category",
                customers.customer_message AS "Message",
            CASE 
                WHEN customers.customer_file IS NULL THEN "N/A"
                WHEN customers.customer_file = "null" THEN "N/A"
                WHEN customers.customer_file IS NOT NULL THEN customers.customer_file
            END AS "File",
                users.name AS "Moderation",
            CASE
                WHEN customers.customer_status = 0 THEN "No.Action" 
                WHEN customers.customer_status = 1 THEN "Done"
                WHEN customers.customer_status = 2 THEN "On Hold"
                WHEN customers.customer_status = 3 THEN "Deal" 
            END AS "Status"  
            FROM customers
            JOIN users ON users.id = customers.user_id
            JOIN cities ON cities.city_id = customers.customer_city
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN clients ON clients.client_id = customers.client_id
            WHERE customers.client_id = :client_id AND customers.customer_year = :year AND customers.customer_status  = :status
            ',['client_id' => $client_id,'year' => $year,'status' => $status]);


        return $customers;
    }

    //actions
    public function changestatus($customer_id,$status)
    {
        $customer = DB::statement('
            UPDATE customers
            SET customer_status = :status
            WHERE customer_id = :customer_id
            ',['customer_id' => $customer_id,'status' => $status]);


        return $customer;
    }


    public function deletecustomer($customer_id)
    {
        $customer = DB::delete('
            DELETE FROM customers
            WHERE customer_id = ?
            ',array($customer_id));



        return $customer;
    }


    public function getcutomerbynumber($number)
    {
        $customer = DB::select('
            SELECT 
                customers.customer_name,
                customers.customer_date,
                customers.customer_time,
                customers.customer_am_pm,
                customers.customer_phone,
                clients.client_name,
                client_categories.client_categories_name
            FROM customers
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN clients ON clients.client_id = customers.client_id
            WHERE customers.customer_phone = ?
            ',array($number));


        return $customer;
    }

    public function getcustomerupdate($customer_id)
    {
        $customer = DB::select('

            SELECT 
                customers.customer_name,
                customers.customer_phone,
                customers.customer_city,
                customers.client_category,
                clients.client_name,
                client_categories.client_categories_name,
                customers.customer_message,
                cities.city_name,
                customers.client_id
            FROM customers
            JOIN client_categories ON client_categories.client_categories_id = customers.client_category
            JOIN cities ON cities.city_id = customers.customer_city
            JOIN clients ON clients.client_id = customers.client_id
            WHERE customers.customer_id = ?
            ',array($customer_id));

        return $customer;
    }


    public function updatelead(Request $request,$customer_id)
    {
        $customer = DB::statement('

            UPDATE customers
            SET     customer_name = ?,
                    customer_phone = ?,
                    customer_city = ?,
                    client_id = ?,
                    client_category = ?,
                    customer_message = ?
            WHERE customer_id = ?



            ',array(

                $request->input('var1'),
                $request->input('var2'),
                $request->input('var3'),
                $request->input('var4'),
                $request->input('var5'),
                $request->input('var6'),
                $customer_id
            ));


        return $customer;
    }
}
