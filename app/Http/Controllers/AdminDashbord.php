<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashbord extends Controller
{
    public function index()
    {
        return view('admin.dashbord');
    }
}
