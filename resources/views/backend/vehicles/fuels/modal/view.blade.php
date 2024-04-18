<div class="modal fade" id="viewedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">View Fuel Entry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="alert alert-danger d-none m-3"></div>
            <div class="alert alert-primary d-none m-3"></div>
            <div class="modal-body overflow-hidden">
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <tr>
                        <td>{{ _lang('Vehicle') }}</td>
                        <td><span class="vehicleId"></span></td>
                        
                    </tr>
                    <tr>
                        <td>{{ _lang('Date') }}</td>
                        <td><span class="vdate"></span></td>

                    </tr>
                    <tr>
                        <td>{{ _lang('Odometer') }}</td>
                    
                        <td><span class="vodometer"></span></td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Qty') }}</td>
                        <td><span class="vqty"></span></td>

                    </tr>

                    <tr>
                        <td>{{ _lang('reference') }}</td>
                        <td><span class="vreference"></span></td>


                      
                    </tr>
               
                
                    <tr>
                        <td>{{ _lang('Attachement') }}</td>
                        <td>
                    
                        @if($fuel->attachment != "")
                        <a  target="_blank" class="btn btn-primary btn-sm" id="attachmentLink" href="">{{ _lang('View Attachment') }}</a>
                            @else
                            <label class="label label-warning">
                                <strong>{{ _lang('No Atachment Available !') }}</strong>
                            </label>
                            @endif
                    
                    </td>
                    </tr>
                    <tr>
                        <td>{{ _lang('Note') }}</td>
                        <td><span class="vnote"></span></td>

                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $('.view-fuel').click(function(){
            var modal = $('#viewedit');
            var date = $(this).data('date');
            var vehicleId = $(this).data('vehicle-id');
            var vehicleName = $(this).data('vehicle-name');
            var odometer = $(this).data('odometer');
            var qty = $(this).data('qty');
            var reference = $(this).data('reference');
            var note = $(this).data('note');
            var attachment = $(this).data('attachment');
            var attachmentUrl = $(this).data('attachment-url');

           
            $('.vehicleId').text(vehicleName);
            $('.vdate').text(date);
            $('.vodometer').text(odometer);
            $('.vqty').text(qty);
            $('.vreference').text(reference);
            $('.vnote').text(note);
            $('#attachmentLink').attr('href', attachmentUrl);
   
     
        });
    });
</script>

