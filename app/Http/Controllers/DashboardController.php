<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index()
    {
        
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
    
        // Query the users table to count the users created within the current week
        $userCount = User::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
    
      
        $current_user = Auth::user();
        $userType = $current_user->usertype->type; 

        return match ($userType) {
          'Super admin' => view('admin.dashboard',compact('current_user', 'userCount')),
          'Admin' => view('customer.dashboard',compact('current_user')),
          'Technical writer' => view('end_client.dashboard',compact('current_user')),
          'Dealer' => view('end_client.dashboard',compact('current_user')),
          'End client' => view('end_client.dashboard',compact('current_user')),
        };
    }
}
