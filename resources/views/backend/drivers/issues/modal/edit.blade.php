<div class="modal fade" id="editModal{{$issue->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$issue->id}}" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{$issue->id}}">{{_lang('Edit Issue')}} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             

                <form method="POST" action="{{route('driver_issue_update', $issue->id)}}"  enctype="multipart/form-data">
                                {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
    <div class="row mb-4 m-3">
        <div class="col-md-12">
            <!-- Vehicle -->
            <div class="row mb-2">
                <div class="col-md-3">
                    <label class="control-label">{{ _lang('Vehicle') }} <sup style="color:red">*</sup></label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                    <select class="form-control" name="vehicle_id" id="driver_id" required>
                            <option value="">{{ _lang('Select One') }}</option>
                          @foreach($vehicles as $vehicle)
                          <option value="{{$vehicle->id}}" {{$vehicle->id == $issue->vehicle_id ? 'selected' : ''}}>{{$vehicle->brand->name ?? ''}} {{$vehicle->model->name ?? ''}} {{$vehicle->myear->year ?? ''}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Assignee -->
 
            <input type="hidden" class="form-control" value="{{$issue->driver->id}}" name="driver_id" >

            <!-- Summary -->
            <div class="row mb-2">
                <div class="col-md-3">
                    <label class="control-label">{{ _lang('Summary') }} <sup style="color:red">*</sup></label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="text" value="{{$issue->summary}}" name="summary" required placeholder="{{ _lang('Summary') }}" class="form-control" value="">
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="row mb-2">
                <div class="col-md-3">
                    <label class="control-label">{{ _lang('Description') }}</label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <textarea cols="3" rows="3" name="description" placeholder="{{ _lang('Description') }}" class="form-control" >{{$issue->description}}</textarea>
                    </div>
                </div>
            </div>

            <!-- Documents -->
            <div class="row mb-2">
                <div class="col-md-3">
                    <label class="control-label">{{ _lang('Documents') }}</label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
            </div>

            <!-- Priority -->
            <div class="row mb-2">
                <div class="col-md-3">
                    <label class="control-label">{{ _lang('Priority') }} <sup style="color:red">*</sup></label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                    <select name="priority" class="form-control">
                                                        <option value="Low" @if ($issue->priority == 'Low') selected @endif>Low</option>
                                                        <option value="Medium" @if ($issue->priority == 'Medium') selected @endif>Medium</option>
                                                        <option value="High" @if ($issue->priority == 'High') selected @endif>High</option>
                                                    </select>
                    </div>
                </div>
            </div>

            <!-- Due Date -->
            <div class="row mb-2">
                <div class="col-md-3">
                    <label class="control-label">{{ _lang('Due Date') }}</label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="date" class="form-control" value="{{$issue->due_date}}" name="due_date">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Buttons -->
    <div class="row mt-4">
        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-9">
            <div class="input-group">
                <button type="reset" class="btn btn-danger" style="margin-right: 30px; width: 100px;">
                    <i class="fa fa-remove"></i> {{ _lang('Reset') }}
                </button>
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
