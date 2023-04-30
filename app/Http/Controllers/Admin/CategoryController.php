<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Admin\SisterConcern;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = Category::with('company')->orderBy('id', 'desc')->get();

        return view('admin.category.index', compact("categories"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $companies = SisterConcern::all();
        return view('admin.category.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data['slug'] = md5(rand(time(), 15));
        Category::create($data);
        $msg = "created a new Category";

        return redirect(route('category.index'))->with('success', $msg);

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
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return Application|Redirector|RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->all();
        $category->update($data);
        $msg = "Updated a new category";
        return redirect(route('category.index'))->with('success', $msg);

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
