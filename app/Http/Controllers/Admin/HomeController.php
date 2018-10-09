<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class HomeController extends AdminController
{
    public function __construct() {
    	parent::__construct();
    }

    public function index() {
    	return view('admin.home');
    }
}
