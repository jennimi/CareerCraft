<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function subscribe(Request $request){
        if (!Auth::check()) {
            return redirect()->route('login')->with('info', 'You need to log in to subscribe.');
        }
    }
}
