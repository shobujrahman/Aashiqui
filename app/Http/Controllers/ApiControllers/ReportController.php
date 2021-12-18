<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\UserReport;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function reportUser(Request $request)
    {
     $validator = validator()->make($request->all(), [
            'reported_id' => 'required',
            'report_issue' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'data' => $validator->errors()->first(),
            ]);
        }
        $user = auth()->user();
        $report = new UserReport();
        $report->reporter_id = $user->id;
        $report->reported_id = $request->reported_id;

        if ($request->has('user_photo_id')) {
            $report->user_photo_id = $request->user_photo_id;
        }
        $report->report_issue = $request->report_issue;

        $report->save();
        return response()->json(['success' => true]);
    }
}
