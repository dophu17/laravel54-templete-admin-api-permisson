<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use Auth;
use Validator;

class UserController extends AdminController
{
    public function __construct() {
    	parent::__construct();
    }

    public function index() {
    	// return view('admin.home');
    }
}
