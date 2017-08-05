@extends('layouts.app')

@section('content')

<h1>{{ $client->title }}

    <!-- edit this nerd (uses the edit method found at GET /clients/{id}/edit -->
    <a class="btn btn-small btn-info" href="{{ URL::to('clients/' . $client->id . '/edit') }}">
        <i class="fa fa-pencil-square-o"></i> Edit
    </a>

    <!-- delete the nerd (uses the destroy method DESTROY /clients/{id} -->
    {{ Form::open(array('url' => 'clients/' . $client->id, 'class' => 'pull-right')) }}
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
            <dt>Description:</dt><dd> {{ $client->description }}</dd>
            <dt>Status:</dt><dd>
                @if ($client->status == 1)
                    {{$clientStatus = "Active"}}
                @else
                    {{$clientStatus = "Pending"}}
                @endif
            </dd>
            <dt>Contact Phone:</dt><dd> {{ $client->contact_phone }}</dd>
            <dt>Contract Start Date:</dt><dd> {{ $client->contract_start_date }}</dd>
            <dt>Contract End Date:</dt><dd> {{ $client->contract_end_date }}</dd>
            <dt>Services:</dt><dd>

                @foreach ($client->services as $service)
                    @if ($service->type == "Facebook")
                        <a class="btn btn-small btn-default" href="{{URL::to('services/'.$service->id)}}">
                            <i class="fa fa-facebook"></i>
                        </a>
                    @elseif ($service->type == "Twitter")
                        <a class="btn btn-small btn-default" href="{{URL::to('services/'.$service->id)}}">
                            <i class="fa fa-twitter"></i>
                        </a>
                    @elseif ($service->type == "Youtube")
                        <a class="btn btn-small btn-default" href="{{URL::to('services/'.$service->id)}}">
                            <i class="fa fa-youtube"></i>
                        </a>
                    @elseif ($service->type == "Instagram")
                        <a class="btn btn-small btn-default" href="{{URL::to('services/'.$service->id)}}">
                            <i class="fa fa-instagram"></i>
                        </a></dd>
                    @endif
                @endforeach
        </dl>
    </div>
@endsection
