<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
  public function index()
  {

    $startOfWeek = Carbon::now()->startOfWeek();
    $endOfWeek = Carbon::now()->endOfWeek();

    // Query the users table to count the users created within the current week
    $userCount = User::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();

    $startDate = Carbon::now()->startOfWeek(); // Get the start date of the current week
    $endDate = Carbon::now(); // Current date and time

    $adminCount = DB::table('users')
      ->join('user_type', 'users.user_type', '=', 'user_type.id')
      ->where('user_type.type', 'admin')
      ->whereBetween('users.created_at', [$startDate, $endDate])
      ->count();

    $current_user = Auth::user();
    $userType = $current_user->usertype->type;


    return match (strtolower($userType)) {
      'super_admin' => view('admin.dashboard', compact('current_user', 'userCount', 'adminCount')),
      'admin' => view('customer.dashboard', compact('current_user')),
      'Technical writer' => view('end_client.dashboard', compact('current_user')),
      'Dealer' => view('end_client.dashboard', compact('current_user')),
      'End client' => view('end_client.dashboard', compact('current_user')),
    };
  }

  public function accessDashboard($id)
  {
    $adminUser = User::find($id);

    if ($adminUser && $adminUser->user_type === 2) {
      Auth::login($adminUser); 
      return redirect()->route('dashboard'); 
    }
  }
}