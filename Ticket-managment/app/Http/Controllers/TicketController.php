<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ticket;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = ticket::all();
        return view('ticket', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role', 'user')->get();
        $agents = User::where('role', 'agent')->get();
        // return $users;
        return view('addticket', compact(['users', 'agents']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'users' => 'required',
            'assets' => 'required',
            'priority' => 'required',
            'serial_number' => 'required|min:5|max:15',
            'model_number' => 'required|min:5|max:15',
            'agent' => 'required'
        ]);
        ticket::create([
            'user_id' => $request->users,
            'mobile' => $request->mobile,
            'assets' => $request->assets,
            'priority' => $request->priority,
            'serial_number' => $request->serial_number,
            'model_number' => $request->model_number,
            'agent_id' => $request->agent
        ]);
        return redirect('/tickets')->with('msg', "Ticket created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $data = ticket::find($id);
        return view('editstatus', compact('data'));
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
        $validated = $request->validate(
            [
                'status' => 'required',
            ],
            [
                'status.required' => '*Ticket status is required',
            ]
        );
        $data = ticket::where('id', $id)->update(
            [
                "status" => $request->status
            ]
        );
        return redirect('/ticketstatus')->with('msg', "Ticket updated successfully");;
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
    public function mobileData()
    {
        if ($_POST['user_Id']) {
            $id = $_POST['user_Id'];
            $mobile = User::find($id)->mobile;
            return response()->json(['mobile' => $mobile], 200);
        }
    }
    public function status()
    {
        $user = Auth::user();
        $data = ticket::where('agent_id', $user->id)->get();
        return view('ticketstatus', compact('data'));
    }
    public function report(){
        return view('report');
    }
    public function generateReport(Request $request){
 
        $start=strtotime($request->StartDate);
        $end=$request->EndDate;
        
        $tickets = Ticket::select("*")
                        ->whereDate('created_at','>=',date ( 'Y-m-d' , $start ))
                        ->get();
  
        // dd($report);
        return view('generates',compact('tickets'));
      
        

    }
}
