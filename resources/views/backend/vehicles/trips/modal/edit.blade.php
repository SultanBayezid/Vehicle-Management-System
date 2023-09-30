<div class="modal fade" id="editModal{{$trip->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$trip->id}}" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{$trip->id}}">Edit trip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="p-4">
                <form method="POST" action="{{route('trips.update', $trip->id)}}"  enctype="multipart/form-data">
                                {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <div class="row mb-2">
                                                <div class="col-md-2">
                                                    <label class="control-label">Vehicle <sup style="color:red">*</sup></label>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                    <select class="form-control " data-value="id" data-display="name" data-table="vehicles" data-where="1" name="vehicle_id" id="vehicle_id" required>
                                            <option value="">{{ ('Select One') }}</option>
                                            {{ create_option("vehicles", "id", "name", $trip->vehicle_id) }}
      
                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-2">
                                                    <label class="control-label">Assignee <sup style="color:red">*</sup></label>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                    <select class="form-control " data-value="id" data-display="name" data-table="drivers" data-where="1" name="driver_id" id="driver_id" required>
                                            <option value="">{{ ('Select One') }}</option>
                                            {{ create_option("drivers", "id", "name", $trip->driver_id) }}
                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-2">
                                                    <label class="control-label">Summary <sup style="color:red">*</sup></label>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <input type="text" name="summary" required="" 
                                                            placeholder="Summary" class="form-control" value="{{$trip->summary}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-2">
                                                    <label class="control-label">Description</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <textarea cols="3" rows="3" name="description" 
                                                                placeholder="Description" class="form-control" value="">{{$trip->description}}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-2">
                                                    <label class="control-label">Documents</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                    <input type="file" class="form-control" name="image">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-2">
                                                    <label class="control-label">Priority <sup style="color:red">*</sup></label>
                                                </div>
                                   
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-2">
                                                    <label class="control-label">Due Date</label>
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
</div>
