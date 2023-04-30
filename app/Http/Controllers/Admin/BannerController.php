<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Admin\Banner;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $banners = Banner::orderBy('id','desc')->get();

        return view('admin.banner.index',compact("banners"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $banner = Banner::orderBy('id','desc')->latest()->limit(1)->first();
        return view('admin.banner.create',compact('banner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BannerRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(BannerRequest $request)
    {
        $data = $request->all();
       if ($data['id'] == null){
           if ($request->hasFile('banner_image')) {
               $data['banner_image'] = doUploadImage('/uploads/banner/',$request->file('banner_image'));
           }
           $data['slug'] = md5(rand(time(),15));
           Banner::create($data);
           $msg = "created a new banner";
       }else{
           $banner = Banner::findOrFail($request->id);
           if ($request->hasFile('banner_image')) {
               @unlink(asset("uploads/banner/$banner->banner_image"));
               $data['banner_image'] = doUploadImage('/uploads/banner/',$request->file('banner_image'));
           }
           $banner->update($data);
           $msg = "created a update banner";
       }

        return redirect(route('banner'))->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
