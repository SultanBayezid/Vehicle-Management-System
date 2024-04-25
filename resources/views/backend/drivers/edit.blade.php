@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
          <h1 class="h3 mb-2 pt-3 text-gray-800">{{  $driver->driver_name ?? '' }}</h1>
        </div>
   
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _lang('Home') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ _lang('People') }}</li>
            <li class="breadcrumb-item"><a href="{{ route('drivers.index') }}">{{ _lang('Drivers') }}</a></li>

            <li class="breadcrumb-item active" aria-current="page">{{  $driver->driver_name ?? '' }}</li>
        </ol>
    </nav>
            
    <div class="card-body">
        <form action="{{ route('drivers.update', $driver->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field()}}
                    <input name="_method" type="hidden" value="PATCH">

            <div class="container">
                <div class="row">
                    <!-- Column 1 -->
                    <div class="col-md-4">
                  <!-- Row 1 -->
                  <div class="form-group">
                            <label for="name">{{ _lang('Driver Name') }}:</label>
                            <input type="text" name="driver_name" id="name" class="form-control" value="{{  $driver->driver_name ?? '' }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                       
                    <div class="form-group">
                            <label for="driver_phone_number">{{ _lang('Driver Phone Number') }}:</label>
                            <input type="number" value="{{  $driver->driver_phone_number ?? '' }}" name="driver_phone_number" id="driver_phone_number" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4">
                    <div class="form-group">
                            <label for="license_number">{{ _lang('License Number') }}:</label>
                            <input type="text" value="{{  $driver->license_number ?? '' }}" name="license_number" id="license_number" class="form-control" required>
                        </div>
                    </div>


                    <div class="col-md-4">
                    <div class="form-group">
                            <label for="license_expiry_date">{{ _lang('License Expiry Date') }}:</label>
                            <input type="date" value="{{  $driver->license_expiry_date ?? '' }}" name="license_expiry_date" id="license_expiry_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                    <div class="form-group">
                            <label for="address">{{ _lang('Address') }}:</label>
                            <input type="text" value="{{  $driver->address ?? '' }}" name="address" id="address" class="form-control">
                        </div>
                    </div>


                    <div class="col-md-4">
                    <div class="form-group">
                            <label for="city">{{ _lang('City') }}:</label>
                            <input type="text" value="{{  $driver->city ?? '' }}" name="city" id="city" class="form-control">
                        </div>
                    </div>


                    <div class="col-md-4">
                            
                    <div class="form-group">
                            <label for="state">{{ _lang('State') }}:</label>
                            <input type="text" value="{{  $driver->state ?? '' }}" name="state" id="state" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4">
                    <div class="form-group">
                            <label for="postal_code">{{ _lang('Postal Code') }}:</label>
                            <input type="text" value="{{  $driver->postal_code ?? '' }}" name="postal_code" id="postal_code" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4">
                    <div class="form-group">
                            <label for="driver_email">{{ _lang('Driver Email') }}:</label>
                            <input type="email" value="{{  $driver->driver_email ?? '' }}" name="driver_email" id="driver_email" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4">
                    <div class="form-group">
                            <label for="date_of_birth">{{ _lang('Date of Birth') }}:</label>
                            <input value="{{  $driver->date_of_birth ?? '' }}" type="date" name="date_of_birth" id="date_of_birth" class="form-control">
                        </div>
                 
                    </div>


                    <div class="col-md-4">
                    <div class="form-group">
                            <label for="nationality">{{ _lang('Nationality') }}:</label>
                            <input  value="{{  $driver->nationality ?? '' }}" type="text" name="nationality" id="nationality" class="form-control">
                        </div>
            
                    </div>

                    <div class="col-md-4">
                    <div class="form-group">
                            <label for="emergency_contact">{{ _lang('Emergency Contact') }}:</label>
                            <input value="{{  $driver->emergency_contact ?? '' }}" type="text" name="emergency_contact" id="emergency_contact" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4">
                       
                    <div class="form-group">
                            <label for="emergency_phone">{{ _lang('Emergency Phone') }}:</label>
                            <input value="{{  $driver->emergency_phone ?? '' }}" type="text" name="emergency_phone" id="emergency_phone" class="form-control">
                        </div>
                    </div>
      
                    <div class="col-md-4">
                       
                    <div class="form-group">
                            <label for="blood_group">{{ _lang('Blood Group') }}:</label>
                            <input value="{{  $driver->blood_group ?? '' }}" type="text" name="blood_group" id="blood_group" class="form-control">
                        </div>
                    </div>
      
                    <div class="col-md-4">
                    <div class="form-group">
                            <label for="nid">{{ _lang('NID (National ID)') }}</label>
                            <input value="{{  $driver->nid ?? '' }}" type="text" name="nid" id="nid" class="form-control">
                        </div>
                    </div>
      
                    <div class="col-md-4">
                    <div class="form-group">
                            <label for="passport">{{ _lang('Passport') }}:</label>
                            <input value="{{  $driver->passport ?? '' }}" type="text" name="passport" id="passport" class="form-control">
                        </div>
                    </div>
      
                    <div class="col-md-4">
                    <div class="form-group">
                            <label for="photo">{{ _lang('Photo') }}:</label>
                            <input type="file"  name="photo" id="photo" class="form-control-file">
                        </div>
                        <div class="thumbnail">
               
                <a href="{{ asset('/uploads/driver/' . $driver->photo) }}" target="_blank">
                <img  class="rounded"src="{{ asset('/uploads/driver/' . $driver->photo) }}" alt="Driver Photo" style="width:100px">
                    <div class="caption">
                       {{_lang('View')}}
            <p></p>
           
          </div>
                </a>
                </div>
                    </div>
      
    
            
                    <div class="card">
                <div class="card-header">
                    <div class="togglebutton">
                        <h4 class="header-title d-flex align-items-center">{{ _lang('Login Details') }}&nbsp;&nbsp;
                            <input type="checkbox" id="client_login" value="1" name="client_login">
                        </h4>
                    </div>
                </div>

                <div class="card-body" id="client_login_card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Name') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                @error('name')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror</div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Phone Number') }}</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                                @error('phone')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Password') }}</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                @error('password')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Confirm Password') }}</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                                @error('password_confirmation')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Status') }}</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status">
                                    <option value="1">{{ _lang('Active') }}</option>
                                    <option value="0">{{ _lang('Inactive') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                  
                 
                </div>
            </div>

            <button type="submit" class="btn btn-primary">{{ _lang('Create Driver') }}</button>
        </form>
    </div>
</div>
<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@push('js-script')
<script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>
@endpush
<script>
    $(document).ready(function() {
        // Initial check on page load
        if (!$('#client_login').is(':checked')) {
            $("#client_login_card input, #client_login_card select").prop("disabled", true);
        }

        // Listen for change on the checkbox
        $(document).on('change', '#client_login', function () {
            if (!$(this).is(':checked')) {
                $("#client_login_card input, #client_login_card select").prop("disabled", true);
            } else {
                $("#client_login_card input, #client_login_card select").prop("disabled", false);
            }
        });
    });
</script>


@endsection
