<?php

namespace App\Http\Controllers;

use App\Service;
use App\Client;
use Illuminate\Http\Request;
use Validator;
use Input;
use Session;
use Redirect;
use Html;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($client_id)
    {
      $client = Client::find($client_id);

      $services = Service::where('client_id', $client_id)->get();
      //$services = Service::where('client_id', $client->id)->get();

      // load the view and pass the services
      return view('layouts.services.index', compact('services','client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($client_id)
    {
      $client = Client::findOrFail($client_id);
      return view('layouts.services.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $client_id)
    {
      //validate
      $rules = array(
          'title'               => 'required',
          'description'         => 'required',
          'type'                => 'required',
          'link'                => 'required',
      );
      $validator = Validator::make(Input::all(), $rules);

      //store
      $service = new Service;

      $service->client_id              = $client_id;
      $service->title                  = Input::get('title');
      $service->description            = Input::get('description');

      if (!is_null(Input::get('facebook'))){
          $service->type               = Input::get('facebook');
      }
      elseif (!is_null(Input::get('twitter'))){
          $service->type               = Input::get('twitter');
      }
      elseif (!is_null(Input::get('youtube'))){
          $service->type               = Input::get('youtube');
      }
      elseif (!is_null(Input::get('instagram'))){
          $service->type               = Input::get('instagram');
      }

      $service->link                   = Input::get('link');

      $service->save();

      // redirect
      Session::flash('message', 'Successfully Created the Service!');
      return Redirect::to('clients/'.$client_id.'/services');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($client_id, $id)
    {
      // get the service
      $client = Client::find($client_id);
      $service = Service::find($id);
      return view('layouts.services.show', compact('service', 'client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($client_id, $id)
    {
      // edit the service
      //$client = Client::find($client_id);
      $service = Service::find($id);
      $service->client = Client::where('id',$service->client_id)->first();

      return view('layouts.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update($client_id, $id)
    {
      //validate
      $rules = array(
          'title'               => 'required',
          'description'         => 'required',
          'type'                => 'required',
          'link'                => 'required',
      );
      $validator = Validator::make(Input::all(), $rules);

      //store
      $service = Service::findOrFail($id);

      $service->title                  = Input::get('title');
      $service->description            = Input::get('description');

      if (!is_null(Input::get('facebook'))){
          $service->type               = Input::get('facebook');
      }
      elseif (!is_null(Input::get('twitter'))){
          $service->type               = Input::get('twitter');
      }
      elseif (!is_null(Input::get('youtube'))){
          $service->type               = Input::get('youtube');
      }
      elseif (!is_null(Input::get('instagram'))){
          $service->type               = Input::get('instagram');
      }

      $service->link                   = Input::get('link');

      $service->update();

      // redirect
      Session::flash('message', 'Successfully Updated the Service!');
      return Redirect::to('clients/'.$client_id.'/services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($client_id, $id)
    {
      // delete
      $service = Service::find($id);
      $service->delete();

      // redirect
      Session::flash('message', 'Successfully deleted the Service!');
      return Redirect::to('clients/'.$client_id.'/services');
    }
}
