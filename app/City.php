<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class City extends Model
{
    public $table = "cities";
    protected $primaryKey = 'city_id';	

    protected $fillable = 
    ['var0','var1','var2','var3','var4','var5','var6','var7','var8','var9','var10','var11',];


    public function citylist()
    {
    	$city = DB::select('
    		SELECT 
    			city_id AS "No.",
    			city_name  AS "Name"
    		FROM cities
    		');

    	return $city;
    }

    public function deletecity($city_id)
    {
    	$city = DB::delete('
    		DELETE FROM cities
    		WHERE city_id = ?
    		',array($city_id));


    	return $city;
    }


    public function getcity()
    {
    	$city = DB::select('
    		SELECT 
    			city_id,city_name
    		FROM cities 
    		');


    	return $city;
    }
}
