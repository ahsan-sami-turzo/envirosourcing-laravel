@extends('front-end.layout')
@push('css')
<style>

</style>
@endpush
@section('content')
    <section id="about-page" class="about-page pt-5 pb-5 mb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 ">
                    <div class="about-logo-area">
                        <div class="about-page-logo">
                            <img class="img-fluid" src='{{ asset("uploads/company/$company->company_logo") }}'>
                        </div>
                        <div class="about-page-title pt-4">
                            <h2>{{ $company->company_name ?: '' }}</h2>
                        </div>
                        <div class="clearfix"></div>
                        <div class="about-page-subtitle pt-5 pb-2">
                            <h3>{{ $company->company_title_one ?: '' }}</h3>
                            <p>
                                {!! $company->company_description_one  !!}
                            </p>
                        </div>
                    </div>

                </div>
              <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 pl-0 d-none d-sm-none d-md-none d-lg-block d-xl-block">
                    <div class="about-page-bg-1">
                        <div class="gray-overly">
                            <img class="img-fluid" src="{{ asset("uploads/company/$company->company_cover_image") }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 pr-0 pl-0 d-block d-sm-block d-md-block d-lg-none d-xl-none">
                    <img class="img-fluid pt-2" src='{{ asset("uploads/company/$company->company_cover_image") }}' alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="we-offer-width float-left">
                            <div class="about-logo-area">
                                <div class="what-offer-title about-page-title">
                                    <h2>{{ $company->company_title_two ?: '' }}</h2>
                                </div>
                                <div class="offer-list">
                                    <p>{!! $company->company_description_two !!}</p>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="we-offer-width float-right">
                        <div class="about-logo-area">
                            <div class="what-offer-title about-page-subtitle pt-2">
                                <h3>{{ $company->company_title_three ?: '' }}</h3>
                            </div>
                            <div class="offer-list">
                                <p>{!! $company->company_description_three ?: '' !!}</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="we-offer-width float-right">
                        <div class="about-logo-area">
                            <div class="what-offer-title about-page-subtitle pt-2">
                                <h3>{{ $company->company_title_four ?: '' }}</h3>
                            </div>
                            <div class="offer-list">
                                <p>{!! $company->company_description_four ?: '' !!}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

<!--    <section>
        <div class="container-fluid">
           <div class="row">
                <div class="col-md-4">
                    <div class="about-logo-area">
                        <div class="what-offer-title about-page-title">
                            <h2>{{ $company->company_title_two ?: '' }}</h2>
                        </div>
                        <div class="offer-list">
                            <p>{!! $company->company_description_two !!}</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-5">
                    <div class="about-logo-area">
                        <div class="what-offer-title about-page-subtitle pt-2">
                            <h3>{{ $company->company_title_three ?: '' }}</h3>
                        </div>
                        <div class="offer-list">
                            <p>{!! $company->company_description_three ?: '' !!}</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>-->

      @if(count($companyCate) > 0)
          <section id="about-page-products" class="pb-5">
              <div class="container-fluid">
                  @foreach( $companyCate as  $data )
                          <div class="row-product-img pb-5">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="product-category-name text-center pt-4 pb-4">
                                          <span>{{ $data ?: '' }}</span>
                                      </div>
                                  </div>
                              </div>

                                  <div class="row">
                                          <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                             <div class="category-product-card text-center" style='background: url("{{ asset("uploads/product/$data[0]->product_image") }}") no-repeat center center /cover;'>
                                                  <div class="product-category-overly">
                                                      <h3>{{ $data[0]->product_name ?: '' }}</h3>
                                                  </div>
                                              </div>
                                          </div>

                                  </div>

                          </div>
                  @endforeach

              </div>
          </section>
      @endif

    <section id="contact-details">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-details-area">
                        <div class="company-contact-details text-center">
                            <h2>CONTRACT DETAILS</h2>
                            <h3 class="pb-3">BANGLADESH OFFICE</h3>
                            <div>
                               {!! $company->address !!}
                            <!--                                <ul>
                                    <li><i class="fa fa-map-marke"></i>HOUSE-08, GROUND FLOOR, ROAD-01, BLOCK-B, <br>
                                        SECTION-12,MIRPUR,DHAKA-1216,BANGLADESH</li>
                                    <li>+880 1885-937671,01880-198391, 017-23613769</li>
                                    <li>info@envsourcing</li>
                                    <li>www.envsourcing.com</li>
                                </ul>-->

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {

    });
</script>
@endpush



