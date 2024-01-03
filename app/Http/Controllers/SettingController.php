<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);

        return view('backend.setting.index', compact('user'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'password',
        ]);

        if ($request['password'] == "") {
            $request['password'] = $request['oldPass'];
        }
        else{
            if ($request['password'] == $request['re-password']) {
                $request['password'] = bcrypt($request['password']);
            }
            else{
                return back()->with('error', 'Password does not match!');
            }
        }

        $user = User::find($id);

        $user->update($request->all());

        return redirect()->route('setting.index')
            ->with('success', 'Update Success!');
    }
}
