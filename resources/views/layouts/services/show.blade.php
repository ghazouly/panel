@extends('layouts.app')

@section('content')
  <h1>{{$client->title}}'s {{$service->type}} Service


    <!-- edit this service (uses the edit method found at GET /'clients/'.$service->client_id.'/'.'services/'.$service->id/edit -->
    <a class="btn btn-small btn-info" href="{{ URL::to('clients/'.$service->client_id.'/'.'services/'.$service->id . '/edit') }}">
        <i class="fa fa-pencil-square-o"></i> Edit
    </a>

    <!-- delete the service (uses the destroy method DESTROY /'clients/'.$service->client_id.'/'.'services/'.$service->id -->
    {{ Form::open(array('url' => 'clients/'.$service->client_id.'/'.'services/'.$service->id, 'class' => 'pull-right')) }}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
    {{ Form::close() }}

</h1>
<hr>
<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

    <div class="jumbotron">
        <dl class="dl-horizontal">
            <dt>Description:</dt><dd> {{ $service->description }}</dd>
            <dt>Services:</dt><dd>
                    @if ($service->type == "Facebook")
                        <a class="btn btn-small btn-default" href="{{URL::to('services/'.$service->link)}}">
                            <i class="fa fa-facebook"></i>
                        </a><pre> {{$service->link}} </pre>
                    @elseif ($service->type == "Twitter")
                        <a class="btn btn-small btn-default" href="{{URL::to('services/'.$service->link)}}">
                            <i class="fa fa-twitter"></i>
                        </a><pre> {{$service->link}} </pre>
                    @elseif ($service->type == "Youtube")
                        <a class="btn btn-small btn-default" href="{{URL::to('services/'.$service->link)}}">
                            <i class="fa fa-youtube"></i>
                        </a><pre> {{$service->link}} </pre>
                    @elseif ($service->type == "Instagram")
                        <a class="btn btn-small btn-default" href="{{URL::to('services/'.$service->link)}}">
                            <i class="fa fa-instagram"></i>
                        </a><pre> {{$service->link}} </pre>
                    @endif </dd>
        </dl>
    </div>
@endsection
