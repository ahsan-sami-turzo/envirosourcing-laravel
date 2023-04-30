<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManagementRequest;
use App\Models\Admin\Management;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $managements = Management::orderBy('id','desc')->get();

        return view('admin.management.index',compact("managements"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.management.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ManagementRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(ManagementRequest $request)
    {

        $data = $request->all();
        if ($request->hasFile('management_image')) {
            $data['management_image'] = doUploadImage('/uploads/management/',$request->file('management_image'));
        }
        $data['slug'] = md5(rand(time(),15));
        Management::create($data);
        $msg = "created a new management";

        return redirect(route('management.index'))->with('success', $msg);
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
     * @param Management $management
     * @return Application|Factory|View
     */
    public function edit(Management $management)
    {
        return view('admin.management.edit',compact('management'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ManagementRequest $request
     * @param Management $management
     * @return Application|Redirector|RedirectResponse
     */
    public function update(ManagementRequest $request, Management $management)
    {
        $data = $request->all();
        if ($request->hasFile('management_image')) {
            @unlink(asset("uploads/management/$management->management_image"));
            $data['management_image'] = doUploadImage('/uploads/management/',$request->file('management_image'));
        }
        $management->update($data);
        $msg = "updated a management";

        return redirect(route('management.index'))->with('success', $msg);
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
