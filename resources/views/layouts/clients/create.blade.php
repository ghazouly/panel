@extends('layouts.app')

@section('content')

<h1>Create a Client</h1>

<!-- if there are creation errors, they will show here -->
{!! Html::ul($errors->all()) !!}

{!! Form::open(['route' => 'clients.create']) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', Input::old('title'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', Input::old('description'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('status', 'Status') !!}
        {!! Form::select('status', ['0' => 'Pending', '1' => 'Active'], Input::old('status'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('contact_phone', 'Contact Phone') !!}
        {!! Form::text('contact_phone', Input::old('contact_phone'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('contract_start_date', 'Contract Start Date') !!}
        {!! Form::date('contract_start_date', Input::old('contract_start_date'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('contract_end_date', 'Contract End Date') !!}
        {!! Form::date('contract_end_date', Input::old('contract_end_date'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('services', 'Services') !!}
        <br>
        {!! Form::checkbox('facebook', 'Facebook', Input::old('facebook')) !!} Facebook
        <br>
        {!! Form::checkbox('twitter', 'Twitter', Input::old('twitter')) !!} Twitter
        <br>
        {!! Form::checkbox('youtube', 'Youtube', Input::old('youtube')) !!} Youtube
        <br>
        {!! Form::checkbox('instagram', 'Instagram', Input::old('instagram')) !!} Instagram
    </div>

    {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}
<br>
@endsection
