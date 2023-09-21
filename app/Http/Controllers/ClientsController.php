<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index',compact('clients'));
    }
    public function show()
    {
        $clients = Client::all();
        return view('clients.index',compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $clients = new Client;
        $clients->name=$request->name;
        $clients->email=$request->email;
        $clients->address=$request->address;
        $clients->city=$request->city;
        $clients->notes=$request->notes;
        $clients->save();
        return redirect('/clients/index')->with('success','clients created succesfully');
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit',compact('client'));
    }

    public function update(Request $request, $id)
    {
        $clients = Client::find($id);
        $clients->name=$request->name;
        $clients->email=$request->email;
        $clients->address=$request->address;
        $clients->city=$request->city;
        $clients->notes=$request->notes;
        $clients->update();
        return redirect('/clients/index')->with('success','clients updated succesfully');
    }

    public function destroy($id)
    {
        $clients =Client::find($id);
        $clients->delete();
        return redirect('/clients/index');
    }

}
