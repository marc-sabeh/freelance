<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;

use Input;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ListsRequest;
use App\Lists;

use Maatwebsite\Excel\Facades\Excel;
class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $date_start = $request->input('date_start');
        $date_end = $request->input('date_end');
        $logs =DB::table('log_activity')
        ->select('created_by', DB::raw('(Select first_name from users where id=log_activity.created_by) as user_first_name'),DB::raw('(Select last_name from users where id=log_activity.created_by) as user_last_name') ,DB::raw('(count(type_id)) as count_type'),'type_id',DB::raw('(Select name from activity_types where id=log_activity.type_id) as type_name'))
        ->groupBy('type_id','created_by')
        ->distinct(['created'])
        ->whereBetween('created', [$date_start." 00:00:00",$date_end." 23:59:59"])
        ->get();
        

        $users=DB::table('log_activity')
        ->select('created_by',DB::raw('(Select first_name from users where id=log_activity.created_by) as user_first_name'),DB::raw('(Select last_name from users where id=log_activity.created_by) as user_last_name') )
        ->groupBy('created_by')
        ->get();
        
        $total_signed = DB::table('case_assignments')
            ->select('created_by', DB::raw('SUM((SELECT count(*) FROM `esign_docs` where case_id=case_assignments.case_id and status=\'Signed\'))as count_signed_status_per_user'))
            ->groupBy('created_by')
            ->distinct(['created'])
            ->whereBetween('created', [$date_start." 00:00:00",$date_end." 23:59:59"])
            ->get();

        $bounds = DB::table('timeclock')
        ->select('user_id','type',DB::raw('(count(type)) as bounds_count') )
        ->groupBy('type', 'user_id')
        ->distinct(['timeinout'])
        ->whereBetween('timeinout', [$date_start." 00:00:00",$date_end." 23:59:59"])
        ->get();

        $total_nbr_of_working_days =DB::table('attendance')
        ->select('user_id','number_of_attendance', 'month')
        ->whereBetween('month', [$date_start." 00:00:00",$date_end." 23:59:59"])
        ->get();


        return view('reports.index', compact('users','logs','bounds','total_signed','total_nbr_of_working_days','date_start'));
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
      
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
    public function update(Request $request, $id)
    {
        //
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
