
<div class="modal fade" id="issue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title mt-0">New Issue</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="alert alert-danger d-none m-3"></div>
    <div class="alert alert-primary d-none m-3"></div>
    <div class="modal-body overflow-hidden">
       <div class="ml-5">
       <form method="POST" action="{{ route('issues.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="row mb-2">
                <div class="col-md-2">
                    <label class="control-label">{{ _lang('Vehicle') }} <sup style="color:red">*</sup></label>
                </div>
                <div class="col-md-6">
                                                    <div class="form-group">
                                                      <input type="text" value="{{$vehicle->brand->name ?? ''}} {{$vehicle->model->name ?? ''}} {{$vehicle->myear->year ?? ''}}" class="form-control" readonly>
                                                    <input type="hidden" name="vehicle_id" value="{{$vehicle->id}}">
                                                    </div>
                                                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-2">
                    <label class="control-label">{{ _lang('Assignee') }} <sup style="color:red">*</sup></label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control "  name="driver_id" id="driver_id" required>
                            <option value="">{{ _lang('Select One') }}</option>
                            {{ create_option("drivers","id","driver_name",$vehicle->driver_id,array("company_id="=>company_id())) }}

                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-2">
                    <label class="control-label">{{ _lang('Summary') }} <sup style="color:red">*</sup></label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="summary" required="" placeholder="{{ _lang('Summary') }}" class="form-control" value="">
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-2">
                    <label class="control-label">{{ _lang('Description') }}</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea cols="3" rows="3" name="description" placeholder="{{ _lang('Description') }}" class="form-control" value=""></textarea>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-2">
                    <label class="control-label">{{ _lang('Documents') }}</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-2">
                    <label class="control-label">{{ _lang('Priority') }} <sup style="color:red">*</sup></label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <select class="form-control" name="priority">
                            <option value="Low">{{ _lang('Low') }}</option>
                            <option value="Medium">{{ _lang('Medium') }}</option>
                            <option value="High">{{ _lang('High') }}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-2">
                    <label class="control-label">{{ _lang('Due Date') }}</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="date" class="form-control" name="due_date">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <button type="reset" class="btn btn-danger">
                <i class="fa fa-remove"></i> {{ _lang('Reset') }}
            </button>
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> {{ _lang('Save') }}
            </button>
        </div>
    </div>
</form>
       </div>
    </div>
  </div>
  </div>
</div>
