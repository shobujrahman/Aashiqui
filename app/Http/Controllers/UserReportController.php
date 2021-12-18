<?php

namespace App\Http\Controllers;

use App\Models\UserReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class UserReportController extends Controller
{
    //all Reports
    public function allReports()
    {
        Session::put('page','report');
        //get all user reports where reporter id is equal user
        $userReports = UserReport::with(['reporterUser','reportedUser','reportedPhoto'])->get();
        // return $userReports;
        return view('reports.index',['userReports' => $userReports])->with('no',1);
    }
}