@extends('layouts.admin')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <form method="post" action='{{ "#" }}' enctype="multipart/form-data">
                @csrf
                <input name="id" value="{{ isset($showrrom) ? $showrrom->id : '' }}" hidden>
                <div class="card">
                    <div class="card-header card_header">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title card_title"><i class="fab fa-gg-circle"></i> Add Showroom
                                    Information</h4>
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
                        <div class="form-group row mb-3 {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">Showroom Title<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" name="title"
                                       value="{{old('title', isset($showroom) ? $showroom->title : '')}}">
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Showroom description</label>
                            <div class="col-sm-7">
                                <textarea id="summernote"
                                          name="description">{{ old('description',isset($showroom) ? $showroom->description : '') }}</textarea>
                            </div>

                        </div>

                        <div class="form-group row mb-3 {{ $errors->has('showrooms_image') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">Showroom Image<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file btnu_browse">
                                Browse… <input type="file" name="showrooms_image" id="imgInp">
                            </span>
                        </span>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                @if ($errors->has('showrooms_image'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('showrooms_image') }}</strong>
                        </span>
                                @endif
                                <img id="img-upload"
                                     src='{{ isset($showroom->showrooms_image) ? asset("uploads/showroom/$showroom->showrooms_image") : ''}}'/>
                            </div>
                        </div>

                        <div class="form-group row mb-3 {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">Showroom Title<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <select style="width: 100%" class="js-example-basic-multiple" name="states[]"
                                        multiple="multiple">
                                    <option value="">--Select Country Location --</option>
                                    @foreach( $locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->name ?: '' }}</option>
                                    @endforeach
                                </select>
                                {{--                        @if ($errors->has('title'))--}}
                                {{--                            <span class="invalid-feedback" role="alert">--}}
                                {{--                            <strong>{{ $errors->first('title') }}</strong>--}}
                                {{--                        </span>--}}
                                {{--                        @endif--}}
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 150,
            });

        });

        $(document).ready(function () {
            $('.js-example-basic-multiple').select2({
                minimumInputLength: 8
            });
        });
    </script>
@endpush
