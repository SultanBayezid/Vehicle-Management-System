@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
          <h1 class="h3 mb-2 pt-3 text-gray-800">{{ _lang('Add New Contact') }}</h1>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
            <li class="breadcrumb-item active" aria-current="page">Reports</li>
            <li class="breadcrumb-item active" aria-current="page">{{ _lang('Add New Contact') }}</li>
        </ol>
    </nav>
<form method="post" class="validate" autocomplete="off" action="{{ action('App\Http\Controllers\ContactController@update', $id) }}"
    enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">{{ _lang('Add New Contact') }}</h4>
                </div>

                <div class="card-body">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Profile Type') }}</label>
                                <select class="form-control select2" name="profile_type" required>
                                    <option value="Company" {{ $contact->profile_type == "Company" ? "selected" : "" }}>
                                        {{ _lang('Company') }}</option>
                                    <option value="Individual"
                                        {{ $contact->profile_type == "Individual" ? "selected" : "" }}>
                                        {{ _lang('Individual') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Company Name') }}</label>
                                <input type="text" class="form-control" name="company_name"
                                    value="{{ $contact->company_name }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Contact Name') }}</label>
                                <input type="text" class="form-control" name="contact_name"
                                    value="{{ $contact->contact_name }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Contact Email') }}</label>
                                <input type="text" class="form-control" name="contact_email"
                                    value="{{ $contact->contact_email }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Contact Phone') }}</label>
                                <input type="text" class="form-control" name="contact_phone"
                                    value="{{ $contact->contact_phone }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Country') }}</label>
                                <select class="form-control select2" name="country">
                                    {{ get_country_list( $contact->country ) }}
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('City') }}</label>
                                <input type="text" class="form-control" name="city" value="{{ $contact->city }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('State') }}</label>
                                <input type="text" class="form-control" name="state" value="{{ $contact->state }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Zip') }}</label>
                                <input type="text" class="form-control" name="zip" value="{{ $contact->zip }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Address') }}</label>
                                <textarea class="form-control" name="address">{{ $contact->address }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Remarks') }}</label>
                                <textarea class="form-control" name="remarks">{{ $contact->remarks }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Facebook') }}</label>
                                <input type="text" class="form-control" name="facebook"
                                    value="{{ $contact->facebook }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Twitter') }}</label>
                                <input type="text" class="form-control" name="twitter" value="{{ $contact->twitter }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Linkedin') }}</label>
                                <input type="text" class="form-control" name="linkedin"
                                    value="{{ $contact->linkedin }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="header-title">{{ _lang('Contact Image') }}</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Contact Image') }}</label>
                                <input type="file" class="form-control dropify" name="contact_image"
                                    data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG"
                                    data-default-file="{{ asset('uploads/contacts/'.$contact->contact_image) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

      
        </div>

        <div class="col-md-12 mt-4">
            <button type="submit" class="btn btn-primary btn-lg"><i class="ti-save"></i>
                {{ _lang('Update Contact') }}</button>
        </div>
    </div>
    </div>
</form>
@endsection