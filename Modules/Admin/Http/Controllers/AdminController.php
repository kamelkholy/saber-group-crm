<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Client;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function homeadmin()
    {
        return view('admin::layouts.homeadmin');
    }

    //users
    public function addnewuser()
    {
        $client = new Client;
        $client = $client->getclients_view();
        return view('admin::users.addnewuser',['client' => $client]);
    }

    public function addnewuser_store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('var1');
        $user->email = $request->input('var2');
        $user->password = Hash::make($request->input('var3'));
        $user->user_type = $request->input('var4');
        if($request->input('var5') != null)
        {
           $user->user_client = $request->input('var5'); 
        }
        $user->save();

        return back();
    }

    public function userlist()
    {
        $user = new User;
        $records = $user->manageusers();

        return view('admin::users.manageusers', [
            'data' => $records,
            'urls' => array(
                'add' => '/crm/admin/addnewuser',
                //'update' => '/admin/updatebrand',
                'delete' => '/crm/admin/deleteuser',
            ),
        ]);
    }
    public function deleteuser($user_id)
    {
        $user = new  User;
        $user  = $user->deleteuser_admin($user_id);
        return back();
    }

    public function logout()
    {
        auth::logout();
        return redirect('/admin');
    }



    //clients
    public function addnewclient()
    {
    	return view('admin::clients.addnewclient');
    }

    public function addnewclient_store(Request $request)
    {
    	$user = new User;
        $user->name = $request->input('var1');
        $user->email = $request->input('var3');
        $user->password = Hash::make($request->input('var2'));
        $user->user_type = $request->input('var5');

        if($request->file('var4') != null){
        	$file = $request->file('var4');
            $stored = Storage::putFileAs('public/logos', $file, $file->getClientOriginalName());
            $stored = str_replace ( 'public/', '', $stored); 
        	$user->user_image = $stored;
        }
        $user->save();

        $client = new Client;
        $client->client_name = $request->input('var1');
        $client->client_phone =$request->input('var2');
        $client->client_mail = $request->input('var3');
        $client->user_id = $user->id;
        $client->save();

        return redirect()->back()
        ->with('success','Client Added Successfully !');

    }

    public function clientlist()
    {
        $client = new Client;
        $records = $client->getclients();

        return view('admin::clients.clientlist', [
            'data' => $records,
            'urls' => array(
                'add' => '/crm/admin/addnewclient',
                //'update' => '/admin/updatebrand',
                'delete' => '/crm/admin/deleteuser',
            ),
        ]);
    }

}
