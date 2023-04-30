@extends('layouts.admin')
@push('css')

@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <form method="post" action="{{route('why-choose.update',$whyChoose->id)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card">
                    <div class="card-header card_header">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title card_title"><i class="fab fa-gg-circle"></i> Why Choose update</h4>
                            </div>
                            <div class="col-md-4 text-right">
                                <a href="{{route('why-choose.index')}}" class="btn btn-dark btn-md waves-effect btn-label waves-light card_btn"><i class="fas fa-th label-icon"></i>All Why Choose  list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-7">
                                @if(Session::has('success'))
                                    <div class="alert alert-success alertsuccess" role="alert">
                                        <strong>Success!</strong> {{Session::get('success')}}
                                    </div>
                                @endif
                                @if(Session::has('error'))
                                    <div class="alert alert-danger alerterror" role="alert">
                                        <strong>Opps!</strong> {{Session::get('error')}}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="form-group row mb-3 {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">Title (100 letters)<span class="req_star">*</span>:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control form_control" name="title" value="{{old('title',$whyChoose->title ?: '')}}" placeholder="Why choose name here">
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="card-footer card_footer text-center">
                        <button type="submit" class="btn btn-md btn-dark">SUBMIT</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
