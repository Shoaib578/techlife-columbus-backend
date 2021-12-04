<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Interests;
use App\Models\UserInterests;
use App\Models\Events;
use App\Models\SavedEvents;
use App\Models\GoingEvents;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;









Route::post('/signup_user',function(){
$email = request('email');
$password = request('password');
$fullname = request('fullname');


$check_user = User::where('email','=',$email)->count();
if($check_user>0){
return [
    "msg"=>"Email Already Exist"
];
}else{
    User::create([
        "fullname"=>$fullname,
        "password"=>Hash::make($password),
        "email"=>$email,
        "is_admin"=>0
    ]);

    $user  = User::where('email','=',$email)->get();
    return [
        "msg"=>"User Registered Successfully",
        "user_id"=>$user[0]->user_id
        
    ];
}



});


Route::post('/login_user',function(){

    $email = request('email');
    $password = request('password');
    
    
    $user = User::where('email','=',$email)->get();
    if($user->count() == 1  && Hash::check($password, $user[0]->password)){
        return [
            "msg"=>"logged in",
            "user"=>$user[0]
        ];
    }else{
        return [
            "msg"=>"invalid login details",
            "user"=>[]
        ];
    }
    
    
});


Route::post('/login_with_google',function(){
 $email = request('email');
 $fullname = request('fullname');
 $user = User::where('email','=',$email)->get();

 if($user->count()>0){
    return [
        "user"=>$user,
        "msg"=>"logged In"
    ];
 }else{
     User::create([
         "fullname"=>$fullname,
         "email"=>$email,
         "is_admin"=>0,

     ]);
     $user = User::where('email','=',$email)->get();
     return [
        "user"=>$user,
        "msg"=>"logged In"
    ];
 }

});

Route::post('/login_with_facebook',function(){
    $email = request('email');
    $fullname = request('fullname');
    $user = User::where('email','=',$email)->get();
   
    if($user->count()>0){
       return [
           "user"=>$user[0],
           "msg"=>"found"
       ];
    }else{
        User::create([
            "fullname"=>$fullname,
            "email"=>$email,
            "is_admin"=>0,
   
        ]);
        $user = User::where('email','=',$email)->get();
        return [
           "user"=>$user[0],
           "msg"=>"not found",
           "user_id"=>$user[0]->user_id
        ];
    }
   
   });

   


Route::get('/get_user_info',function(){
    $user_id = request('user_id');
    $user = User::find($user_id);
    return [
        "user"=>$user
    ];
});

Route::post('/update_user',function(){
        $id = request('user_id');
        $fullname = request('fullname');
        $email = request('email');
        user::where('user_id', '=' , $id)->update(array('fullname' => $fullname,'email'=>$email));
        return [
            "msg"=>"user updated"
        ];
   
        
    
});


Route::post('/forgot_password',function(){
$email = request('email');
$user = User::where('email','=',$email)->get();

if($user->count()>0){
    $fourRandomDigit = mt_rand(1000,9999);
   
    

    Mail::raw("Your Verification Code is : $fourRandomDigit", function($msg) {
        $user_email = request('email');
        $msg->to($user_email)->subject('TechLife Columbus Forgot Password Verification Code');
        });


    return [
        "msg"=>"found",
        "otp"=>$fourRandomDigit,
        "user_id"=>$user[0]->user_id
    ];
}else{
    return [
        "msg"=>"not found"
    ];
}

});


Route::post('/create_new_password',function(){
$user_id = request('user_id');

User::where("user_id","=",$user_id)->update(array('password' => Hash::make(request('password'))));
return [
    "msg"=>"user password is updated",
    
];


});




//Main App Starts



Route::get('/get_all_interests',function(){
    $interests = Interests::get();
    return [
        "interests"=>$interests
    ];
    
    });
    
    
Route::post('/insert_interests',function(){
    $user_id = request('user_id');
    
    
    UserInterests::create([
        "selected_interest_user_id"=>$user_id,
        "selected_interest_id"=>request('interest'),
    
    ]);
    return [
        "msg" => "interest added"
    ];
});
    
    
Route::get('/user_profile',function(){
        $user_id = request('user_id');
    
        
        $users = DB::select("SELECT * FROM users WHERE user_id=$user_id");
        return [
        "users"=>$users
        ];
        
});
    
    
Route::get('/get_user_interests',function(){
    

    $user_id=request('user_id');
    $interests = DB::select("SELECT * FROM user_interests LEFT JOIN interests on interests.interest_id=user_interests.selected_interest_id WHERE user_interests.selected_interest_user_id=$user_id ");
    return [
        "interests"=>$interests
    ];
});
    
    


Route::get('/get_all_events',function(){

$all_events = DB::select("SELECT * FROM  events ");

return [
    "all_event"=>$all_events
];


});


Route::post('/make_going_event',function(){
$user_id = request('user_id');
$event_id = request('event_id');
$check_exist = GoingEvents::where('selected_going_event_id','=',$event_id,'AND','selected_going_event_user_id','=',$user_id);
if($check_exist->count() >0){
    $check_exist->delete();
    return [
        "msg"=>"going event  deleted"
    ];
}else{
    GoingEvents::create([
        "selected_going_event_id"=>$event_id,
        "selected_going_event_user_id"=>$user_id

    ]);
    return [
        "msg"=>"going event saved"
    ];
}
});


Route::get('/get_going_events',function(){
$user_id = request('user_id');

$going_events = DB::select("SELECT * FROM going_events LEFT JOIN events on events.event_id=going_events.selected_going_event_id WHERE going_events.selected_going_event_user_id=$user_id ");
return [
    "going_events"=>$going_events
];
});



Route::post('/save_event',function(){
$user_id = request('user_id');
$event_id = request('event_id');

$check_exist = SavedEvents::where('selected_saved_event_id','=',$event_id,'AND','selected_saved_event_user_id','=',$user_id);
if($check_exist->count() >0){
    $check_exist->delete();
    return [
        "msg"=>"event  deleted"
    ];
}else{
    SavedEvents::create([
        "selected_saved_event_user_id"=>$user_id,
        "selected_saved_event_id"=>$event_id

    ]);
    return [
        "msg"=>"event saved"
    ];
}
});
    
Route::get('/get_saved_events',function(){
    $user_id = request('user_id');
   
    $saved_events = DB::select("SELECT * FROM saved_events LEFT JOIN events on events.event_id=saved_events.selected_saved_event_id WHERE saved_events.selected_saved_event_user_id=$user_id");
    return [
        "saved_events"=>$saved_events
    ];

});


Route::get('/view_event',function(){
$event_id = request('event_id');
$user_id = request('user_id');
$event;
if($user_id){
$event = DB::select("SELECT *,(select count(*) from going_events where selected_going_event_user_id=$user_id AND selected_going_event_id=$event_id) as is_going,(select count(*) from saved_events where selected_saved_event_user_id=$user_id AND selected_saved_event_id=$event_id) as is_saved FROM events WHERE event_id=$event_id");

}else{
    $event = DB::select("SELECT * FROM events WHERE event_id=$event_id");
}
return [
    "event"=>$event[0]
];

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



