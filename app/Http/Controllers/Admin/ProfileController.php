<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index() {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        return view('admin.page.profile.index', [
    		'active' => "profile",
    	]);
    }
}
