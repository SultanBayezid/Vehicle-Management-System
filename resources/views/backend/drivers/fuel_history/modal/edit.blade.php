<div class="modal fade" id="editModal{{$fuel->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$fuel->id}}" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{$fuel->id}}">{{_lang('Edit Fuel History')}} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             

            <form method="POST" action="{{ route('driver_fuel_update', $fuel->id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH">
    <div class="row mb-4 m-3">
        <div class="col-md-12">
            <div class="row mb-2">
                <div class="col-md-3">
                    <label class="control-label">{{ _lang('Vehicle') }} <sup style="color:red">*</sup></label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <select class="form-control" name="vehicle_id" id="vehicle_id" required>
                            <option value="">{{ _lang('Select One') }}</option>
                            @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}" {{ $vehicle->id == $fuel->vehicle_id ? 'selected' : '' }}>{{ $vehicle->brand->name ?? '' }} {{ $vehicle->model->name ?? '' }} {{ $vehicle->myear->year ?? '' }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3">
                    <label class="control-label">{{ _lang('Fuel Entry Date') }} *</label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="date" class="form-control @error('date') is-invalid @enderror" value="{{ $fuel->date }}" name="date" required>
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
                                                    <input type="number" name="odometer" required="" placeholder="{{ _lang('Odometer') }}" class="form-control" value="{{ $fuel->odometer }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <label class="control-label">{{ _lang('Fuel Quantity') }}</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="number" name="qty" required="" placeholder="{{ _lang('Fuel Quantity') }}" class="form-control" value="{{ $fuel->qty }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <label class="control-label">{{ _lang('Reference') }}</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="text" name="reference" placeholder="{{ _lang('Reference') }}" class="form-control" value="{{ $fuel->reference }}">
                                                </div>
                                            </div>
                                        </div>

            <div class="row mb-2">
                <div class="col-md-3">
                    <label class="control-label">{{ _lang('Attachment') }}</label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="file" class="form-control" name="attachment"> <br>
                        @if($fuel->attachment != "")
                        <a href="{{ asset('uploads/fuel/'.$fuel->attachment) }}" target="_blank" class="btn btn-primary btn-sm">{{ _lang('View Attachment') }}</a>
                        @else
                        <label class="label label-warning">
                            <strong>{{ _lang('No Attachment Available!') }}</strong>
                        </label>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3">
                    <label class="control-label">{{ _lang('Note') }}</label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <textarea cols="3" rows="3" name="note" placeholder="{{ _lang('Note') }}" class="form-control">{{ $fuel->note }}</textarea>
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
                <button type="submit" class="btn btn-primary" style="width: 100px;">
                    <i class="fa fa-save"></i> {{ _lang('Update') }}
                </button>
            </div>
        </div>
    </div>
</form>
            </div>
        </div>
    </div>
</div>
