<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

class ProfileController extends AppBaseController
{
    public function index(Request $request)
    {
        if ($request->filled('user_id')) {
            $user=User::find($request->user_id);
        }else {
            $user=auth()->user();
        }
        return view('profile.index',compact('user'));
    }
}
