<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminHomeController extends Controller
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


        $users = User::where('user_id','!=',auth()->user()->user_id)->get();
        return view('admin_home',["users"=>$users]);
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


        $search = DB::select("SELECT * FROM users WHERE fullname   LIKE '%$request->search%' ");
        return view('admin_home',["users"=>$search]);

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
            'email'=>'required|email|max:255',
           
           
            'password'=>'required|max:255',
            'fullname'=>'required|max:255',
            'role'=>'required|max:255',
           

        ]);
        $check_user = User::where('email','=',$request->email)->count();
        if($check_user>0){
          return back()->with('status',"Email Already Exist Please Try Another One");  
        }else{
            $user =  User::create([
                "fullname"=>$request->fullname,
                "email"=>$request->email,
                "password"=>Hash::make($request->password),
                "is_admin"=>$request->role,
                
            ]);
            return redirect('/')->with('status','User Added Successfully');
        }
        
        
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
      $user = User::find($id);
       $user->delete();
       return redirect()->route('admin_home')->with('status','User Deleted');
    }
}
