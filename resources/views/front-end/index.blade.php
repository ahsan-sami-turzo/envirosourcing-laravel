@extends('front-end.layout')
@push('css')

@endpush
@section('content')
    @if(isset($banner))
        <section class="banner-section" id="home"
                 style='background:url("{{ isset($banner) ? asset("uploads/banner/$banner->banner_image") : ''}}") no-repeat center center / cover;'>
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12 ">
                        <div class="banner-overly color-green main-bg-color">
                            <div class="banner-bg-image">
                                @if(!empty($banner->title))
                                    <div class="banner-title pt-2 pb-1 color-title-green">
                                        <h1 class="color-white">{{ isset($banner)?$banner->title ?: '' : ''}}
                                        </h1>
                                        <h2 class="color-white">{{ isset($banner)?$banner->sub_title ?: '' : ''}}</h2>
                                    </div>
                                    <div class="banner-sub-title">
                                        <p>{!! isset($banner)?$banner->description ?: '' : '' !!}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @isset($about)
        <section id="about" class="about ">
            <div class="about-title-rotate main-title-color"><h5>About</h5></div>

            <div class="container-fluid">
                <div class="row">
                    @if(!empty($about->about_us_image))
                        <div
                            class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 d-md-none d-lg-none d-xl-block">
                            <div class="text-center about-box-height">
                                <img style='height: 450px; width: 80%; object-fit: cover; ' class="img-fluid" src='{{ isset($about) ? asset("uploads/about/$about->about_us_image") : ''}}' alt="">
                            </div>
                        </div>
                    @endif
                    @if(!empty($about->why_choose_us_title))
                        <div
                            class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 d-md-none d-lg-none d-xl-block pR-0">
                            <div class="about-title-text color-white ">
                                <div class="about-text text-center">
                                    <div style="height: 450px;" class="v-center body-bg-color align-items-center choose_us_title">
                                        <h3>{{ isset($about) ? words($about->why_choose_us_title,12,'...')  : '' }}</h3>
                                           <p style="font-size: 20px">{!!  isset($about) ? words($about->sub_title,110,'....') : '' !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <section class="section section-counters">
            <div class="container-fluid">
                <div class="row">
                    <div
                        class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 d-none d-sm-done d-md-none d-lg-none d-xl-block">
                        <div class="h-65 text-center">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="counter-block is--title color-title-green">
                                        <h3>OUR<br>NUMBERS</h3>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="counter-block text-white bg-color-1">
                                        <div class="counter-border">
                                            @if(!empty($about->num_1))
                                                <span id="count-one"
                                                      class="counter">{{ isset($about) ? $about->num_1 : '' }}</span>
                                            @endif

                                            <p>{{ isset($about) ? $about->num_1_text : '' }}</p></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="counter-block text-white bg-color-2">
                                        <div class="counter-border">
                                        <span id="count-two"
                                              class="counter">{{ isset($about) ? $about->num_2 : '' }}</span>
                                            <p>{{ isset($about) ? $about->num_2_text : '' }}</p></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="counter-block text-white bg-color-3">
                                        <div class="counter-border">
                                        <span id="count-three"
                                              class="counter">{{ isset($about) ? $about->num_3 : '' }}</span> +
                                            <p>{{ isset($about) ? $about->num_3_text : '' }}</p></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="counter-block text-white bg-color-4">
                                        <div class="counter-border">
                                        <span id="count-four" class="counter"
                                              data-js="{{ isset($about) ? $about->num_4 : '' }}">{{ isset($about) ? $about->num_4 : '' }}</span> +
                                            <p>{{ isset($about) ? $about->num_4_text : '' }}</p></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="counter-block text-white bg-color-5">
                                        <div class="counter-border">
                                        <span id="count-five" class="counter"
                                              data-js="{{ isset($about) ? $about->num_5 : '' }}">{{ isset($about) ? $about->num_5 : '' }}</span> +
                                            <p>{{ isset($about) ? $about->num_5_text : '' }}</p></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 d-none d-sm-done d-md-none d-lg-none d-xl-block">
                        <div class="why-choose-box">
                            <div class="box-text h-70">
                                <div class="row">
                                    <div class="col-3 col-sm-2">
                                        <div class="title-rotate_2 color-title-green"><h3>{{ isset($about) ? $about->title : '' }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-9 col-sm-4">
                                        <div class="about-box-img"
                                             style="background-image: url( {{ isset($about) ? asset("uploads/about/$about->why_choose_us_background") : ''}});
                                                 "></div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="why-choose-title">
                                            <h4>{!! isset($about) ? words($about->why_choose_us_subtitle,30,'...')  : ''  !!}</h4>
                                        </div>

                                        <p>{!! isset($about) ? ($about->choose_details)  : ''  !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endisset
    @if(count($services) > 0)
        <section id="service" class="service sHeight-100">
            <div class="about-title-rotate main-title-color"><h5>services</h5></div>
            <div class="container-fluid">
                <div class="box-service">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="service-title main-title-color-two text-center ">
                                <h3>THE FOUNDATION OF ANY COLLECTION</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="section-foundation">
                                <ul class="list-unstyled">
                                    @foreach($services as $service)
                                        <li>
                                            <div class="service-card wow fadeInDown" style="visibility: visible;">
                                                <div class="card-header bdrB-0">
                                                    <div class="card-bg"
                                                         style='background-image: url({{ asset("uploads/service/$service->services_image") }});'></div>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title main-bg-color">{{ words($service->title,6,'....') ?: '' }}</h5>
                                                    <p class="card-text">{!! $service->description ?: '' !!}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if(isset($ownerProduct))
        <section id="product" class="showroom sHeight-100">
            <div class="about-title-rotate main-title-color"><h5>product</h5></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                        <div class="showroom-box height-460">
                            @if(count($ownerProduct->featureProducts) > 0)
                                <div class="row">
                                        <div class="col-12">
                                            <div class="showroom-title color-title-green">

                                            </div>
                                        </div>
                                    @foreach($ownerProduct->featureProducts as $product)
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4 pr-0">
                                                    <div class="product-box text-center mb-3">
                                                        <img class="img-fluid"
                                                             src='{{ asset("uploads/product/$product->product_image") }}'
                                                             alt="">
<!--                                                        <div class="product-box-overly">
                                                            <h4>{{ $product->product_name ?: '' }}</h4>
                                                        </div>-->
                                                    </div>
                                                </div>
                                            @endforeach

                                    </div>
                            @endif
                        </div>


                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                        <div class="showroom-cover-img height-460">
                            <img class="img-fluid" style="object-fit: contain; " src='{{isset($ownerProduct) ? asset("uploads/company/$ownerProduct->company_cover_image") : ''}}' alt="">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="product-all-btn text-center pt-3 pb-3 mt-2">
                            <a class="btn btn-lg main-bg-color border-0" href='{{ isset($ownerProduct) ? url("company-about/$ownerProduct->id" ) : ''}}'>See
                                All Product</a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif
    @if(count($clients) > 0)
        <section id="clients" class="clients">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="client-title text-center">
                            <h3>OUR CLIENTS COME FROM ALL AROUND THE WORLD</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="client-logo">
                            <ul class="list-unstyled list-inline text-center">
                                @foreach($clients as $client)
                                    <li class="logo-image">
                                        <a target="_blank" href="#">
                                            <img width="300" height="100"
                                                 src='{{ asset("uploads/client/$client->clients_logo") }}' alt="">
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif
    @isset($ethic)
        <section id="ethics" class="ethics sHeight-100 pt-5 pb-5">
            <div class="about-title-rotate main-title-color"><h5>ETHICS</h5></div>
            <div class="container-fluid">
                <div class="row">
                    <div
                        class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-block d-sm-block d-md-block d-lg-block under-1400-none">
                        <div class="news-title text-center pb-5 main-title-color-two">
                            <h3>Ethics</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="ethics-padding">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12 col-xl-7">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="ethics-title ">
                                                {{--                                        <h3 class="ethics-background"><span>O</span>BJECTIVES AND <br>PRACTICES</h3>--}}
                                                <h3 class="ethics-background">{!! words($ethic->title_one,3,'...') ?: '' !!}</h3>
                                                {!! (strlen($ethic->subtitle_one) > 200) ?  substr($ethic->subtitle_one,0,500).'...' ?: '' : '' !!}
                                            </div>
                                            <div class="text-center ethics-image text-center">
                                                <img class="img-fluid" style="width:200px; height: 200px; object-fit: cover; margin-top: 20px"
                                                     src='{{ asset("uploads/ethic/$ethic->ethics_image_one") }}'
                                                     alt="image">
                                            </div>
                                            <div class="ethics-padding-right">
                                                <div class="ethics-title ethics-sub-text">
                                                    <h3 class="ethics-background">{{ $ethic->title_four ?: '' }}</h3>
                                                    <p> {!! (strlen($ethic->subtitle_three) > 0) ?  substr($ethic->subtitle_three,0,700) ?: '' : '' !!}
                                                    </p>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="ethics-padding-right ">
                                                <div class="ethics-title ">
                                                    <h3 class="ethics-background">{{ $ethic->title_two ?: '' }}</h3>
                                                        {!! $ethic->subtitle_two !!}


                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 col-xl-5">
                                    <div class="ethics-right-title text-center">
                                        <h3>{{ $ethic->title_three ?: '' }}</h3>
                                    </div>
                                    <div class="ethics-right-image text-center pt-2">
                                        <img  class="img-fluid"
                                             src='{{ asset("uploads/ethic/$ethic->ethics_image_two") }}'
                                             alt="image">
                                    </div>
                                    <div class="ethics-right-image-two mt-5"
                                         style='background-image: url("{{ asset("uploads/ethic/$ethic->ethics_image_three") }}");'>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="ethics-cover-image"
                         style='background-image: url("{{ asset("uploads/ethic/$ethic->ethics_cover_image")  }} ");'>
                    </div>
                </div>

            </div>
        </section>
    @endisset
    @if(count($sisterConcerns) > 0)
        <section id="sister-concern" class="products sHeight-100 pt-5 pb-5">
            <div class="about-title-rotate main-title-color"><h5>Our Sister Concern</h5></div>
            <div class="container-fluid">
                <div class="row">
                    <div
                        class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-block d-sm-block d-md-block d-lg-block under-1400-none">
                        <div class="news-title main-title-color-two text-center pb-5">
                            <h3>Our sister concer</h3>
                        </div>
                    </div>
                </div>
                @foreach( $sisterConcerns as $sisterConcern)
                    <div class="row pt-3 pb-3 {{ $loop->iteration % 2 == 0 ? 'gray-color-one' : 'gray-color-two' }} ">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 pt-3 pb-3 {{ $loop->iteration % 2 == 0 ? 'order-0' : 'order-1' }}">
                            <div class="product-list">
{{--                                <h3 class="mb-3">Company Products list</h3>--}}
                                @if(count($sisterConcern->companyCategories) > 0)
                                   {{-- @foreach($sisterConcern->companyCategories as $category)
                                        <div class="mb-2">
                                            <h5>{{ $category->name ?: '' }}</h5>
                                        </div>

                                        <div class="row">
                                            @foreach( $category->categoryProducts as $product)
                                                <div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-3">
                                                    <div class="product-box text-center mb-2">
                                                        <img class="img-fluid"
                                                             src='{{ asset("uploads/product/$product->product_image") }}'
                                                             alt="">
                                                        <div class="product-box-overly">
                                                            <h4>{{ $product->product_name ?: '' }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                    @endforeach--}}
                                     @endif
                                <img style="object-fit: cover; height: 350px; width: 100%" class="img-fluid" src='{{ asset("uploads/company/$sisterConcern->company_cover_image") }}' alt="">

                            </div>

                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 pt-3 pb-3 {{ $loop->iteration % 2 == 0 ? 'order-1' : 'order-0' }}">
                            <div class="company-name mb-3">
{{--                                <ul>--}}
{{--                                    <li><a href="#"><img class="img-fluid"--}}
{{--                                                         src=''--}}
{{--                                                         alt="logo"><span></span></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
                                <div class="media">
                                    <img src='{{ asset("uploads/company/$sisterConcern->company_logo") }}' class="mr-3 img-fluid" alt="...">
                                    <div class="media-body sis-title">
                                        <a href='{{ url("company-about/$sisterConcern->id") }}'> <h5 class="mt-0">{{ words($sisterConcern->company_name,6,'...') ?: '' }}</h5></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-description-text">
                                <h6> {{ $sisterConcern->company_title_one ?: '' }}</h6>
                                <p>{!! words($sisterConcern->company_description_one,150,'...') !!}</p>
                                <br>

                                <a href='{{ url("company-about/$sisterConcern->id") }}'
                                   class="details-btn body-bg-color mt-4 border-0">Details</a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
    @if( isset($management))
        <section id="management" class="management sHeight-100">
            <div class="about-title-rotate main-title-color"><h5>Management</h5></div>
            <div class="container-fluid">
                <div class="box">
                    <div class="row">
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-block d-sm-block d-md-block d-lg-block d-xl-block">
                            <div class="management-title main-title-color-two text-center mb-4">
                                <h3>KNOW WHO WILL SUPPORT YOU</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div style='background-image:url("{{ asset("uploads/management/$management->management_image") }}"); ' class="management-img text-center mb-4">


                                </div>
                            </div>
                    </div>

                </div>

            </div>
        </section>
    @endif
    @if( count($newsIndustries) > 0)
        <section id="industry" class="industry sHeight-100 pt-3">
            <div class="about-title-rotate main-title-color"><h5>Industry News</h5></div>
            <div class="box">
                <div class="container-fluid">
                    <div class="row">
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-block d-sm-block d-md-block d-lg-block under-1400-none">
                            <div class="news-title main-title-color-two text-center pb-5">
                                <h3>Industry News</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach( $newsIndustries as $newsIndustry)
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                <a href='{{ url("$newsIndustry->link") }}' target="_blank">
                                    <div class="industry-block">
                                        <img style="object-fit: cover;" class="img-fluid"
                                             src='{{ asset("uploads/news/$newsIndustry->news_image") }}'
                                             alt="">

                                        <div class="industry-block-text main-bg-color">
                                            <p>{!! words($newsIndustry->title,50,'..') !!}</p>
                                        </div>
                                        <div class="industry-block-btn">
                                            <p>{{  date('F d, Y', strtotime($newsIndustry->created_at)) }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if( count($newsCompanies) > 0)
        <section id="news" class="news pt-5 pb-5 ">
            <div class="about-title-rotate main-title-color"><h5>Company News</h5></div>
            <div class="box">
                <div class="container-fluid">
                    <div class="row">
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-block d-sm-block d-md-block d-lg-block under-1400-none">
                            <div class="news-title main-title-color-two text-center pb-5">
                                <h3>Company News</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row owl-carousel">
                        @foreach( $newsCompanies as $newsCompany)
                            <a style="text-decoration: none !important;" href="{{ $newsCompany->link ?: '' }}" target="_blank">
                            <div class="news-block">
                                <div class="news-image-box">
                                    @if($newsCompany->url)
                                    <iframe width="100%" height="200px" src='{{ $newsCompany->url }}' title="video-title"></iframe>
                                    @else
                                        <img style="object-fit: cover;" class="img-fluid"
                                         src='{{ asset("uploads/news/$newsCompany->news_image") }}'
                                         alt="image">
                                    @endif
                                </div>
                                <div class="news-block-title">
                                    <h5>{!! words($newsCompany->title,9,'...') !!}</h5>
                                    <small> {{  date('F d, Y', strtotime($newsCompany->created_at)) }}</small>
                                    <p>{!! words($newsCompany->description,100,'...') !!}</p>
                                </div>
                            </div>
                            </a>
                        @endforeach
                    </div>

                    <!--            <div class="row owl-carousel">
                                    <div class="news-block">
                                        <div class="news-image-box">
                                            <img class="img-fluid"
                                                 src="http://www.synergiesworldwide.com/wp-content/uploads/2016/02/manfacturing-750x430.jpg"
                                                 alt="image">
                                        </div>
                                        <div class="news-block-title">
                                            <h5>Core USA Inc. Opens new office in Toronto</h5>
                                            <small> December 8, 2017</small>
                                            <p>Import and Supply Chain Management Firm enters the Canadian market Toronto, ON, December 8,
                                                2017: Earlier this year, the American company Core USA Inc. acted in plans to expand its
                                                horizons by entering the Canadian market and opening an office in Toronto. Core USA is an
                                                importer of clothing, accessories, household textiles, shoes and household […]</p>
                                        </div>
                                    </div>
                                    <div class="news-block">
                                        <div class="news-image-box">
                                            <img class="img-fluid"
                                                 src="http://www.synergiesworldwide.com/wp-content/uploads/2016/02/manfacturing-750x430.jpg"
                                                 alt="image">
                                        </div>
                                        <div class="news-block-title">
                                            <h5>Core USA Inc. Opens new office in Toronto</h5>
                                            <small> December 8, 2017</small>
                                            <p>Import and Supply Chain Management Firm enters the Canadian market Toronto, ON, December 8,
                                                2017: Earlier this year, the American company Core USA Inc. acted in plans to expand its
                                                horizons by entering the Canadian market and opening an office in Toronto. Core USA is an
                                                importer of clothing, accessories, household textiles, shoes and household […]</p>
                                        </div>
                                    </div>
                                    <div class="news-block">
                                        <div class="news-image-box">
                                            <img class="img-fluid"
                                                 src="http://www.synergiesworldwide.com/wp-content/uploads/2016/02/manfacturing-750x430.jpg"
                                                 alt="image">
                                        </div>
                                        <div class="news-block-title">
                                            <h5>Core USA Inc. Opens new office in Toronto</h5>
                                            <small> December 8, 2017</small>
                                            <p>Import and Supply Chain Management Firm enters the Canadian market Toronto, ON, December 8,
                                                2017: Earlier this year, the American company Core USA Inc. acted in plans to expand its
                                                horizons by entering the Canadian market and opening an office in Toronto. Core USA is an
                                                importer of clothing, accessories, household textiles, shoes and household […]</p>
                                        </div>
                                    </div>
                                    <div class="news-block">
                                        <div class="news-image-box">
                                            <img class="img-fluid"
                                                 src="http://www.synergiesworldwide.com/wp-content/uploads/2016/02/manfacturing-750x430.jpg"
                                                 alt="image">
                                        </div>
                                        <div class="news-block-title">
                                            <h5>Core USA Inc. Opens new office in Toronto</h5>
                                            <small> December 8, 2017</small>
                                            <p>Import and Supply Chain Management Firm enters the Canadian market Toronto, ON, December 8,
                                                2017: Earlier this year, the American company Core USA Inc. acted in plans to expand its
                                                horizons by entering the Canadian market and opening an office in Toronto. Core USA is an
                                                importer of clothing, accessories, household textiles, shoes and household […]</p>
                                        </div>
                                    </div>
                                    <div class="news-block">
                                        <div class="news-image-box">
                                            <img class="img-fluid"
                                                 src="http://www.synergiesworldwide.com/wp-content/uploads/2016/02/manfacturing-750x430.jpg"
                                                 alt="image">
                                        </div>
                                        <div class="news-block-title">
                                            <h5>Core USA Inc. Opens new office in Toronto</h5>
                                            <small> December 8, 2017</small>
                                            <p>Import and Supply Chain Management Firm enters the Canadian market Toronto, ON, December 8,
                                                2017: Earlier this year, the American company Core USA Inc. acted in plans to expand its
                                                horizons by entering the Canadian market and opening an office in Toronto. Core USA is an
                                                importer of clothing, accessories, household textiles, shoes and household […]</p>
                                        </div>
                                    </div>
                                </div>-->
                </div>
            </div>
        </section>
    @endif
    @isset($banner)
        <section id="contact" class="locations">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3649.88350569734!2d90.3634099!3d23.8227412!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1397464ee91%3A0x223bc2347abaeede!2sEnviro%20Sourcing%20Limited!5e0!3m2!1sen!2sbd!4v1643793557355!5m2!1sen!2sbd" width="100%" height="470" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="locations pt-5">
            <div class="container-fluid">
                <div class="row justify-content-md-center">
                    <div class="col-md-5">
                        <div class="map">
                            <div class="contact-form-box bg-light pt-3 pb-5 height-460">
                                <div class="contact-title text-center text-capitalize">
                                    <h5>Contact Details</h5>
                                </div>
                                <div class="contact-address p-5 text-center">
                                    <h6 style="font-size: 26px">{{ isset($ownerProduct) ? $ownerProduct->company_name : '' }}</h6>
                                    <address class="pt-1">
                                    HOUSE-08, GROUND FLOOR, ROAD-01, BLOCK-B, <br>
                                    SECTION-12,MIRPUR,DHAKA-1216,BANGLADESH <br>
                                    +880 1885-937671,01880-198391, 017-23613769 <br>
                                     <a href="mailto:info@envsourcing">info@envsourcing</a>.<br>
                                     <a href='{{ url("/") }}'>www.envsourcing.com</a>.<br>

                                    </address>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-5 pl-0">
                        <div class="contact-form-box bg-light pt-3 pb-5 height-460">
                            <div class="contact-title text-center text-capitalize">
                                <h5>get in touch</h5>
                            </div>
                            @if(Session::has('success'))
                                <div class="alert alert-success alertsuccess" role="alert">
                                    <strong>Success!</strong> {{Session::get('success')}}
                                </div>
                            @endif
                            <div class="contact-form p-3">
                                <form action='{{ route("receive.mail") }}' method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="subject" class="form-label">Subject </label>
                                        <input type="text" class="form-control" id="subject" placeholder="" value="" name="subject">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Send your message</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                                    </div>
                                    <div class="col-auto float-right">
                                        <button type="submit" class="btn btn-lg main-bg-color mb-3 border-0 text-dark">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
    @endisset
@endsection
@push('scripts')

@endpush

