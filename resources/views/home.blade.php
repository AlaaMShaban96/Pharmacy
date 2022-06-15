@extends('layouts.app')

@section('content')
  <div class="container-fluid">
        <div class="animated fadeIn mt-5">

            <ul class="nav row" id="myTab" role="tablist">
                <li class="nav-item col-5 p-0 mr-3 small-box bg-success">
                        <div class="inner">
                            <h3>{{$eventRepository->count()}}</h3>
                            <p>Events</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon icon-badge  "></i>
                        </div>
                        <a  class="small-box-footer nav-link active" id="profile-tab" data-toggle="tab" href="#events" aria-controls="events">show <i class="fa fa-arrow-circle-right"></i></a>

                </li>
                <li class="nav-item col-5 p-0 mr-3 small-box bg-warning">
                    <div class="inner">
                        <h3>{{$financialCovenantRepository->count()}}</h3>

                        <p>Pocket money </p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon icon-wallet "></i>
                    </div>
                    <a  class="small-box-footer nav-link " id="home-tab" data-toggle="tab" href="#home" aria-controls="home">show <i class="fa fa-arrow-circle-right"></i></a>

                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#events" aria-controls="events" >Events</a>
                </li> --}}
            </ul>
        </div>


        <div class="col-md-12 shadow-sm p-3 mb-5 bg-white rounded">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="events" role="tabpanel" aria-labelledby="profile-tab">
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
                                @foreach ($eventRepository as $key=> $event)
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
                <div class="tab-pane fade   " id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row" style="overflow: scroll">
                        <table class="table table-hover" >
                            <thead >
                              <tr>
                                <th scope="col">date</th>
                                <th scope="col">User</th>
                                <th scope="col">Department</th>
                                <th scope="col">Type </th>
                                <th scope="col">Amount</th>
                                <th scope="col">Remaining</th>
                                <th scope="col">Total</th>

                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($financialCovenantRepository as $key=> $financialCovenant)
                                <tr>
                                    <td>{{$financialCovenant->date}}</td>
                                    <td>{{$financialCovenant->user->name}}</td>
                                    <td>{{$financialCovenant->department->name}}</td>
                                    <td>{{$financialCovenant->financialCovenantType->name}}</td>
                                    <td>{{$financialCovenant->amount}}</td>
                                    <td>{{$financialCovenant->remaining}}</td>
                                    <td>{{$financialCovenant->total}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                          </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
