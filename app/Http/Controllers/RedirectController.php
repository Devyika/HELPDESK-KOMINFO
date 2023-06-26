<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function cek() {
        if (auth()->user()->role_id === 'superadmin') {
            return redirect('/dashboard1');
        } elseif (auth()->user()->role_id === 'admin') {
            return redirect('/dashboard2');
        } elseif (auth()->user()->role_id === 'opd') {
            return redirect('/dashboard3');
        }
    }
}