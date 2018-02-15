<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \Debugbar::info('Miresevini!');

        $user = Auth::user();

        $roles = $user->roles;
        // foreach ($roles as $role) {
        //     echo $role->name."<br>";
        //     echo $role->display_name."<br>";
        //     echo $role->description."<br>";
        // }

        return view('home', ['roles' => $roles]);
    }
}
