@extends('layouts.admin')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <form method="post" action="{{route('company.update',$company->id)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card">
                    <div class="card-header card_header">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title card_title"><i class="fab fa-gg-circle"></i> Company Update</h4>
                            </div>
                            <div class="col-md-4 text-right">
                                <a href="{{route('company.index')}}" class="btn btn-dark btn-md waves-effect btn-label waves-light card_btn"><i class="fas fa-th label-icon"></i>All Company list</a>
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
                        <div class="form-group row mb-3 {{ $errors->has('company_name') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">Company name<span class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" name="company_name" value="{{old('company_name',$company->company_name ?: '')}}">
                                @if ($errors->has('company_name'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('company_name') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Company About Title:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" name="company_title_one" value="{{old('company_title_one',$company->company_title_one ?: '')}}">
                            </div>
                        </div>
                        <div class="form-group row mb-3 {{ $errors->has('company_description_one') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">Company About Description<span class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <textarea class="summernote" name="company_description_one">{{ old('company_description_one',$company->company_description_one ?: '') }}</textarea>

                                @if ($errors->has('company_description_one'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('company_description_one') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">What We Offer Title:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" name="company_title_two" value="{{old('company_title_two',$company->company_title_two ?: '')}}">
                            </div>
                        </div>
                        <div class="form-group row mb-3 {{ $errors->has('company_description_two') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">What We Offer Description<span class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <textarea class="summernote" name="company_description_two">{{ old('company_description_two',$company->company_description_two ?: '') }}</textarea>

                                @if ($errors->has('company_description_two'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('company_description_two') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Why Chosse Us Title:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" name="company_title_three" value="{{old('company_title_three',$company->company_title_three ?: '' )}}">
                            </div>
                        </div>
                        <div class="form-group row mb-3 {{ $errors->has('company_description_three') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">Why Chosse Us Description<span class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <textarea class="summernote" name="company_description_three">{{ old('company_description_three',$company->company_description_three ?: '') }}</textarea>

                                @if ($errors->has('company_description_three'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('company_description_three') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Others Title:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" name="company_title_four" value="{{ old('company_title_four',$company->company_title_four ?: '') }}">
                            </div>
                        </div>
                        <div class="form-group row mb-3 {{ $errors->has('company_description_four') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">Others Description<span class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <textarea class="summernote" name="company_description_four">{{ old('company_description_four',$company->company_description_four ?: '') }}</textarea>

                                @if ($errors->has('company_description_four'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('company_description_four') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row mb-3 {{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">Company address<span class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <textarea class="summernote" name="address">{{ old('address',$company->address ?: '') }}</textarea>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Company logo:</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file btnu_browse">
                                Browse… <input type="file" name="company_logo" id="imgInp">
                            </span>
                        </span>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                <img id="img-upload" style="height: 80px !important ; width: 100px !important; margin-top: 10px" src='{{ isset($company) ? asset("uploads/company/$company->company_logo") : '' }}'/>
                            </div>
                        </div>
                        <div class="form-group row mb-3 {{ $errors->has('company_cover_image') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">Company Cover Image (1000 X 460):</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file btnu_browse">
                                Browse… <input type="file" name="company_cover_image" id="imgInp-three">
                            </span>
                        </span>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                @if ($errors->has('company_cover_image'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('company_cover_image') }}</strong>
                        </span>
                                @endif
                                <img style="height: 80px; margin-top: 10px" id="img-upload-three" src='{{ isset($company) ? asset("uploads/company/$company->company_cover_image") : '' }}' />
                            </div>
                        </div>

                    </div>
                    <div class="card-footer card_footer text-center">
                        <button type="submit" class="btn btn-md btn-dark">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 150,

            });
        });

        //Image Upload Script
        $(document).ready(function () {
            $(document).on('change', '.btn-file :file', function () {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function (event, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log)
                        alert(log);
                }

            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img-upload-three').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp-three").change(function () {
                readURL(this);
            });

        });

    </script>
@endpush
