<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EndClientController extends Controller
{
    public function dashboard()
    {
        return view('end_client.dashboard');
    }
}
