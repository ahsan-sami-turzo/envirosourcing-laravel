@extends('layouts.admin')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <form method="post" action="{{ route("product.update",$product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card">
                    <div class="card-header card_header">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title card_title"><i class="fab fa-gg-circle"></i> Add Product
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
                        <div class="form-group row mb-3 {{ $errors->has('product_name') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">Product Name <span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" name="product_name"
                                       value="{{old('product_name',$product->product_name ?:'')}}">
                                @if ($errors->has('product_name'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('product_name') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3 {{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">Category Name<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <select style="width: 100%" class="js-example-basic-multiple" name="category_id"
                                >
                                    <option value="">--Select Category Name --</option>
                                    @foreach( $categories as $category)
                                        <option value="{{ $category->id }}" {{ isset($product->category_id) ? ($product->category_id == $category->id) ? 'selected' : '' : ''}}>{{ $category->name ?: '' }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('category_id') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3 {{ $errors->has('sisterconcern_id') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">Company Name<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <select style="width: 100%" class="js-example-basic-multiple" name="sisterconcern_id"
                                >
                                    <option value="">--Select Company Name --</option>
                                    @foreach( $companies as $company)
                                        <option value="{{ $company->id  }}" {{ isset($product->sisterconcern_id) ? ($product->sisterconcern_id == $company->id) ? 'selected' : '' : ''}} >{{$company->company_name ?: ''}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('sisterconcern_id'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sisterconcern_id') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Product description</label>
                            <div class="col-sm-7">
                                <textarea id="summernote"
                                          name="product_description">{{ old('product_description',$product->product_description ?: '') }}</textarea>
                            </div>

                        </div>
                        <div class="form-group row mb-3 {{ $errors->has('product_image') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">Product Image<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file btnu_browse">
                                Browse… <input type="file" name="product_image" id="imgInp">
                            </span>
                        </span>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                @if ($errors->has('product_image'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('product_image') }}</strong>
                        </span>
                                @endif
                                <img id="img-upload" src='{{ isset($product->product_image) ? asset("uploads/product/$product->product_image") : '' }}'/>
                            </div>
                        </div>
                        <div class="form-group row mb-3 {{ $errors->has('featured') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">Product Featured:</label>
                            <div class="col-sm-7">
                                <input style="margin-top: 10px;" type="checkbox"  class="" {{  ($product->featured == 1 ? 'checked' : '') }} name="featured" value="1">
                                @if ($errors->has('featured'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('featured') }}</strong>
                        </span>
                                @endif
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
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 150,

            });
        });
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2({

            });
        });
    </script>
@endpush
