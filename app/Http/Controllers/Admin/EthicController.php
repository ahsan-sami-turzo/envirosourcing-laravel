<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EthicRequest;
use App\Models\Admin\Ethic;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class EthicController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $ethic = Ethic::orderBy('id','desc')->latest()->limit(1)->first();

        return view('admin.ethic.create',compact('ethic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EthicRequest $request
     * @return Application|array|RedirectResponse|Redirector
     */
    public function store(EthicRequest $request)
    {
        $data = $request->all();

        if ( $data['id'] == null ){
           // dd($data['id']) ;
            if ($request->hasFile('ethics_image_one')) {
                $data['ethics_image_one'] = doUploadImage('/uploads/ethic/',$request->file('ethics_image_one'));
            }
            if ($request->hasFile('ethics_image_two')) {
                $data['ethics_image_two'] = doUploadImage('/uploads/ethic/',$request->file('ethics_image_two'));
            }
            if ($request->hasFile('ethics_image_three')) {
                $data['ethics_image_three'] = doUploadImage('/uploads/ethic/',$request->file('ethics_image_three'));
            }
            if ($request->hasFile('ethics_cover_image')) {
                $data['ethics_cover_image'] = doUploadImage('/uploads/ethic/',$request->file('ethics_cover_image'));
            }
            $data['slug'] = md5(rand(time(),15));
            //return $data;
            Ethic::create($data);
            $msg = "created a new ethic";
        }else{
              $ethic = Ethic::findOrFail($request->id);
            //return $ethic;
            if ($request->hasFile('ethics_image_one')) {
                @unlink(asset("uploads/ethic/$ethic->ethics_image_one"));
                $data['ethics_image_one'] = doUploadImage('/uploads/ethic/',$request->file('ethics_image_one'));
            }
            if ($request->hasFile('ethics_image_two')) {
                @unlink(asset("uploads/ethic/$ethic->ethics_image_two"));
                $data['ethics_image_two'] = doUploadImage('/uploads/ethic/',$request->file('ethics_image_two'));
            }
            if ($request->hasFile('ethics_image_three')) {
                @unlink(asset("uploads/ethic/$ethic->ethics_image_three"));
                $data['ethics_image_three'] = doUploadImage('/uploads/ethic/',$request->file('ethics_image_three'));
            }
            if ($request->hasFile('ethics_cover_image')) {
                @unlink(asset("uploads/ethic/$ethic->ethics_cover_image"));
                $data['ethics_cover_image'] = doUploadImage('/uploads/ethic/',$request->file('ethics_cover_image'));
            }
            $ethic->update($data);
            $msg = "Updated a ethic";
        }

        return redirect(route('ethic'))->with('success', $msg);
    }
}
