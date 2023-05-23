<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $current_user = Auth::user();
        $userType = $current_user->usertype->type; 

        return match ($userType) {
          'admin' => view('admin.dashboard',compact('current_user')),
          'customer' => view('customer.dashboard',compact('current_user')),
          'end_client' => view('end_client.dashboard',compact('current_user')),
        };
    }
}
