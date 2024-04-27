
<div class="modal fade" id="fuel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title mt-0">{{ _lang('New Fuel Entry')}}</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="alert alert-danger d-none m-3"></div>
    <div class="alert alert-primary d-none m-3"></div>
    <div class="modal-body overflow-hidden">
    <form method="POST" action="{{ route('fuels.store') }}" enctype="multipart/form-data">
    @csrf
                                <div class="row mb-4 m-3">
                                    <div class="col-md-12">
                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <label class="control-label">{{ _lang('Vehicle') }} <sup style="color:red">*</sup></label>
                                            </div>
                                            <div class="col-md-9">
                                                    <div class="form-group">
                                                      <input type="text" value="{{$vehicle->brand->name}} {{$vehicle->model->name}} {{$vehicle->myear->year}}" class="form-control" readonly>
                                                    <input type="hidden" name="vehicle_id" value="{{$vehicle->id}}">
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <label class="control-label">{{ _lang('Fuel Entry Date') }} *</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" required>
                                                    @error('date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <label class="control-label">{{ _lang('Odometer') }} <sup style="color:red">*</sup></label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="number" name="odometer" placeholder="{{ _lang('Odometer') }}" class="form-control" required >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <label class="control-label">{{ _lang('Fuel Quantity') }}</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="number" name="qty" placeholder="{{ _lang('Fuel Quantity') }}" class="form-control" required >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <label class="control-label">{{ _lang('Reference') }}</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="text" name="reference" placeholder="{{ _lang('Reference') }}" class="form-control" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <label class="control-label">{{ _lang('Attachment') }}</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="file" class="form-control" name="attachment">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <label class="control-label">{{ _lang('Note') }} <sup style="color:red">*</sup></label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <textarea cols="3" rows="3" name="note" placeholder="{{ _lang('Note') }}" class="form-control" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-3">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group">
                 
                                            <button type="submit" class="btn btn-primary" >
                                                <i class="fa fa-save"></i> {{ _lang('Save') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
    </div>
  </div>
  </div>
</div>
