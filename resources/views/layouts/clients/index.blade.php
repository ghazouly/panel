@extends('layouts.app')

@section('content')

<h1>All Clients</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-danger">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Contact Phone</th>
            <th>Contract Start Date</th>
            <th>Contract End Date</th>
            <th>Services Links and Control</th>
            <th>Client Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clients as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->description }}</td>
            <td>
                  @if ($value->status == 1)
                      {{$clientStatus = "Active"}}
                  @else
                      {{$clientStatus = "Pending"}}
                  @endif
            </td>
            <td>{{ $value->contact_phone }}</td>
            <td>{{ $value->contract_start_date }}</td>
            <td>{{ $value->contract_end_date }}</td>
            <td>
                  @foreach ($value->services as $service)
                      @if ($service->type == "Facebook")
                          <a class="btn btn-small btn-default" href="{{URL::to($service->link)}}">
                              <i class="fa fa-facebook"></i>
                          </a>
                      @elseif ($service->type == "Twitter")
                          <a class="btn btn-small btn-default" href="{{URL::to($service->link)}}">
                              <i class="fa fa-twitter"></i>
                          </a>
                      @elseif ($service->type == "Youtube")
                          <a class="btn btn-small btn-default" href="{{URL::to($service->link)}}">
                              <i class="fa fa-youtube"></i>
                          </a>
                      @elseif ($service->type == "Instagram")
                          <a class="btn btn-small btn-default" href="{{URL::to($service->link)}}">
                              <i class="fa fa-instagram"></i>
                          </a>
                      @endif
                  @endforeach
                  <br><a class="btn btn-large btn-default" href="{{URL::to('clients/'.$value->id.'/'.'services/')}}">
                      <i class="glyphicon glyphicon-pushpin"></i> Control services
                  </a>
            </td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the nerd (uses the show method found at GET /clients/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('clients/' . $value->id) }}">
                    <i class="fa  fa-user-circle"></i> View
                </a>

                <!-- edit this nerd (uses the edit method found at GET /clients/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('clients/' . $value->id . '/edit') }}">
                    <i class="fa fa-pencil-square-o"></i> Edit
                </a><br>

                <!-- delete the nerd (uses the destroy method DESTROY /clients/{id} -->
                {{ Form::open(array('url' => 'clients/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $clients->links() }}
@endsection
