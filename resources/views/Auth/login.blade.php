@extends('layouts.login_layout')

@section('content')

<div class="wrapper fadeInDown">
  <div id="formContent">
   
            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center" style="background-color:red;color:white;">
                    {{ session('status') }}
                </div>
            @endif
   
   
    <form action="{{ route('login') }}" method="post">
    @csrf

        <br>
        
      <input type="email" id="login" class="fadeIn second" name="email" placeholder="Email">
      @error('email')
        <div class="text-orange-500 mt-2 text-sm" style="color:orange;">
         {{ $message }}
        </div>
      @enderror 
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      @error('password')
     <div class="text-orange-500 mt-2 text-sm" style="color:orange;">
         {{ $message }}
        </div>
         @enderror   
      <input type="submit" class="btn btn-primary" value="Log In">
    </form>

   

  </div>
</div>
@endsection
