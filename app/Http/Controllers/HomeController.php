<?php

namespace calendarLaravel\Http\Controllers;

use Illuminate\Http\Request;

use calendarLaravel\Http\Requests;

class HomeController extends Controller
{
    public function index(){
        return view('welcome');
    }
}
