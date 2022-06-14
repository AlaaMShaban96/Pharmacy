@extends('layouts.app')

@section('content')
    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="{{Storage::url($user->photo)}}" alt=""/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                                <h5>
                                    {{$user->name}}
                                </h5>
                                <h6>
                                    {{$user->department?$user->department->name:'Admin of the system'}}
                                </h6>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#events" role="tab" aria-controls="events" aria-selected="false">Events</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#trining" role="tab" aria-controls="trining" aria-selected="false">Trining</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="gools-tab" data-toggle="tab" href="#gools" role="tab" aria-controls="gools" aria-selected="false">Gools</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-outline-info waves-effect" name="btnAddMore">Edit</a>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>Tools</p>
                        @foreach ($user->tools as $tool)
                        <span class="badge badge-pill badge-success">{{$tool->name}}</span>

                        @endforeach
                    </div>
                </div>
                <div class="col-md-8 shadow-sm p-3 mb-5 bg-white rounded">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active  " id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{$user->name}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{$user->email?$user->email:'No have email'}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Phone</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{$user->mobile?$user->mobile:'No have mobile'}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>department</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{$user->department?$user->department->name:'Admin of the system'}}</p>
                                        </div>
                                    </div>
                        </div>
                        <div class="tab-pane fade" id="events" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row" style="overflow: scroll">
                                <table class="table table-hover" >
                                    <thead >
                                      <tr>
                                        <th scope="col">event</th>
                                        <th scope="col">date</th>
                                        <th scope="col">Location </th>
                                        <th scope="col">Cost</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->events as $key=> $event)
                                        <tr>
                                            <td>{{$event->name}}</td>
                                            <td>{{$event->event_date}}</td>
                                            <td>{{$event->eventLocation->name}}</td>
                                            <td>{{$event->event_cost}}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                  </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="trining" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row" style="overflow: scroll">
                                <table class="table table-hover" >
                                    <thead >
                                      <tr>
                                        <th scope="col">name</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">from </th>
                                        <th scope="col">to </th>
                                        <th scope="col">loction</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->trainings as $key=> $training)
                                        <tr>
                                            <td>{{$training->name}}</td>
                                            <td>{{$training->trainingType->name}}</td>
                                            <td>{{$training->date}}</td>
                                            <td>{{$training->end_date}}</td>
                                            <td>{{$training->loction}}</td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                  </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="gools" role="tabpanel" aria-labelledby="gools-tab">
                            <div class="row" style="overflow: scroll">
                                <table class="table table-hover" >
                                    <thead >
                                      <tr>
                                        <th scope="col">gool</th>
                                        <th scope="col">cost</th>
                                        <th scope="col">from </th>
                                        <th scope="col">to</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->gools as $key=> $gool)
                                        <tr>
                                            <td>{{$gool->name}}</td>
                                            <td>{{$gool->cost}}</td>
                                            <td>{{$gool->from}}</td>
                                            <td>{{$gool->to}}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                  </table>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
        </form>
    </div>


@endsection

