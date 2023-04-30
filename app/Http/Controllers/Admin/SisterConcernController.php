<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Http\Requests\SisterConcernRequest;
use App\Models\Admin\SisterConcern;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SisterConcernController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $companies = SisterConcern::orderBy('id','asc')->get();

        return view('admin.company.index',compact("companies"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.company.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SisterConcernRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(SisterConcernRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('company_logo')) {
            $data['company_logo'] = doUploadImage('/uploads/company/',$request->file('company_logo'));
        }
        if ($request->hasFile('company_cover_image')) {
            $data['company_cover_image'] = doUploadImage('/uploads/company/',$request->file('company_cover_image'));
        }
        $data['slug'] = md5(rand(time(),15));
        if (count(SisterConcern::all()) > 0){
            $data['type'] = SisterConcern::ORTHER;
        }else{
            $data['type'] = SisterConcern::OWNER;
        }

        SisterConcern::create($data);
        $msg = "created a new Company";
        return redirect(route('company.index'))->with('success', $msg);
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
     * @param SisterConcern $company
     * @return Application|Factory|View
     */
    public function edit(SisterConcern $company)
    {
        return view('admin.company.edit',compact('company'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param SisterConcernRequest $request
     * @param SisterConcern $company
     * @return Application|Redirector|RedirectResponse
     */
    public function update(SisterConcernRequest $request, SisterConcern  $company)
    {
        $data = $request->all();
        if ($request->hasFile('company_logo')) {
            $data['company_logo'] = doUploadImage('/uploads/company/',$request->file('company_logo'));
        }
        if ($request->hasFile('company_cover_image')) {
            $data['company_cover_image'] = doUploadImage('/uploads/company/',$request->file('company_cover_image'));
        }
        $company->update($data);
        $msg = "Update a new Company";
        return redirect(route('company.index'))->with('success', $msg);

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
