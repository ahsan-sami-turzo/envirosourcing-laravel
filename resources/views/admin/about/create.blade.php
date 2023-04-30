@extends('layouts.admin')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endpush
@section('content')
<div class="row">
    <div class="col-12">
      <form method="post" action='{{ "#" }}' enctype="multipart/form-data">
        @csrf
          <input name="id" value="{{ isset($about) ? $about->id : '' }}" hidden >
        <div class="card">
            <div class="card-header card_header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title card_title"><i class="fab fa-gg-circle"></i> Add About Information</h4>
                    </div>
{{--                    <div class="col-md-4 text-right">--}}
{{--                        <a href="#" class="btn btn-dark btn-md waves-effect btn-label waves-light card_btn"><i class="fas fa-th label-icon"></i>All Banner</a>--}}
{{--                    </div>--}}
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
                <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">About title:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" name="why_choose_us_title" value="{{old('why_choose_us_title',isset($about) ? $about->why_choose_us_title : '')}}">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">About Subtitle</label>
                    <div class="col-sm-7">
                        <textarea class="summernote" name="sub_title">{{ old('sub_title',isset($about) ? $about->sub_title : '') }}</textarea>
                    </div>

                </div>
                <div class="form-group row mb-3 {{ $errors->has('title') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">About Choose us Subtitle<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" name="title" value="{{old('title', isset($about) ? $about->title : '')}}">
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">About description</label>
                  <div class="col-sm-7">
                      <textarea class="summernote" name="why_choose_us_subtitle">{{ old('why_choose_us_subtitle',isset($about) ? $about->why_choose_us_subtitle : '') }}</textarea>
                  </div>

              </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Why choose us details</label>
                    <div class="col-sm-7">
                        <textarea class="summernote" name="choose_details">{{ old('choose_details',isset($about) ? $about->choose_details : '') }}</textarea>
                    </div>

                </div>



                <div class="form-group row mb-3 {{ $errors->has('num_1') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">About number one<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" name="num_1" value="{{old('num_1', isset($about) ? $about->num_1 : '')}}">
                        @if ($errors->has('num_1'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('num_1') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
              <div class="form-group row mb-3 {{ $errors->has('num_2') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">About number two<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" name="num_2" value="{{old('num_2', isset($about) ? $about->num_2 : '')}}">
                        @if ($errors->has('num_2'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('num_2') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
              <div class="form-group row mb-3 {{ $errors->has('num_3') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">About number three<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" name="num_3" value="{{old('num_3', isset($about) ? $about->num_3 : '')}}">
                        @if ($errors->has('num_3'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('num_3') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
              <div class="form-group row mb-3 {{ $errors->has('num_4') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">About number four<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" name="num_4" value="{{old('num_4', isset($about) ? $about->num_4 : '')}}">
                        @if ($errors->has('num_4'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('num_4') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
              <div class="form-group row mb-3 {{ $errors->has('num_5') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">About number five<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" name="num_5" value="{{old('num_5', isset($about) ? $about->num_5 : '')}}">
                        @if ($errors->has('num_5'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('num_5') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-3 {{ $errors->has('num_1_text') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">About number one text<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" name="num_1_text" value="{{old('num_1_text', isset($about) ? $about->num_1_text : '')}}">
                        @if ($errors->has('num_1_text'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('num_1_text') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-3 {{ $errors->has('num_2_text') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">About number two text<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" name="num_2_text" value="{{old('num_2_text', isset($about) ? $about->num_2_text : '')}}">
                        @if ($errors->has('num_2_text'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('num_2_text') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-3 {{ $errors->has('num_3_text') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">About number three text<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" name="num_3_text" value="{{old('num_3_text', isset($about) ? $about->num_3_text : '')}}">
                        @if ($errors->has('num_3_text'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('num_3_text') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-3 {{ $errors->has('num_4_text') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">About number four text<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" name="num_4_text" value="{{old('num_4_text', isset($about) ? $about->num_4_text : '')}}">
                        @if ($errors->has('num_4_text'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('num_4_text') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-3 {{ $errors->has('num_5_text') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">About number five text<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" name="num_5_text" value="{{old('num_5_text', isset($about) ? $about->num_5_text : '')}}">
                        @if ($errors->has('num_5_text'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('num_5_text') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row mb-3 {{ $errors->has('about_us_image') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">About Image (750 X 450)<span class="req_star">*</span>:</label>
                    <div class="col-sm-4">
                        <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file btnu_browse">
                                Browse… <input type="file" name="about_us_image" id="imgInp">
                            </span>
                        </span>
                            <input type="text" class="form-control" readonly>

                        </div>
                        @if ($errors->has('about_us_image'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('about_us_image') }}</strong>
                        </span>
                        @endif
                        <img id="img-upload" src='{{ isset($about) ? asset("uploads/about/$about->about_us_image") : ''}}'/>
                    </div>
                </div>
                <div class="form-group row mb-3 {{ $errors->has('why_choose_us_background') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">About background image (220 X 490)<span class="req_star">*</span>:</label>
                    <div class="col-sm-4">
                        <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file btnu_browse">
                                Browse… <input type="file" name="why_choose_us_background" id="imgInp-three">
                            </span>
                        </span>
                            <input type="text" class="form-control" readonly>
                        </div>
                        @if ($errors->has('why_choose_us_background'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('why_choose_us_background') }}</strong>
                        </span>
                        @endif
                        <img style="height: 80px; margin-top: 10px" id="img-upload-three" src='{{ isset($about) ? asset("uploads/about/$about->why_choose_us_background") : ''}}'/>
                    </div>
                </div>

            </div>


            <div class="card-footer card_footer text-center">
                <button type="submit" class="btn btn-md btn-dark">UPLOAD</button>
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
