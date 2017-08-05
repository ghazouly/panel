@extends('layouts.app')

@section('content')

<h1>Edit {{ $service->client->title }}'s {{$service->type}} Service</h1>


<!-- if there are creation errors, they will show here -->
{!! Html::ul($errors->all()) !!}

{!! Form::model($service, array('route'=>['clients.services.update', $service->client_id, $service->id], 'method'=>'PUT')) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', Input::old('title'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', Input::old('description'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('services', 'Services') !!}
        <br>
        {!! Form::radio('facebook', 'Facebook', Input::old('facebook')) !!} Facebook
        <br>
        {!! Form::radio('twitter', 'Twitter', Input::old('twitter')) !!} Twitter
        <br>
        {!! Form::radio('youtube', 'Youtube', Input::old('youtube')) !!} Youtube
        <br>
        {!! Form::radio('instagram', 'Instagram', Input::old('instagram')) !!} Instagram
    </div>

    <div class="form-group">
        {!! Form::label('link', 'Link') !!}
        {!! Form::text('link', Input::old('link'), array('class' => 'form-control')) !!}
    </div>


    {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}
<br>
@endsection
