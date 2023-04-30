<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {

        $about = About::orderBy('id','desc')->latest()->limit(1)->first();

        return view('admin.about.create', compact('about'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($data['id'] == null){
            if ($request->hasFile('about_us_image')) {
                $data['about_us_image'] = doUploadImage('/uploads/about/',$request->file('about_us_image'));
            }
            if ($request->hasFile('why_choose_us_background')) {
                $data['why_choose_us_background'] = doUploadImage('/uploads/about/',$request->file('why_choose_us_background'));
            }
            $data['slug'] = md5(rand(time(),15));
            About::create($data);
            $msg = "created a new about";
        }else{
            $about = About::findOrFail($request->id);
            if ($request->hasFile('about_us_image')) {
                @unlink(asset("uploads/about/$about->about_us_image"));
                $data['about_us_image'] = doUploadImage('/uploads/about/',$request->file('about_us_image'));
            }
            if ($request->hasFile('why_choose_us_background')) {
                @unlink(asset("uploads/about/$about->why_choose_us_background"));
                $data['why_choose_us_background'] = doUploadImage('/uploads/about/',$request->file('why_choose_us_background'));
            }
            $about->update($data);
            $msg = "updated a new about";
        }

        return redirect(route('about'))->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
