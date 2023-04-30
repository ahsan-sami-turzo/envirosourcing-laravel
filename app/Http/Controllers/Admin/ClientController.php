<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\Admin\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $clients = Client::orderBy('id','desc')->get();

        return view('admin.client.index',compact("clients"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClientRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(ClientRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('clients_logo')) {
            $data['clients_logo'] = doUploadImage('/uploads/client/',$request->file('clients_logo'));
        }
        $data['slug'] = md5(rand(time(),15));
        Client::create($data);
        $msg = "created a new Client";

        return redirect(route('client.index'))->with('success', $msg);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Client $client
     * @return Application|Factory|View
     */
    public function edit(Client $client)
    {
        return view('admin.client.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Client $client
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, Client $client)
    {
        $data = $request->all();
        if ($request->hasFile('clients_logo')) {
            @unlink(asset("uploads/client/$client->clients_logo"));
            $data['clients_logo'] = doUploadImage('/uploads/client/',$request->file('clients_logo'));
        }
        $client->update($data);
        $msg = "updated a client";

        return redirect(route('client.index'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
