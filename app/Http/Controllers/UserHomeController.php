<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index()
    {
        return view('user.userhome');

    }

    public function __construct()
    {
        $this->middleware('auth');
    }

}