<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\Models\Admin\Location;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $locations = Location::orderBy('id','desc')->get();

        return view('admin.location.index',compact("locations"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LocationRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(LocationRequest $request)
    {
        $data = $request->all();
        $data['slug'] = md5(rand(time(),15));
        Location::create($data);
        $msg = "created a new Location";

        return redirect(route('location.index'))->with('success', $msg);

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
     * @param Location $location
     * @return Application|Factory|View
     */
    public function edit(Location $location)
    {
        return view('admin.location.edit',compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Location $location
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, Location $location)
    {
        $data = $request->all();
        $data['slug'] = md5(rand(time(),15));
        $location->update($data);
        $msg = "Updated a new Location";

        return redirect(route('location.index'))->with('success', $msg);
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
