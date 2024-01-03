<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class DashboardController extends Controller
{
    public function index()
    {
        $profile = Profile::count();
        return view('backend.dashboard', compact('profile'));
    }
}
