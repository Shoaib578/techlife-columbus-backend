@extends('layouts.app')

@section('content')
<center>
    <br>
    <br>
    <br>
    <br>

    <i class="fa fa-user-circle" style="font-size:100px;color:black"></i>
    <form action="{{ route('update_admin_profile',$user[0]->user_id) }}" method="post">
        @csrf

      <div class="form-group" style="width:50%">
    <label for="exampleInputEmail1" style="float:left">Full Name</label>
    <input type="text" class="form-control" name="fullname" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user[0]->fullname }}" placeholder="Enter Full Name">
    @error('fullname')
        <div class="text-orange-500 mt-2 text-sm" style="color:orange;">
         {{ $message }}
        </div>
      @enderror 
  </div>

  <div class="form-group" style="width:50%">
    <label for="exampleInputEmail1" style="float:left">Email address</label>
    <input type="email" class="form-control" value="{{$user[0]->email}}" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    @error('email')
        <div class="text-orange-500 mt-2 text-sm" style="color:orange;">
         {{ $message }}
        </div>
      @enderror 
  </div>
  <div class="form-group" style="width:50%">
    <label for="exampleInputPassword1" style="float:left">Password</label>
    <input type="text" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    @error('password')
        <div class="text-orange-500 mt-2 text-sm" style="color:orange;">
         {{ $message }}
        </div>
      @enderror 
  </div>

  <br>
  <br>

  <button type="submit" class="btn btn-primary">Update</button>

</form>
</center>

@endsection