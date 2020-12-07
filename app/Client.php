<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Client extends Model
{
    public $table = "clients";
    protected $primaryKey = 'client_id';	

    protected $fillable = 
    ['var0','var1','var2','var3','var4','var5','var6','var7','var8','var9','var10','var11',];


     public function getclients()
    {
    	$clients = DB::select('

    		SELECT 
    			client_id AS "ID",
    			client_name AS "Name",
    			client_phone AS "Mobile",
    			client_mail AS "E-mail"

    		FROM clients
       		');

    	return $clients;
    }


    public function deleteclient($client_id)
    {
        $client = DB::delete('
            DELETE FROM clients
            WHERE client_id = ?


            ',array($client_id));

        return $client;
    }

    //view
    public function getclients_view()
    {
        $client = DB::select('
            SELECT
                client_id,client_name

            FROM clients
            ');


        return $client;
    }

    public function getclient($user_id)
    {
        $user = DB::select('

            SELECT 
                client_id 
            FROM clients
            WHERE user_id = :user_id
            ',['user_id' => $user_id]);


        return $user;
    }

    public function getallclients()
    {
        $client = DB::select('
            SELECT
                client_id,client_name
            FROM clients
            ');

        return $client;
    }
}
