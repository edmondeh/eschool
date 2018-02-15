<?php

namespace App\Http\Controllers;


use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\User;
// use App\Role;

class AdminController extends Controller
{
    function __construct()
    {
    	//$this->middleware('auth');
    }
    public function index()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
    	return view('admin.index', [
    		'active' => 'dashboard'
    	]);
    }
    public function users()
    {
    	/*$users1 = DB::table('users')
    		->select('*', 'users.id as id', 'users.name as name', 'roles.name as role')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->get();*/
        $users = User::all();
        //dd($users);
    	return view('accounts.admin.users', [
    		'active' => "users-m",
    		'users' => $users
        ]);
    }
}
