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
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#general-info"><i
                        class="ti-user"></i> {{ _lang('General Info') }}</a></li>
            <li class="nav-item"><a class="nav-link"  href="{{route('driver_user.id', $driver->id)}}"><i class="ti-receipt"></i>
                    {{ _lang('Login Information') }}</a></li>
       

         
            <li class="nav-item"><a class="nav-link" href="{{route('drivers.edit', $driver->id)}}"><i
                        class="ti-pencil-alt"></i> {{ _lang('Edit') }}</a> </li>
        </ul>
    </div>

    <div class="col-md-9 col-sm-8">
      

            <div class="card-body">

                <div class="tab-content">

                    <div id="general-info" class="tab-pane active">
                    <h4>
            {{ _lang('General Info') }}
        </h4>
                    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <tr>
        <td>{{ _lang('Driver Name') }}</td>
        <td>{{ $driver->driver_name }}</td>
    </tr>
    <tr>
        <td>{{ _lang('Driver Phone') }}</td>
        <td>{{ $driver->driver_phone_number }}</td>
    </tr>
    <tr>
        <td>{{ _lang('License Number') }}</td>
        <td>{{ $driver->license_number }}</td>
    </tr>
    <tr>
        <td>{{ _lang('License Expiry Date') }}</td>
        <td>{{ $driver->license_expiry_date }}</td>
    </tr>
    <tr>
        <td>{{ _lang('Address') }}</td>
        <td>{{ $driver->address }}</td>
    </tr>
    <tr>
        <td>{{ _lang('City') }}</td>
        <td>{{ $driver->city }}</td>
    </tr>
    <tr>
        <td>{{ _lang('Postal Code') }}</td>
        <td>{{ $driver->postal_code }}</td>
    </tr>
    <tr>
        <td>{{ _lang('Driver Email') }}</td>
        <td>{{ $driver->driver_email }}</td>
    </tr>
    <tr>
        <td>{{ _lang('Date of Birth') }}</td>
        <td>{{ $driver->date_of_birth }}</td>
    </tr>
    <tr>
        <td>{{ _lang('Nationality') }}</td>
        <td>{{ $driver->nationality }}</td>
    </tr>
    <tr>
        <td>{{ _lang('Emergency Contact') }}</td>
        <td>{{ $driver->emergency_contact }}</td>
    </tr>
    <tr>
        <td>{{ _lang('Emergency Phone') }}</td>
        <td>{{ $driver->emergency_phone }}</td>
    </tr>
    <tr>
        <td>{{ _lang('Blood Group') }}</td>
        <td>{{ $driver->blood_group }}</td>
    </tr>
    <tr>
        <td>{{ _lang('NID') }}</td>
        <td>{{ $driver->nid }}</td>
    </tr>
    <tr>
        <td>{{ _lang('Passport') }}</td>
        <td>{{ $driver->passport }}</td>
    </tr>

</table>

                    </div>


          

              


             

                </div>
                <!--End TAB-->

                <form method="POST" action="{{ route('drivers.destroy', $driver->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Driver?')"> <i class="fas fa-trash"></i>  {{ _lang('Delete')}}</button>
                </form>
            </div>
       
    </div>
    </div>
</div>

@endsection