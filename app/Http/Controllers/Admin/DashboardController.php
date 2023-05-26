<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home()
    {
        // dd(Auth::user());
        // dd(Auth::id());
        // $user = Auth::user();
        // dd($user->userDetail?->address);

        return view('admin.dashboard');
    }
}
