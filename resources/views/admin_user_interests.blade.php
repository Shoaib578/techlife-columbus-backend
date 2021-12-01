@extends('layouts.app')

@section('content')

<br>
<br>




<br>
<br>
    <center>
            <div class="col-lg-6 ml-5">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">User Interests</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                               
                                               
                                                <th>Interest ID</th>
                                               
                                                <th>Interest Image</th>
                                               
                                                <th>Interest Title</th>
                                                <th>Interested Users</th>

                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                      
                                       @if($user_interests)
                                        @foreach($user_interests as $user_interest)


                                        
                                            <tr>
                                            


                                                <td>{{$user_interest->interest_id}}</td>
                                            


                                            
                                                <td>
                                            <img  src="{{ asset( 'uploads/'.$user_interest->interest_image ) }}" style="width:60px;height:60px;margin-top:10px;"/>

                                                </td>
                                                <td><span>{{$user_interest->interest_title}}</span></td>
                                                
                                                <td><span>{{ $user_interest->interest_count }}</span></td>
                                            
                                               
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









@endsection