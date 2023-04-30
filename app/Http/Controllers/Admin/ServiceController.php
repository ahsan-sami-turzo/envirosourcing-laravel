<?php

namespace App\Http\Controllers\Admin;




use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Admin\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $services = Service::orderBy('id','desc')->get();

        return view('admin.service.index',compact("services"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ServiceRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(ServiceRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('services_image')) {
            $data['services_image'] = doUploadImage('/uploads/service/',$request->file('services_image'));
        }
        $data['slug'] = md5(rand(time(),15));
        Service::create($data);
        $msg = "created a new service";

        return redirect(route('service.index'))->with('success', $msg);
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
     * @param Service $service
     * @return Application|Factory|View
     */
    public function edit(Service $service)
    {
        return view('admin.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ServiceRequest $request
     * @param Service $service
     * @return Application|Redirector|RedirectResponse
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $data = $request->all();
        if ($request->hasFile('services_image')) {
            @unlink(asset("uploads/service/$service->services_image"));
            $data['services_image'] = doUploadImage('/uploads/service/',$request->file('services_image'));
        }
        $service->update($data);
        $msg = "created a update service";

        return redirect(route('service.index'))->with('success', $msg);
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
