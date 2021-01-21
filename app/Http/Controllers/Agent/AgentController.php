<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VendorOrder;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Input;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //*** GET Request
    public function index()
    {
        $user = Auth::user();
        $users = User::where('agent_ref_id', $user->id)->get(); 

        // dd($users, $user->id);
        $processing = VendorOrder::where('user_id','=',$user->id)->where('status','=','processing')->get(); 
        $completed = VendorOrder::where('user_id','=',$user->id)->where('status','=','completed')->get(); 
        return view('agent.index',compact('user','users','processing','completed'));
    }

    public function sellers()
    {
        $user = Auth::user();
        $users = User::where('agent_ref_id', $user->id)->get(); 
        return view('agent.sellers',compact('users'));
    }


    //*** GET Request
    public function profile()
    {
        $data = Auth::user();  
        return view('agent.profile',compact('data'));
    }

    public function profileupdate(Request $request)
    {

        $input = $request->all();  
        $data = Auth::user();

        $data->update($input);
        $msg = 'Successfully updated your profile';
        return response()->json($msg); 
    }

    public function become_an_agent(Request $request)
    {

        $request->validate([
            'agent_name'         => ['required'],
            'agent_address'      => ['required'],
            'agent_phone_number' => ['required'],
        ]);

        $input = $request->all();  
        $data = Auth::user();

        $data->is_agent           = 1;
        $data->agent_name         = $request->agent_name;
        $data->agent_address      = $request->agent_address;
        $data->agent_phone_number = $request->agent_phone_number;
        $data->save();

        return redirect()->route('agent-dashboard'); 
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
    public function show($id)
    {
        //
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
