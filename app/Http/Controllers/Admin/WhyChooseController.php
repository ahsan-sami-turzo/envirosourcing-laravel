<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WhyChooseRequest;
use App\Models\Admin\About;
use App\Models\Admin\WhyChoose;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class WhyChooseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $whyChooses = WhyChoose::orderBy('id','desc')->get();

        return view('admin.why_choose.index',compact("whyChooses"));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.why_choose.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param WhyChooseRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $about = About::orderBy('id','desc')->latest()->limit(1)->first();
        $data['slug'] = md5(rand(time(),15));
        WhyChoose::create($data);
        $msg = "created a new Why Choose";

        return redirect(route('why-choose.index'))->with('success', $msg);

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
     * @param WhyChoose $whyChoose
     * @return Application|Factory|View
     */
    public function edit(WhyChoose $whyChoose)
    {
        return view('admin.why_choose.edit',compact('whyChoose'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param WhyChoose $whyChoose
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, WhyChoose $whyChoose)
    {
        $data = $request->all();
        $about = About::orderBy('id','desc')->latest()->limit(1)->first();
        $whyChoose->update($data);
        $msg = "Updated a new Why Choose";
        return redirect(route('why-choose.index'))->with('success', $msg);


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
