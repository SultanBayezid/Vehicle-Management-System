<div class="modal fade" id="editModal{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$service->id}}" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{$service->id}}">Edit Service </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Include your edit form here -->
                {{-- Example form --}}
                <form action="{{ route('services.update',  Crypt::encrypt($service->id)) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Vehicle') }}</label>
                                            <input type="text" value="{{$vehicle->brand->name ?? ''}} {{$vehicle->model->name ?? ''}} {{$vehicle->myear->year ?? ''}}" class="form-control" readonly>
                                            <input type="hidden" name="vehicle_id" value="{{$vehicle->id}}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Completion Date *') }}</label>
                                            <input type="date" class="form-control datepicker" name="completed_date" value="{{ $service->completed_date }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Odometer') }}</label>
                                            <input type="text" class="form-control" name="odometer" value="{{ $service->odometer }}" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Select any issues that were resolved as part of this service') }}</label> <br>
                                            @foreach($issues as $issue)
    <label>
        <input type="checkbox" name="issues[]" value="{{ $issue->id }}">
        {{ $issue->summary }}
    </label><br>
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
