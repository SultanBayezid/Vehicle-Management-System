<div class="modal fade" id="editModal{{$trip->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$trip->id}}" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{$trip->id}}">{{_lang('Edit Fuel History')}} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             

            <form method="POST" action="{{ route('driver_trip_update', $trip->id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Vehicle') }}</label>
                        <select class="form-control select2-ajax"  name="vehicle_id">
                @foreach($vehicles as $vehicle)
    <option value="{{ $vehicle->id }}" {{ $vehicle->id == $trip->vehicle_id ? 'selected' : '' }}>
        {{ $vehicle->brand->name ?? '' }} {{ $vehicle->model->name ?? '' }} {{ $vehicle->myear->year ?? '' }}
    </option>
@endforeach

            </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Passenger') }}</label>
                        <select class="form-control select2-ajax" data-value="id" data-display="contact_name" data-table="contacts" data-where="1" name="customer_id">
                <option value="">{{ ('Select One') }}</option>
                {{ create_option("contacts","id","contact_name",$trip->customer_id,array("ref_user_id="=>auth()->user()->id)) }}


            </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Pickup Location') }}</label>
                        <input type="text" name="pickup_location" class="form-control sign__input" value="{{$trip->pickup_location}}" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Dropoff Location') }}</label>
                        <input type="text" name="dropoff_location" value="{{$trip->dropoff_location}}" class="form-control sign__input">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Fare') }}</label>
                        <input type="number" name="fare_amount" value="{{$trip->fare_amount}}" class="form-control sign__input">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Distance') }}</label>
                        <input type="number" name="distance_km"  value="{{$trip->distance_km}}" class="form-control sign__input">
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Trip Date') }} </label>
                        <input type="date" name="trip_date"  value="{{$trip->trip_date}}" class="form-control sign__input"  required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Departure Time') }}</label>
                        <input type="time" name="departure_time" value="{{$trip->departure_time}}" class="form-control sign__input">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ _lang('Trip Notes') }}</label>
                        <textarea name="trip_notes" class="form-control " rows="4">{{$trip->trip_notes}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 mt-4">
        <button type="submit" class="btn btn-primary btn-lg"><i class="ti-save"></i> {{ _lang('Save Trip') }}</button>
    </div>
</form>


            </div>
        </div>
    </div>
</div>
