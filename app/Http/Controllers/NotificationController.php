<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NotificationController extends Controller
{
    public function index()
    {
        Session::put('page','notification');
        return view('notifications.index');
    }
}