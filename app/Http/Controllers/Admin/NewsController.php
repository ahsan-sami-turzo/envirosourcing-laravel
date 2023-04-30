<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\Admin\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $news = News::orderBy('id','desc')->get();

        return view('admin.news.index',compact("news"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsRequest $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(NewsRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('news_image')) {
            $data['news_image'] = doUploadImage('/uploads/news/',$request->file('news_image'));
        }
        $data['slug'] = md5(rand(time(),15));
        News::create($data);
        $msg = "created a new news";

        return redirect(route('news.index'))->with('success', $msg);
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
     * @param News $news
     * @return Application|Factory|View
     */
    public function edit(News $news)
    {
        return view('admin.news.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param News $news
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, News $news)
    {
        $data = $request->all();
        if ($request->hasFile('news_image')) {
            @unlink(asset("uploads/news/$news->news_image"));
            $data['news_image'] = doUploadImage('/uploads/news/',$request->file('news_image'));
        }
        $news->update($data);
        $msg = "created a update news";

        return redirect(route('news.index'))->with('success', $msg);
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
