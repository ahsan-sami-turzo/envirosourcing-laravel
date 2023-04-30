@extends('layouts.admin')
@push('css')

@endpush
@section('content')
<div class="row">
    <div class="col-12">
      <form method="post" action="{{route('management.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header card_header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title card_title"><i class="fab fa-gg-circle"></i> Management create</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{route('management.index')}}" class="btn btn-dark btn-md waves-effect btn-label waves-light card_btn"><i class="fas fa-th label-icon"></i>All Management list</a>
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
              <div class="form-group row mb-3 {{ $errors->has('name') ? ' has-error' : '' }}">
                  <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control form_control" name="name" value="{{old('name')}}">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                  </div>
              </div>
                <div class="form-group row mb-3 {{ $errors->has('designation') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Designation<span class="req_star">*</span>:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form_control" name="designation" value="{{old('designation')}}">
                        @if ($errors->has('designation'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('designation') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-3 {{ $errors->has('management_image') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Management Image (1000 X 500)<span class="req_star">*</span>:</label>
                    <div class="col-sm-5">
                        <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file btnu_browse">
                                Browse… <input type="file" name="management_image" id="imgInp">
                            </span>
                        </span>
                            <input type="text" class="form-control" readonly>
                        </div>
                        @if ($errors->has('management_image'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('management_image') }}</strong>
                        </span>
                        @endif
                        <img id="img-upload" />
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
