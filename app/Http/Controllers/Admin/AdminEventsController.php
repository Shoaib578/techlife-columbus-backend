<?php

namespace App\Http\Controllers\Admin;
use App\Models\Events;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = User::where('is_admin','=',1)->count();
        if($admin>0){
            Log::info('Admin Already Exist');
        }else{
            User::create([
                "fullname"=>"admin26",
                "email"=>"theadmin26@gmail.com",
                "password"=>Hash::make('Games5879'),
                "is_admin"=>1,
                
            ]);
        }

        
        $events = DB::select("SELECT *,(select count(*) from going_events where selected_going_event_id=event_id) as going_events_count, (select count(*) from saved_events where selected_saved_event_id=saved_event_id) as saved_events_count from events");

       return view('admin_events',["events"=>$events]);
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
        $this->validate($request,[
            'event_title'=>'required|max:255',
           
           
            'event_description'=>'required',
            'event_image'=>'required',
            'event_date'=>'required',
            'event_time'=>'required',
           

        ]);
        $event_image_name;
        if($request->event_image){
            $event_image_name = time().'.'.$request->event_image->getClientOriginalExtension();
            $request->event_image->move(public_path('/uploads'),$event_image_name);
        }else{
            $event_image_name="";
        }
        Events::create([
            "event_title"=>$request->event_title,
            "event_description"=>$request->event_description,
            "event_image"=>$event_image_name,
            "event_date"=>$request->event_date,
            "event_time"=>$request->event_time

        ]);
        return redirect('/admin_events')->with('status',"Event Added");

    }



    public function search(Request $request){
        $this->validate($request,[
            'search'=>'required|max:255',
        ]);


        $search = DB::select("SELECT *,(select count(*) from going_events where selected_going_event_id=event_id) as going_events_count, (select count(*) from saved_events where selected_saved_event_id=saved_event_id) as saved_events_count from events WHERE event_title  LIKE '%$request->search%' ");
        return view('admin_events',["events"=>$search]);

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
        $event = Events::find($id);
        $imagepath = public_path()."/uploads/".$event->event_image;
       
        unlink($imagepath);

        $event->delete();
        return redirect()->back()->with('status','Event Deleted');
    }
}
