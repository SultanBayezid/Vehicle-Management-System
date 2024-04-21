@extends('backend.layouts.header')

@section('content')
<style>
    .title {
    font-weight: 100;
    text-align: center;

}

.center {
    font-weight: 100;
    text-align: center !important;

}


</style>
<!-- jQuery -->
<div class="container">
    <div class="row center">
        <div class="col-md-6 text-md-left">
          <h1 class="h3 mb-2 pt-3 text-gray-800">{{ _lang('Contacts') }} </h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">

            <button class="btn btn-primary btn-sm"   data-toggle="modal" data-target="#issue"><i class="fas fa-plus"></i> {{ _lang('Add New Contact') }} </button>
        </div>
    </div>
    

<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
 
        </ol>
    </nav>




    <div class="row">
    @foreach($contacts as $contact)
    <div class="col-12">
            <div class="card">
            <div class="card-content center">
                <div class="card-body">
                <div class="media d-flex">
                    <div class="media-body text-left center">
                    <h3 class="center">{{$contact->contact_name}}</h3>
                    <p> <span> <i class="fas fa-phone"></i></span> {{$contact->contact_phone}}</p>
                    <p> <span> <i class="fas fa-map  "></i></span> {{$contact->address}}</p>
                    </div>
            
                </div>
                <div class="center">
                <div class="btn-group">
                    <button type="button" class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#editModal{{ $contact->id }}">
                    <i class="fas fa-pen"></i> {{ _lang('Edit') }}
                    </button>
                 
                   
                    <form action="{{ route('driver_customer_delete', $contact->id) }}" method="post">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this Customer?')">
                        <i class="fas fa-trash"></i> {{ _lang('Delete') }}
                    </button>
                    </form>
                </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
        @include('backend.drivers.contacts.modal.edit')
    @endforeach

   </div>



                 
 </div>


 <div class="modal fade" id="issue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title mt-0"> {{ _lang('Add New Contact') }}</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="alert alert-danger d-none m-3"></div>
    <div class="alert alert-primary d-none m-3"></div>
    <div class="modal-body overflow-hidden">
    <form method="POST" action="{{ route('driver_customer_store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Contact Name') }}</label>
                        <input type="text" class="form-control form-control @error('contact_name') is-invalid @enderror" name="contact_name"
                            value="{{ old('contact_name') }}" required>
                        @error('contact_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Contact Phone') }}</label>
                        <input type="number" class="form-control" name="contact_phone" value="{{ old('contact_phone') }}" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('City') }}</label>
                        <input type="text" class="form-control" name="city" value="{{ old('city') }}" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Address') }}</label>
                        <textarea class="form-control" name="address">{{ old('address') }}</textarea required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Remarks') }}</label>
                        <textarea class="form-control" name="remarks">{{ old('remarks') }}</textarea >
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 mt-4">
        <button type="submit" class="btn btn-primary btn-lg"><i class="ti-save"></i> {{ _lang('Save Contact') }}</button>
    </div>
</form>


    </div>
  </div>
  </div>
</div>


@endsection
