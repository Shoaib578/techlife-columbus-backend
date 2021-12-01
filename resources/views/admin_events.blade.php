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
            <div class="col-lg-7 ml-5" >
                        <div class="card" >
                            <div class="card-header">
                                <h4 class="card-title">All Events</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Event Title</th>
                                                <th>Event Description</th>
                                                <th>Event Image</th>
                                                <th>Event Date</th>
                                                <th>Event Time</th>
                                                <th>Going Event</th>
                                                <th>Saved Event</th>

                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if($events)
                                        @foreach($events as $event)
                                            <tr>
                                            <td>{{$event->event_id}}</td>

                                                <td>{{$event->event_title}}</td>
                                                <td>{{$event->event_description}}</td>
                                                <td>
                                      <img  src="{{ asset( 'uploads/'.$event->event_image ) }}" style="width:60px;height:60px;margin-top:10px;"/>

                                                </td>
                                                <td><span>{{$event->event_date}}</span></td>
                                                <td><span>{{$event->event_time}}</span></td>
                                                <td><span>{{ $event->going_events_count }}</span></td>
                                                <td><span>{{ $event->saved_events_count }}</span></td>

                                                <td>
                                                <a href="/event/{{ $event->event_id }}/delete">   
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
        <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="add_event" method="post" enctype="multipart/form-data">
        @csrf

      <div class="form-group">
    <label for="exampleInputEmail1">Event Title</label>
    <input type="text" class="form-control" name="event_title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Event Title">
    @error('event_title')
        <div class="text-orange-500 mt-2 text-sm" style="color:orange;">
         {{ $message }}
        </div>
      @enderror 
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Event Description</label>
    <textarea name="event_description" class="form-control" cols="30" rows="10">Event Description</textarea>
    @error('event_description')
        <div class="text-orange-500 mt-2 text-sm" style="color:orange;">
         {{ $message }}
        </div>
      @enderror 
  </div>



  <div class="form-group">
    <label for="exampleInputEmail1">Event Image</label>
    <input type="file" class="form-control" name="event_image" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Event Image">
    @error('event_image')
        <div class="text-orange-500 mt-2 text-sm" style="color:orange;">
         {{ $message }}
        </div>
      @enderror 
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Event Date</label>
    <input type="date" class="form-control" name="event_date" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Event Date">
    @error('event_date')
        <div class="text-orange-500 mt-2 text-sm" style="color:orange;">
         {{ $message }}
        </div>
      @enderror 
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Event Time</label>
    <input type="time" class="form-control" name="event_time" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Event Date">
    @error('event_time')
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