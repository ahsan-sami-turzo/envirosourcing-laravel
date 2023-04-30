@extends('layouts.admin')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <form method="post" action="{{route('news.update',$news->id)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card">
                    <div class="card-header card_header">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title card_title"><i class="fab fa-gg-circle"></i> News Update</h4>
                            </div>
                            <div class="col-md-4 text-right">
                                <a href="{{route('news.index')}}" class="btn btn-dark btn-md waves-effect btn-label waves-light card_btn"><i class="fas fa-th label-icon"></i>All News list</a>
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
                            <label class="col-sm-3 col-form-label col_form_label">Title<span class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" name="title" value="{{old('title',$news->title ?: '')}}">
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3 {{ $errors->has('url') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">Url<span class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" name="url" value="{{old('url',$news->url ?: '')}}">
                                @if ($errors->has('url'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('url') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3 {{ $errors->has('link') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">News Link<span class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" name="link" value="{{old('link',$news->link ?: '')}}">
                                @if ($errors->has('link'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('link') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-3 {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">Description</label>
                            <div class="col-sm-7">
                                <textarea id="summernote" name="description">{{ old('description',$news->description ?: '') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-3 {{ $errors->has('type') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">News type<span class="req_star">*</span>:</label>
                            <div class="col-sm-4">

                                <select class="form-control form_control" name="type">
                                    <option value="">Choose news type</option>

                                    <option value="101" {{ ($news->type == 101) ? 'selected' : '' }}>industry</option>
                                    <option value="100" {{ ($news->type == 100) ? 'selected' : '' }}>company</option>

                                </select>
                                @if ($errors->has('type'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('type') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file btnu_browse">
                                Browse… <input type="file" name="news_image" id="imgInp">
                            </span>
                        </span>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                <img id="img-upload" src='{{ isset($news->news_image) ? asset("uploads/news/$news->news_image") : '' }}'/>
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 150,

            });
        });
    </script>
@endpush
