
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
    <form method="POST" action="{{route('issues.store')}}"  enctype="multipart/form-data">
          @csrf
          <div class="row mb-4 m-3">
                                        <div class="col-md-12">
                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label class="control-label">Vehicle <sup style="color:red">*</sup></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                      <input type="text" value="{{$vehicle->brand->name ?? ''}} {{$vehicle->model->name ?? ''}} {{$vehicle->myear->year ?? ''}}" class="form-control" readonly>
                                                    <input type="hidden" name="vehicle_id" value="{{$vehicle->id}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label class="control-label">Assignee <sup style="color:red">*</sup></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                    <select class="form-control " data-value="id" data-display="name" data-table="drivers" data-where="1" name="driver_id" id="driver_id" required>
                                            <option value="">{{ ('Select One') }}</option>
                                            {{ create_option("drivers", "id", "driver_name", old('driver_id')) }}
                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label class="control-label">Summary <sup style="color:red">*</sup></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="text" name="summary" required="" 
                                                            placeholder="Summary" class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label class="control-label">Description</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <textarea cols="3" rows="3" name="description" 
                                                                placeholder="Description" class="form-control" value=""></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label class="control-label">Documents</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                    <input type="file" class="form-control" name="image">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label class="control-label">Priority <sup style="color:red">*</sup></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <select class="form-control select2 select2-hidden-accessible" 
                                                                id="Priority" name="priority" required="True" style="width: 100%;" 
                                                                tabindex="-1" aria-hidden="true">
                                                            <option value="Low">Low</option>
                                                            <option value="Medium">Medium</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label class="control-label">Due Date</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="date" class="form-control" name="due_date">
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
                                                <button type="reset" class="btn btn-danger" style="margin-right: 30px; width: 100px;">
                                                    <i class="fa fa-remove"></i> Reset
                                                </button>
                                                <button type="submit" class="btn btn-primary" style="width: 100px;">
                                                    <i class="fa fa-save"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                       
  </form>
    </div>
  </div>
  </div>
</div>
