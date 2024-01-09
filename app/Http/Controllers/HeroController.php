<?php

namespace App\Http\Controllers;
use App\Models\Profile;

use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function hero($slug)
    {
        $profile = Profile::where('slug', $slug)->first();
        $title = $profile->name;

        return view('frontend.hero', compact('profile', 'title'));
    }
}
