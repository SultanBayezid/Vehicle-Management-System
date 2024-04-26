@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
          <h1 class="h3 mb-2 pt-3 text-gray-800">{{ $driver->driver_name }}</h1>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ _lang('Home') }} </a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ _lang('People')}}</li>
            <li class="breadcrumb-item active" aria-current="page">{{ _lang('Drivers')}}</li>
            <li class="breadcrumb-item active" aria-current="page">{{ $driver->driver_name }}</li>
        </ol>
    </nav>
<div class="row">
    @php $currency = currency() @endphp

    <div class="col-md-3 col-sm-4">
        <ul class="nav flex-column nav-tabs settings-tab" role="tablist">
            <li class="nav-item"><a class="nav-link "  href="{{route('drivers.show' , $driver->id)}}"><i
                        class="ti-user"></i> {{ _lang('General Info') }}</a></li>
            <li class="nav-item"><a class="nav-link active"  href="{{route('driver_user.id', $driver->id)}}"><i class="ti-receipt"></i>
                    {{ _lang('Login Information') }}</a></li>
       

         
            <li class="nav-item"><a class="nav-link" href="{{route('drivers.edit', $driver->id)}}"><i
                        class="ti-pencil-alt"></i> {{ _lang('Edit') }}</a> </li>
        </ul>
    </div>

    <div class="col-md-9 col-sm-8">
      

            <div class="card-body">

            @if($driver->user)
            <h4>
            {{ _lang('Update driver  account information below:') }}
        </h4>
    <form method="POST" action="{{ route('driver_user.update', ['id' => $driver->user->id]) }}">
        @csrf
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="form-group">
                    <label class="control-label">{{ _lang('Name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $driver->user->name }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-8 col-sm-12">
                <div class="form-group">
                    <label class="control-label">{{ _lang('Phone Number') }}</label>
                    <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $driver->user->phone }}">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-8 col-sm-12">
                <div class="form-group">
                    <label class="control-label">{{ _lang('Password') }}</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-8 col-sm-12">
                <div class="form-group">
                    <label class="control-label">{{ _lang('Status') }}</label>
                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                        <option value="1" {{ $driver->user->status == 1 ? 'selected' : '' }}>{{ _lang('Active') }}</option>
                        <option value="0" {{ $driver->user->status == 0 ? 'selected' : '' }}>{{ _lang('Inactive') }}</option>
                    </select>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">{{ _lang('Update')}}</button>
            </div>
        </div>
    </form>

    @else
    <div class="card-body">
        <h4>
            {{ _lang('This driver does not have an account. Create one by filling out the form below.') }}
        </h4>
    <div class="row">
    <form method="POST" action="{{ route('driver_user.create', ['id' => $driver->id]) }}">
        @csrf
        <div class="col-md-8">
            <div class="form-group">
                <label class="control-label">{{ _lang('Name') }}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-8">
            <div class="form-group">
                <label class="control-label">{{ _lang('Phone Number') }}</label>
                <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-8">
            <div class="form-group">
                <label class="control-label">{{ _lang('Password') }}</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-8">
            <div class="form-group">
                <label class="control-label">{{ _lang('Confirm Password') }}</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-8">
            <div class="form-group">
                <label class="control-label">{{ _lang('Status') }}</label>
                <select class="form-control @error('status') is-invalid @enderror" name="status">
                    <option value="1">{{ _lang('Active') }}</option>
                    <option value="0">{{ _lang('Inactive') }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-8">
        <button type="submit" class="btn btn-primary">{{ _lang('Create')}}</button>
        </div>
    </div>
    </form>
</div>

@endif

            </div>
       
    </div>
    </div>
</div>

@endsection