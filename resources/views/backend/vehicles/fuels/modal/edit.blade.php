<div class="modal fade" id="fueledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Edit Fuel Entry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="alert alert-danger d-none m-3"></div>
            <div class="alert alert-primary d-none m-3"></div>
            <div class="modal-body overflow-hidden">
                <form id="editFuelForm" method="POST" action=""  enctype="multipart/form-data">
                                {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="row mb-4 m-3">
                        <div class="col-md-12">
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <label class="control-label">Vehicle <sup style="color:red">*</sup></label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        
                                        <input type="text"  id="editVehicleName" class="form-control" readonly>
                                        <input type="hidden" id="vehicleId" name="vehicle_id" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <label class="control-label">Fuel Entry Date *</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="date" id="editDate" class="form-control" name="date">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <label class="control-label">Odometer <sup style="color:red">*</sup></label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" id="editOdometer" name="odometer" required="" placeholder="Odometer" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <label class="control-label">Fuel Quantity</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" id="editQty" name="qty" required="" placeholder="Fuel Quantity" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <label class="control-label">Reference</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" id="editReference" name="reference" required="" placeholder="reference" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <label class="control-label">Attachment</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="file" id="editAttachment" class="form-control" name="attachment">

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <label class="control-label">Note <sup style="color:red">*</sup></label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <textarea id="editNote" cols="3" rows="3" name="note" placeholder="Note" class="form-control" value=""></textarea>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $('.edit-fuel').click(function(){

            var date = $(this).data('date');
            var odometer = $(this).data('odometer');
            var qty = $(this).data('qty');
            var reference = $(this).data('reference');
            var vehicleId = $(this).data('vehicle-id');
            var vehicleName = $(this).data('vehicle-name');
            var note = $(this).data('note');
            var formAction = $(this).data('form-action');

            alert(formAction);
            
            $('#vehicleId').val(vehicleId);
            $('#editVehicleName').val(vehicleName); // Populate vehicle name field
            $('#fueledit input[name="date"]').val(date);
            $('#fueledit input[name="odometer"]').val(odometer);
            $('#fueledit input[name="qty"]').val(qty);
            $('#fueledit input[name="reference"]').val(reference);
            $('#editNote').val(note);

            $('#editFuelForm').attr('action', formAction);

        
           

        });
    });
</script>