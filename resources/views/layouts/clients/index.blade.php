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

<h1>All Clients</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
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
            <th>Services</th>
            <th>Actions</th>
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
                          </a>
                      @endif
                  @endforeach
            </td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the nerd (uses the show method found at GET /clients/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('clients/' . $value->id) }}">
                    <i class="fa  fa-user-circle"></i>
                </a>

                <!-- edit this nerd (uses the edit method found at GET /clients/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('clients/' . $value->id . '/edit') }}">
                    <i class="fa fa-pencil-square-o"></i>
                </a>

                <!-- delete the nerd (uses the destroy method DESTROY /clients/{id} -->
                <a class="btn btn-small btn-danger" href="{{ URL::to('clients/' . $value->id) }}">
                    <i class="fa fa-trash"></i>
                </a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $clients->links() }}

</div>
<script src="https://use.fontawesome.com/324b98195b.js"></script>
</body>
</html>
