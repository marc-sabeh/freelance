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
        $logs =DB::table('log_activity')
        ->select('created_by', DB::raw('(Select first_name from users where id=log_activity.created_by) as user_first_name'),DB::raw('(Select last_name from users where id=log_activity.created_by) as user_last_name') ,DB::raw('(count(type_id)) as count_type'),'type_id',DB::raw('(Select name from activity_types where id=log_activity.type_id) as type_name')   )
        ->groupBy('type_id','created_by')
        ->get();
        $date_start = $request->input('date_start');
        // $users = users::all();
        $users=DB::table('log_activity')
        ->select('created_by',DB::raw('(Select first_name from users where id=log_activity.created_by) as user_first_name'),DB::raw('(Select last_name from users where id=log_activity.created_by) as user_last_name') )
        ->groupBy('created_by')
        ->get();
        
        return view('reports.index', compact('users','logs','date_start'));
    }

    
    // function import(Request $request)
    // {
    //  $this->validate($request, [
    //   'select_file'  => 'required|mimes:xls,xlsx'
    //  ]);

    //  $path = $request->file('select_file')->getRealPath();

    //  $data = Excel::load($path)->get();

    //  if($data->count() > 0)
    //  {
    //   foreach($data->toArray() as $key => $value)
    //   {
    //    foreach($value as $row)
    //    {
    //     $insert_data[] = array(
    //      'CustomerName'  => $row['customer_name'],
    //      'Gender'   => $row['gender'],
    //      'Address'   => $row['address'],
    //      'City'    => $row['city'],
    //      'PostalCode'  => $row['postal_code'],
    //      'Country'   => $row['country']
    //     );
    //    }
    //   }


    //  }
    //  return back()->with('success', 'Excel Data Imported successfully.');
    // }

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
