<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->role == 'super admin') {
            return redirect()->route('dashboard');
        } elseif (Auth::user()->role == 'pengawas') {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('formulir');
        }
    }
}
