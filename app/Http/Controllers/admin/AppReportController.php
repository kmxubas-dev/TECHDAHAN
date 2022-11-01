<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\AppReport;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Notifications\UserNotification;

class AppReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reports = AppReport::paginate(10);
        return view('admin.report.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AppReport $report)
    {
        //
        return view('admin.report.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppReport $report)
    {
        //
        $request->validate([
            'status' => 'required|in:agreed,rejected',
            'response' => 'required|string',
        ]);

        $report->status = $request->status;
        $report->response = $request->response;
        $report->save();

        if ($report->status == 'agreed') {
            $type = 'report_success';
            $message = Auth::user()->name->full.' agreed to your dispute.';
        } else {
            $type = 'report_failed';
            $message = Auth::user()->name->full.' rejected your dispute.';
        }

        $report->user->notify(new UserNotification([
            'report_id' => $report->id,
            'type' => $type,
            'link' => route('report.show', $report),
            'message' => $message,
        ]));

        return redirect()->route('admin.report.show', $report)
            ->with('success', 'Successfully responded to this report.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
