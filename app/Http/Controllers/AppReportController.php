<?php

namespace App\Http\Controllers;

use App\Models\AppReport;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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
        $reports = AppReport::where('user_id', Auth::user()->id)->get();
        return view('user_report.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user_report.create');
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
        $request->validate([
            'message' => 'required|string',
            'subject' => 'required|string',
            'img' => 'required|file'
        ]);
        $report = new AppReport;
        $report->img = 'storage/disputes/'.time().'.'
            .$request->file('img')->getClientOriginalExtension();
        $request->file('img')->storeAs(
            'public/disputes/', 
            time().'.'.$request->file('img')->getClientOriginalExtension()
        );
        $report->user_id = Auth::user()->id;
        $report->status = 'pending';
        $report->subject = $request->subject;
        $report->message = $request->message;
        $report->save();

        return redirect()->route('report.index')
            ->with('success', 'Successfully submitted report.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AppReport  $appReport
     * @return \Illuminate\Http\Response
     */
    public function show(AppReport $report)
    {
        //
        return view('user_report.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AppReport  $appReport
     * @return \Illuminate\Http\Response
     */
    public function edit(AppReport $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AppReport  $appReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppReport $report)
    {
        //
        $request->validate([
            'message' => 'required|string',
            'subject' => 'required|string',
        ]);
        if ($report->user_id != Auth::user()->id) {
            return back()->withErrors('Something went wrong.');
        }
        $report->subject = $request->subject;
        $report->message = $request->message;
        $report->save();

        return redirect()->route('report.show', $report)
            ->with('success', 'Successfully updated report.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppReport  $appReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppReport $report)
    {
        //
        $report->delete();
        return redirect()->route('report.index')
            ->with('success', 'Successfully removed report.');
    }
}
