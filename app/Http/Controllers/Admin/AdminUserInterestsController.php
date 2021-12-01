<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\Interests;
use App\Models\UserInterests;
use Illuminate\Support\Facades\DB;

class AdminUserInterestsController extends Controller
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
        $users = User::get();
        $interests = Interests::get();
        $user_interests = DB::select("SELECT *,(select count(*) from user_interests where user_interests.selected_interest_id=interest_id) as interest_count from interests");
        return view('admin_user_interests',["users"=>$users,"interests"=>$interests,"user_interests"=>$user_interests]);
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

    public function search(Request $request){
        $this->validate($request,[
            'search'=>'required|max:255',
        ]);

        $users = User::get();
        $interests = Interests::get();
        $search = DB::select("SELECT *,(select count(*) from user_interests where user_interests.selected_interest_id=interest_id) as interest_count FROM interests where interest_id=$request->search ");
        return view('admin_user_interests',["users"=>$users,"interests"=>$interests,"user_interests"=>$search]);

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
       
    }
}
