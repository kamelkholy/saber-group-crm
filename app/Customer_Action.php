<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Customer_Action extends Model
{
    public $table = "customer_call_actions";
    protected $primaryKey = 'customer_call_actions_id';	

    protected $fillable = 
    ['var0','var1','var2','var3','var4','var5','var6','var7','var8','var9','var10','var11',];


    public function gettrack($customer_id)
    {
    	$customer = DB::select('

    		SELECT 
    			users.name AS "Sales Name",
    		CASE 

    			WHEN customer_call_actions.action = 0 THEN "No Action"
    			WHEN customer_call_actions.action = 1 THEN "Done"
    			WHEN customer_call_actions.action = 2 THEN "On Hold"
    			WHEN customer_call_actions.action = 3 THEN "Deal"
    		END AS "Action",
    		customers.customer_name AS "Customer Name",
    		customers.customer_phone AS "Mobile",
    		customer_call_actions.action_date AS "Date",
    		customer_call_actions.action_time AS "Time",
            customer_call_actions.action_comment AS "Comment"
    		FROM customer_call_actions
    		JOIN users ON users.id = customer_call_actions.user_id
    		JOIN customers ON customers.customer_id = customer_call_actions.customer_id
    		WHERE customer_call_actions.customer_id = ?
    		',array($customer_id));

    	return $customer;
    }

    public function deletecustomer($customer_id)
    {
        $customer = DB::delete('
            DELETE FROM customer_call_actions
            WHERE customer_id = ?
            ',array($customer_id));



        return $customer;
    }
}
