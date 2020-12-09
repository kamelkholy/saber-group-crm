<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Client_Category extends Model
{
    public $table = "client_categories";
    protected $primaryKey = 'client_categories_id';	

    protected $fillable = 
    ['var0','var1','var2','var3','var4','var5','var6','var7','var8','var9','var10','var11',];


    public function catlist()
    {
    	$cat = DB::select('
    		SELECT 
    			client_categories.client_categories_id AS "No.",
    			client_categories.client_categories_name AS "Name",
    			clients.client_name AS "Client Name"
    		FROM client_categories
    		JOIN clients ON clients.client_id = client_categories.client_id
    		');

    	return $cat;
    }


    public function getclientcat($cat_id)
    {
        $cat = DB::select('
            SELECT 
                client_categories_id,client_categories_name
            FROM client_categories
            WHERE client_id = ?
            ',array($cat_id));

        return $cat;
    }
    public function getcat()
    {
        $cat = DB::select('
            SELECT 
                client_categories_id,client_categories_name
            FROM client_categories
            ');

        return $cat;
    }
}
