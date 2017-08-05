<!DOCTYPE html>
<html>
<head>
    <title>PANEL</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('clients') }}">All Clients</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('clients/create') }}">Create a Client</a>
    </ul>
</nav>
<h1>Edit {{ $client->name }}</h1>

<!-- if there are creation errors, they will show here -->
{!! Html::ul($errors->all()) !!}

{!! Form::model($client, array('route' => array('clients.update', $client->id), 'method' => 'PUT')) !!}

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

    {!! Form::submit('Submit!', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}
<br>
</div>
</body>
</html>
