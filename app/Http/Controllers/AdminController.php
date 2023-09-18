<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function dashboard(){

        return view('backend.admin.dashboard');
    }
}
