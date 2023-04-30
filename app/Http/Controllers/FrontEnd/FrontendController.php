<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Admin\Banner;
use App\Models\Admin\Client;
use App\Models\Admin\Ethic;
use App\Models\Admin\Management;
use App\Models\Admin\News;
use App\Models\Admin\Service;
use App\Models\Admin\SisterConcern;
use App\Models\Admin\WhyChoose;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index()
    {
        $banner = Banner::orderBy('id', 'desc')->where('status', 1)->first();
        $services = Service::orderBy('id', 'asc')->where('status', 1)->get();
        $ownerProduct = SisterConcern::where('type', SisterConcern::OWNER)->with('featureProducts')->orderBy('id', 'asc')->first();
        $categories = Category::with('ownerProducts')->where('status', 1)->limit(3)->get();
        $clients = Client::where('status', 1)->orderBy('id', 'asc')->get();
        $ethic = Ethic::orderBy('id', 'asc')->where('status', 1)->first();
        $management = Management::where('status', 1)->orderBy('id', 'desc')->first();
        $newsIndustries = News::where('type', 101)->where('status', 1)->orderBy('id', 'desc')->get();
        $newsCompanies = News::where('type', 100)->where('status', 1)->orderBy('id', 'desc')->get();
        $sisterConcerns = SisterConcern::where('type', SisterConcern::ORTHER)->with('companyCategories.categoryProducts')->orderBy('id', 'asc')->get();
        $about = About::orderBy('id', 'desc')->latest()->limit(1)->first();
        $whyChooses = WhyChoose::orderBy('id', 'desc')->limit(5)->get();


        return view("front-end.index", compact("banner", 'services', 'ownerProduct', 'categories', 'clients', 'ethic', 'management', 'newsIndustries', 'newsCompanies', 'sisterConcerns', 'about', 'whyChooses'));

    }

    public function page($slug)
    {

        $company = SisterConcern::with(['companyCategories' => function ($data) use ($slug) {
           return $data->wherePivot('sisterconcern_id',$slug)->with(['categoryProducts' => function ($q) use ($slug) {
               return $q->where('sisterconcern_id',$slug);
           }]);
       }])->where('id', $slug)->firstOrFail();
        return view('front-end.about', compact('company'));
    }

    public function sendMail(Request $request)
    {
        Mail::send('front-end.mail', array(
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get('message'),
        ), function ($message) use ($request) {
            $message->from($request->email);
            $message->to('info@envsourcing.com', 'envsourcing.com')->subject($request->get('subject'));
        });

        return redirect('/#contact')->with('success', 'We have received your message and would like to thank you for writing to us.');

    }
//->where('sisterconcern_id',$id)

}
