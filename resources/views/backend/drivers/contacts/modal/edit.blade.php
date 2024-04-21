<div class="modal fade" id="editModal{{$contact->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$contact->id}}" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{$contact->id}}">{{_lang('Edit Fuel History')}} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             

            <form method="POST" action="{{ route('driver_customer_update', $contact->id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Contact Name') }}</label>
                        <input type="text" class="form-control form-control @error('contact_name') is-invalid @enderror" name="contact_name"
                            value="{{$contact->contact_name}}" required>
                        @error('contact_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Contact Phone') }}</label>
                        <input type="number" class="form-control" name="contact_phone" value="{{$contact->contact_phone}}" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('City') }}</label>
                        <input type="text" class="form-control" name="city" value="{{$contact->city}}" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Address') }}</label>
                        <textarea class="form-control" name="address">{{$contact->address}}</textarea required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Remarks') }}</label>
                        <textarea class="form-control" name="remarks">{{$contact->remarks}}</textarea >
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 mt-4">
        <button type="submit" class="btn btn-primary btn-lg"><i class="ti-save"></i> {{ _lang('Update Contact') }}</button>
    </div>

</form>
            </div>
        </div>
    </div>
</div>
