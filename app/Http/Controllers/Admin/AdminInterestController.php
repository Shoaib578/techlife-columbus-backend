<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Interests;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
class AdminInterestController extends Controller
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
        $interests = Interests::get();
        return view('admin_interest',["interests"=>$interests]);
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


        $search = DB::select("SELECT * FROM interests WHERE interest_title  LIKE '%$request->search%' ");
        return view('admin_interest',["interests"=>$search]);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $interest_image_name;
        if($request->interest_image){
            $interest_image_name = time().'.'.$request->interest_image->getClientOriginalExtension();
            $request->interest_image->move(public_path('/uploads'),$interest_image_name);
        }else{
            $interest_image_name="";
        }
        Interests::create([
            "interest_title"=>$request->interest_title,
       
            "interest_image"=>$interest_image_name,
            "interest_tags"=>$request->interest_tags,
          

        ]);
        return redirect('/admin_interests')->with('status',"Interest Added");
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
        $interest = Interests::find($id);
        $imagepath = public_path()."/uploads/".$interest->interest_image;
       
        unlink($imagepath);

        $interest->delete();
        return redirect()->back()->with('status','Interest Deleted');
    }
}
