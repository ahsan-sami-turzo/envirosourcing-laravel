@extends('layouts.admin')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endpush
@section('content')
<div class="row">
    <div class="col-12">
      <form method="post" action='{{ "#" }}' enctype="multipart/form-data">
        @csrf
          <input name="id" value="{{ isset($ethic) ? $ethic->id : '' }}" hidden >
        <div class="card">
            <div class="card-header card_header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title card_title"><i class="fab fa-gg-circle"></i> Add Ethic Information</h4>
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
              <div class="form-group row mb-3 {{ $errors->has('title_one') ? ' has-error' : '' }}">
                  <label class="col-sm-3 col-form-label col_form_label">Ethics Title First<span class="req_star">*</span>:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control form_control" name="title_one" value="{{old('title_one', isset($ethic) ? $ethic->title_one : '')}}">
                    @if ($errors->has('title_one'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title_one') }}</strong>
                        </span>
                    @endif
                  </div>
              </div>
                <div class="form-group row mb-3 {{ $errors->has('title_two') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Ethics Title Second<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" name="title_two" value="{{old('title_two', isset($ethic) ? $ethic->title_two : '')}}">
                        @if ($errors->has('title_two'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title_two') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-3 {{ $errors->has('title_three') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Ethics Title Third<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" name="title_three" value="{{old('title_three',isset($ethic) ? $ethic->title_three : '')}}">
                        @if ($errors->has('title_three'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title_three') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-3 {{ $errors->has('title_four') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Ethics Title Forth<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" name="title_four" value="{{old('title_four', isset($ethic) ? $ethic->title_four : '')}}">
                        @if ($errors->has('title_four'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title_four') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
              <div class="form-group row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Ethic First Description</label>
                  <div class="col-sm-7">
                      <textarea class="summernote" name="subtitle_one">{{ old('subtitle_one', isset($ethic) ? $ethic->subtitle_one : '') }}</textarea>
                  </div>
              </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Ethic Second Description</label>
                    <div class="col-sm-7">
                        <textarea class="summernote" name="subtitle_two">{{ old('subtitle_two', isset($ethic) ? $ethic->subtitle_two : '') }}</textarea>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Ethic Three Description</label>
                    <div class="col-sm-7">
                        <textarea class="summernote" name="subtitle_three">{{ old('subtitle_three', isset($ethic) ? $ethic->subtitle_three : '') }}</textarea>
                    </div>
                </div>


              <div class="form-group row mb-3 {{ $errors->has('ethics_image_one') ? ' has-error' : '' }}">
                  <label class="col-sm-3 col-form-label col_form_label">Ethic Image First<span class="req_star">*</span>:</label>
                  <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file btnu_browse">
                                Browse… <input type="file" name="ethics_image_one" id="imgInp-one">
                            </span>
                        </span>
                        <input type="text" class="form-control" readonly>
                    </div>
                    @if ($errors->has('ethics_image_one'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ethics_image_one') }}</strong>
                        </span>
                    @endif
                    <img style="height: 80px; margin-top: 10px" id="img-upload-one" src='{{ isset($ethic->ethics_image_one) ? asset("uploads/ethic/$ethic->ethics_image_one") : ''}}'/>
                  </div>
              </div>

                <div class="form-group row mb-3 {{ $errors->has('ethics_image_two') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Ethic Image Second<span class="req_star">*</span>:</label>
                    <div class="col-sm-4">
                        <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file btnu_browse">
                                Browse… <input type="file" name="ethics_image_two" id="imgInp-two">
                            </span>
                        </span>
                            <input type="text" class="form-control" readonly>
                        </div>
                        @if ($errors->has('ethics_image_two'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ethics_image_two') }}</strong>
                        </span>
                        @endif
                        <img style="height: 80px; margin-top: 10px" id="img-upload-two" src='{{ isset($ethic->ethics_image_two) ? asset("uploads/ethic/$ethic->ethics_image_two") : ''}}'/>
                    </div>
                </div>
                <div class="form-group row mb-3 {{ $errors->has('ethics_image_three') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Ethic Image Third<span class="req_star">*</span>:</label>
                    <div class="col-sm-4">
                        <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file btnu_browse">
                                Browse… <input type="file" name="ethics_image_three" id="imgInp-three">
                            </span>
                        </span>
                            <input type="text" class="form-control" readonly>
                        </div>
                        @if ($errors->has('ethics_image_three'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ethics_image_three') }}</strong>
                        </span>
                        @endif
                        <img style="height: 80px; margin-top: 10px" id="img-upload-three" src='{{ isset($ethic->ethics_image_three) ? asset("uploads/ethic/$ethic->ethics_image_three") : ''}}'/>
                    </div>
                </div>
                <div class="form-group row mb-3 {{ $errors->has('ethics_cover_image') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Ethic Cover Image (1000 X 600) <span class="req_star">*</span>:</label>
                    <div class="col-sm-4">
                        <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file btnu_browse">
                                Browse… <input type="file" name="ethics_cover_image" id="imgInp-cover">
                            </span>
                        </span>
                            <input type="text" class="form-control" readonly>
                        </div>
                        @if ($errors->has('ethics_cover_image'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ethics_cover_image') }}</strong>
                        </span>
                        @endif
                        <img style="height: 80px; margin-top: 10px" id="img-upload-cover" src='{{ isset($ethic->ethics_cover_image) ? asset("uploads/ethic/$ethic->ethics_cover_image") : ''}}'/>
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
                        $('#img-upload-one').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp-one").change(function () {
                readURL(this);
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
                        $('#img-upload-two').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp-two").change(function () {
                readURL(this);
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
                        $('#img-upload-cover').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp-cover").change(function () {
                readURL(this);
            });

        });


    </script>
@endpush
