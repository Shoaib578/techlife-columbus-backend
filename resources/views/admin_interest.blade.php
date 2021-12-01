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
                                <h4 class="card-title">All Interests</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Interest Title</th>
                                               
                                                <th>Interest Image</th>
                                               
                                                <th>Interest Tags</th>

                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if($interests)
                                        @foreach($interests as $interest)
                                            <tr>
                                            <td>{{$interest->interest_id}}</td>

                                                <td>{{$interest->interest_title}}</td>
                                             
                                                <td>
                                      <img  src="{{ asset( 'uploads/'.$interest->interest_image ) }}" style="width:60px;height:60px;margin-top:10px;"/>

                                                </td>
                                                <td><span>{{$interest->interest_tags}}</span></td>
                                                
                                               
                                                <td>
                                                <a href="/interest/{{$interest->interest_id}}/delete">   
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
        <h5 class="modal-title" id="exampleModalLabel">Add Interests</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="add_interests" method="post" enctype="multipart/form-data">
        @csrf

      <div class="form-group">
    <label for="exampleInputEmail1">Interest Title</label>
    <input type="text" class="form-control" name="interest_title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Interest Title">
    @error('interest_title')
        <div class="text-orange-500 mt-2 text-sm" style="color:orange;">
         {{ $message }}
        </div>
      @enderror 
  </div>


 



  <div class="form-group">
    <label for="exampleInputEmail1">Interest Image</label>
    <input type="file" class="form-control" name="interest_image" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Interest Image">
    @error('interest_image')
        <div class="text-orange-500 mt-2 text-sm" style="color:orange;">
         {{ $message }}
        </div>
      @enderror 
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Interest Tags</label>
    <input type="text" class="form-control" name="interest_tags" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Interest Tags.Please separate Tags by writing , between the words">
    @error('interest_tags')
        <div class="text-orange-500 mt-2 text-sm" style="color:orange;">
         {{ $message }}
        </div>
      @enderror 
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