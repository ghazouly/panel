<?php

namespace App\Http\Controllers;

use App\Client;
use App\Service;
use Illuminate\Http\Request;
use Validator;
use Input;
use Session;
use Redirect;
use Html;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // get all the clients
      $clients = Client::latest()->paginate(20);

      foreach ($clients as $client) {
          $client->services = Service::where('client_id',$client->id)->get();
      }
      // load the view and pass the clients
      return view('layouts.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('layouts.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $rules = array(
            'title'               => 'required',
            'description'         => 'required',
            'status'              => 'required|boolval',
            'contact_phone'       => 'required|numeric',
            'contract_start_date' => 'date',
            'contract_end_date'   => 'date'
        );
        $validator = Validator::make(Input::all(), $rules);

        // store
        $client = new Client;
        $client->title                  = Input::get('title');
        $client->description            = Input::get('description');
        $client->status                 = Input::get('status');
        $client->contact_phone          = Input::get('contact_phone');
        $client->contract_start_date    = Input::get('contract_start_date');
        $client->contract_end_date      = Input::get('contract_end_date');

        $client->save();

        if (!is_null(Input::get('facebook'))){
            $service = new Service;
            $service->client_id = $client->id;
            $service->type      = Input::get('facebook');
            $service->save();
        }

        if (!is_null(Input::get('twitter'))){
            $service = new Service;
            $service->client_id = $client->id;
            $service->type      = Input::get('twitter');
            $service->save();
        }

        if (!is_null(Input::get('youtube'))){
            $service = new Service;
            $service->client_id = $client->id;
            $service->type      = Input::get('youtube');
            $service->save();
        }

        if (!is_null(Input::get('instagram'))){
            $service = new Service;
            $service->client_id = $client->id;
            $service->type      = Input::get('instagram');
            $service->save();
        }

        // redirect
        Session::flash('message', 'Successfully Created the Client!');
        return Redirect::to('clients');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the client
        $client = Client::find($id);
        $client->services = Service::where('client_id',$client->id)->get();
        return view('layouts.clients.show', compact('client'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //edit the client.
      $client = Client::find($id);
      $client->services = Service::where('client_id',$client->id)->get();
      return view('layouts.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
      // validate
      $rules = array(
          'title'               => 'required',
          'description'         => 'required',
          'status'              => 'required|boolval',
          'contact_phone'       => 'required|numeric',
          'contract_start_date' => 'date',
          'contract_end_date'   => 'date'
      );
      $validator = Validator::make(Input::all(), $rules);

      // store
      $client = Client::find($id);
      $client->title                  = Input::get('title');
      $client->description            = Input::get('description');
      $client->status                 = Input::get('status');
      $client->contact_phone          = Input::get('contact_phone');
      $client->contract_start_date    = Input::get('contract_start_date');
      $client->contract_end_date      = Input::get('contract_end_date');

      $client->save();

      // redirect
      Session::flash('message', 'Successfully Updated the Client!');
      return Redirect::to('clients/'.$client->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // delete
      $client = Client::find($id);
      $client->delete();

      // redirect
      Session::flash('message', 'Successfully deleted the Client!');
      return Redirect::to('clients');
    }
}
