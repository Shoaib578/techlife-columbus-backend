@extends('layouts.app')

@section('content')
<br>
<br>


<br>
<br>

<button type="button" class="btn btn-primary float-right mr-3" data-toggle="modal" data-target="#exampleModal">
  Add+
</button>

<br>
<br>
    <center>
            <div class="col-lg-6 ml-5">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All users</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if($users)
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->user_id}}</td>
                                                <td>{{$user->fullname}}</td>
                                                <td><span>{{$user->email}}</span></td>
                                                @if($user->is_admin == 0)
                                                    <td><span>Normal User</span></td>
                                                @else
                                                    <td><span>Admin User</span></td>

                                                @endif
                                                <td>
                                                <a href="/user/{{ $user->user_id }}/delete">   
                                                <span class="badge badge-danger">Delete</span>
                                                </a> 
                                            </td>
                                            </tr>
                                        @endforeach
                                        @endif 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </center>








<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="add_user" method="post">
        @csrf

      <div class="form-group">
    <label for="exampleInputEmail1">Full Name</label>
    <input type="text" class="form-control" name="fullname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Full Name">
    @error('fullname')
        <div class="text-orange-500 mt-2 text-sm" style="color:orange;">
         {{ $message }}
        </div>
      @enderror 
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    @error('email')
        <div class="text-orange-500 mt-2 text-sm" style="color:orange;">
         {{ $message }}
        </div>
      @enderror 
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="text" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    @error('password')
        <div class="text-orange-500 mt-2 text-sm" style="color:orange;">
         {{ $message }}
        </div>
      @enderror 
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Role</label>
    <div class="form-group">
    
    <select class="form-control" name="role" id="exampleFormControlSelect1">
      <option value="1">Admin</option>
      <option value="0">Normal User</option>
      
    </select>
    @error('role')
        <div class="text-orange-500 mt-2 text-sm" style="color:orange;">
         {{ $message }}
        </div>
      @enderror 
  </div>
  </div>

  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add+</button>
</form>

      </div>
    </div>
  </div>
</div>



@endsection
