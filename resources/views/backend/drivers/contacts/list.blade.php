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
    <div class="col-12">
        <div class="card">
          <div class="card-content center">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left center">
                  <h3 class="center">Sultan Bayezid</h3>
                  <p> <span> <i class="fas fa-phone"></i></span>  +1 555 123 4567</p>
                  <p> <span> <i class="fas fa-map  "></i></span> House 102, beanibazar, Sylhet</p>
                </div>
         
              </div>
              <div class="center">
                <a href=""  class="btn btn-warning btn-sm"><i class="fas fa-trash"></i> {{_lang('Edit')}} </a>
                <a href="" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> {{_lang('Delete')}} </a>

                </div>
            </div>
          </div>
        </div>
      </div>

</div>



                 
 </div>


 <div class="modal fade" id="issue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title mt-0"> {{ _lang('Add New Fuel History') }}</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="alert alert-danger d-none m-3"></div>
    <div class="alert alert-primary d-none m-3"></div>
    <div class="modal-body overflow-hidden">
    <form method="POST" action="{{ route('driver_fuelhistory_store') }}" enctype="multipart/form-data">
    @csrf
                              
                            </form>

    </div>
  </div>
  </div>
</div>


@endsection
