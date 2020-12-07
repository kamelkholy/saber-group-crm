<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Shift extends Model
{
    public $table = "shifts";
    protected $primaryKey = 'shift_id';	

    protected $fillable = 
    ['var0','var1','var2','var3','var4','var5','var6','var7','var8','var9','var10','var11',];


    public function getshift($user_id)
    {
    	$shift = DB::select('
    		SELECT 
    			shift_id,status,shift_end_date,shift_start_time,shift_end_time
    		FROM shifts
    		WHERE user_id = ? AND status = 0

    		',array($user_id));

    	return $shift;
    }


    public function seacrhshift($shift_id)
    {
        $shift = DB::select('
            SELECT 
                shift_id,status,shift_end_date,shift_start_time,shift_end_time
            FROM shifts
            WHERE shift_id = ?

            ',array($shift_id));

        return $shift;
    }


    



}
