@extends('layouts.app')

@section('content')

<h1> {{$client->title}}'s Services

    <!-- edit this service (uses the edit method found at GET /clients/{id}/edit -->
    <a class="btn btn-small btn-default" href="{{ URL::to('clients/' . $client->id . '/services/create') }}">
        <i class="glyphicon glyphicon-play"></i> Add Service
    </a>

</h1>

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
            <th>Service Link</th>
            <th>Service Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($services as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->description }}</td>
            <td>
                  @if ($value->type == "Facebook")
                      <a class="btn btn-small btn-default" href="{{URL::to($value->link)}}">
                          <i class="fa fa-facebook"></i>
                      </a>
                  @elseif ($value->type == "Twitter")
                      <a class="btn btn-small btn-default" href="{{URL::to($value->link)}}">
                          <i class="fa fa-twitter"></i>
                      </a>
                  @elseif ($value->type == "Youtube")
                      <a class="btn btn-small btn-default" href="{{URL::to($value->link)}}">
                          <i class="fa fa-youtube"></i>
                      </a>
                  @elseif ($value->type == "Instagram")
                      <a class="btn btn-small btn-default" href="{{URL::to($value->link)}}">
                          <i class="fa fa-instagram"></i>
                      </a>
                  @endif
            </td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the service (uses the show method found at GET /'clients/'.$value->client_id.'/'.'services/'.$value->id -->
                <a class="btn btn-small btn-success" href="{{ URL::to('clients/'.$value->client_id.'/'.'services/'.$value->id) }}">
                    <i class="fa  fa-user-circle"></i> View
                </a>

                <!-- edit this service (uses the edit method found at GET /'clients/'.$value->client_id.'/'.'services/'.$value->id/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('clients/'.$value->client_id.'/'.'services/'.$value->id . '/edit') }}">
                    <i class="fa fa-pencil-square-o"></i> Edit
                </a>

                <!-- delete the service (uses the destroy method DESTROY /'clients/'.$value->client_id.'/'.'services/'.$value->id -->
                {{ Form::open(array('url' => 'clients/'.$value->client_id.'/'.'services/'.$value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
