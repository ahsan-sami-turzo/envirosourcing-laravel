@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <form method="post" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card">
                    <div class="card-header card_header">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title card_title"><i class="fab fa-gg-circle"></i> User Registration</h4>
                            </div>
                            <div class="col-md-4 text-right">
                                <a href="{{route('user.index')}}" class="btn btn-dark btn-md waves-effect btn-label waves-light card_btn"><i class="fas fa-th label-icon"></i>All User</a>
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
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" name="name" value="{{ $user->name}}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" name="phone" value="{{ $user->phone }}">
                            </div>
                        </div>
                        <div class="form-group row mb-3 {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" autocomplete="off" class="form-control form_control" name="email" value="{{ $user->email }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                        {{--<div class="form-group row mb-3 {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">Password<span class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="password" autocomplete="off" class="form-control form_control" name="password" value="">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Confirm-Password<span class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control form_control" id="password_confirmation" name="password_confirmation" value="">
                            </div>
                        </div>--}}
                        <div class="form-group row mb-3 {{ $errors->has('role_id') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label col_form_label">User Role<span class="req_star">*</span>:</label>
                            <div class="col-sm-4">

                                <select class="form-control form_control" name="role_id">
                                    <option value="">Choose Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ isset($user->role_id) ?($user->role_id == $role->id) ? 'selected' : '' : ''}}>{{ $role->name?: ''}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('role_id'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('role_id') }}</strong>
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
                                Browse… <input type="file" name="image" id="imgInp">
                            </span>
                        </span>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                <img id="img-upload"/>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer card_footer text-center">
                        <button type="submit" class="btn btn-md btn-dark">REGISTRATION</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
