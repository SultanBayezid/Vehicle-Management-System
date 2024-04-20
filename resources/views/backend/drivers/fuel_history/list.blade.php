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
          <h1 class="h3 mb-2 pt-3 text-gray-800">{{ _lang('Fuel History') }} </h1>
        </div>
        <div class="col-md-6 text-md-right mt-3">

            <button class="btn btn-primary btn-sm"   data-toggle="modal" data-target="#issue"><i class="fas fa-plus"></i> {{ _lang('Add New Fuel History') }} </button>
        </div>
    </div>
    

<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
 
        </ol>
    </nav>




    <div class="row">
    @foreach($fuels as $fuel)
        <div class="col-sm-12">
        <div class="border">
            <div class="center p-2">
                <h5 class="title">
                    {{ $fuel->vehicle->brand->name ?? '' }}
                    {{ $fuel->vehicle->model->name ?? '' }}
                    {{ $fuel->vehicle->myear->year ?? '' }}
                </h5>
        

            
            <p class=""><span class="h6">{{ _lang('Fuel Entry Date') }} :</span> {{ $fuel->date }}</p>
            <p class=""><span class="h6">{{ _lang('Fuel Quantity') }} :</span> {{ $fuel->qty }}</p>
            <p class=""><span class="h6">{{ _lang('Odometer') }} :</span> {{ $fuel->odometer }} {{ _lang('KM') }}</p>
            <p class=""><span class="h6">{{ _lang('Reference') }} :</span> {{ $fuel->reference }} </p>
            <p class=""><span class="h6">{{ _lang('Note') }} :</span> {{ $fuel->note }} </p>
            <p class="">    @if($fuel->attachment != "")
                            <a href="{{ asset('uploads/fuel/'.$fuel->attachment) }}"
                                target="_blank" class="btn btn-primary btn-sm">{{ _lang('View Attachment') }}</a>
                            @else
                            <label class="label label-warning">
                                <strong>{{ _lang('No Atachment Available !') }}</strong>
                            </label>
                            @endif </p>
    
                <div class="btn-group">
                    <button type="button" class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#editModal{{ $fuel->id }}">
                    <i class="fas fa-pen"></i> {{ _lang('Edit') }}
                    </button>
                 

                    <form action="{{ route('driver_issue_delete', $fuel->id) }}" method="post">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this Issue?')">
                        <i class="fas fa-trash"></i> {{ _lang('Delete') }}
                    </button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    @endforeach


</div>



                 
 </div>


 <div class="modal fade" id="issue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title mt-0"> {{ _lang('New Issue') }}</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="alert alert-danger d-none m-3"></div>
    <div class="alert alert-primary d-none m-3"></div>
    <div class="modal-body overflow-hidden">
    <form method="POST" action="{{ route('driver_issue_store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row mb-4 m-3">
        <div class="col-md-12">
       

        


   
       

        
        </div>
    </div>

    <!-- Buttons -->

</form>

    </div>
  </div>
  </div>
</div>


@endsection
