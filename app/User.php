<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function manageusers()
    {
        $user = DB::select('

            SELECT
                id AS "ID",name AS "User Name",email AS "E-mail",
            CASE
                WHEN user_type  = 1 THEN "Admin"
                WHEN user_type  = 2 THEN "Client"
                WHEN user_type  = 3 THEN "Moderation"
                WHEN user_type  = 4 THEN "Sales"
            END AS "Account Type",
            CASE
                WHEN user_status = 0 THEN "Active"
                WHEN user_status = 1 THEN "Not Active"
            END AS "Status"
            FROM users
            ');

        return $user;
    }



}
