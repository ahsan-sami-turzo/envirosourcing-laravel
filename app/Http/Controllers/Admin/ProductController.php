<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Admin\CompanyCategory;
use App\Models\Admin\SisterConcern;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $products = Product::with('category', 'company')->orderBy('id', 'desc')->get();
        return view('admin.product.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $companies = SisterConcern::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.product.create', compact("categories", 'products', 'companies'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('product_image')) {
            $data['product_image'] = doUploadImage('/uploads/product/', $request->file('product_image'));
        }
        $data['slug'] = md5(rand(time(), 15));
        $data['category_id'] = $request->category_id;
        $data['sisterconcern_id'] = $request->sisterconcern_id;

        $product = Product::create($data);

        CompanyCategory::Create([
            'sisterconcern_id' => $product->sisterconcern_id,
            'category_id' => $product->category_id,
            'product_id' => $product->id
        ]);
        $msg = "created a new product";
        return redirect(route('product.index'))->with('success', $msg);
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
     * @param Product $product
     * @return Application|Factory|View
     */
    public function edit(Product $product)
    {

        $companies = SisterConcern::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.product.edit', compact("categories", 'product', 'companies'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param Product $product
     * @return Application|Redirector|RedirectResponse
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->all();
        if ($request->hasFile('product_image')) {
            @unlink(asset("uploads/showroom/$product->product_image"));
            $data['product_image'] = doUploadImage('/uploads/product/', $request->file('product_image'));
        }
        $data['slug'] = md5(rand(time(), 15));
        $data['category_id'] = $request->category_id;
        $data['sisterconcern_id'] = $request->sisterconcern_id;
        $data['featured'] = (!request()->has('featured') == '1' ? '0' : '1');

        $product->update($data);
        $companyCategory = CompanyCategory::where('product_id', $product->id)->first();
        $companyCategory->update([
            'sisterconcern_id' => $request->sisterconcern_id,
            'category_id' => $request->category_id,
            'product_id' => $product->id
        ]);
        $msg = "Update a new product";
        return redirect(route('product.index'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function softdelete()
    {
        $id = $_POST['modal_id'];
        $product = Product::where('id', $id)->first();
        $dlt = CompanyCategory::where('product_id', $product->id)->first();
        $dlt->delete();
        $soft = $product->delete();

        if ($soft) {
            Session::flash('success_soft', 'value');
            return redirect('product');
        } else {
            Session::flash('error', 'value');
            return redirect('product');
        }
    }

    // single product get where a company category
   /* public function companyCateProduct($id)
    {
        $companyCate = Product::with(['category'], function ($data) use ($id) {
            return $data->where('sisterconcern_id',$id)->first();

        })->where('sisterconcern_id',$id)->get()->groupBy('category_id');
        $company = SisterConcern::where('id', $id)->first();
        return view('front-end.about_new',compact('companyCate','company'));
    }*/
}
