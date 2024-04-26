<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title mt-0">{{ _lang('New Service Entry')}}</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="alert alert-danger d-none m-3"></div>
    <div class="alert alert-primary d-none m-3"></div>
    <div class="modal-body overflow-hidden">
    <div class="modal-body">
    <form method="post" class="validate" autocomplete="off" action="{{ route('services.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Vehicle') }}</label>
                                            <input type="text" class="form-control"  value="{{ $vehicle->brand->name}} {{ $vehicle->model->name}} {{ $vehicle->myear->year}}" readonly>
                                            <input type="hidden"  name="vehicle_id" value="{{ $vehicle->id}}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Completion Date *') }}</label>
                                            <input type="date" class="form-control datepicker" name="completed_date" value="{{ old('completed_date') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Odometer') }}</label>
                                            <input type="number" class="form-control" name="odometer" value="{{ old('odometer') }}" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Select any issues that were resolved as part of this service') }}</label> <br>
                                            @foreach($issues as $issue)
                                                @if($issue->status == 1)
                                                    <input type="checkbox" name="issues[]" value="{{ $issue->id }}">
                                                    {{ $issue->summary }}<br>
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label class="control-label">{{ ('Attachment') }}</label>
                                          <input type="file" class="form-control " name="document">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Note') }}</label>
                                            <textarea class="form-control" name="note">{{ old('note') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-lgbtn-sm"><i class="fas fa-file"></i> {{ _lang('Save Changes') }}</button>
                                    </div>
                                </div>
                            </form>
    </div>
    </div>
  </div>
  </div>