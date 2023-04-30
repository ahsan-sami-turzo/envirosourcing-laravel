<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowroomRequest;
use App\Models\Admin\Location;
use App\Models\Admin\Showroom;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ShowroomController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $showroom = Showroom::orderBy('id','desc')->latest()->limit(1)->first();
        $locations = Location::orderBy('id', 'desc')->get();
        return view('admin.showroom.create',compact("showroom",'locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ShowroomRequest $request
     * @return Application
     */
    public function store(ShowroomRequest $request)
    {
        $data = $request->all();
        if ($data['id'] == null){
            if ($request->hasFile('showrooms_image')) {
                $data['showrooms_image'] = doUploadImage('/uploads/showroom/',$request->file('showrooms_image'));
            }
            $data['slug'] = md5(rand(time(),15));
            Showroom::create($data);
            $msg = "created a new showroom";
        }else{
            $showroom = Showroom::findOrFail($request->id);
            if ($request->hasFile('showrooms_image')) {
                @unlink(asset("uploads/showroom/$showroom->showrooms_image"));
                $data['showrooms_image'] = doUploadImage('/uploads/showroom/',$request->file('showrooms_image'));
            }
            $showroom->update($data);
            $msg = "updated a new showroom";
        }

        return redirect(route('showroom'))->with('success', $msg);
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
