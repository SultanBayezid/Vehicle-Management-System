@extends('backend.layouts.header')

@section('content')
<!-- jQuery -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-4">Services</h1>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('services.index')}}">Services</a></li>

            <li class="breadcrumb-item active"  aria-current="page">Service Create</li>
        </ol>
    </nav>
                      
                      
                            <div class="card-body">
                         
                            <form method="post" class="validate" autocomplete="off" action="{{ route('services.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Vehicle') }}</label>
                                            <select class="form-control" data-value="id" data-display="vehicle_id" data-table="vehicles" data-where="1" name="vehicle_id" id="vehicle_id" required>
                                                <option value="">{{ __('Select One') }}</option>
                                                @foreach($vehicles as $vehicle)
                                                <option value="{{$vehicle->id}}">{{$vehicle->brand->name}} {{$vehicle->model->name}} {{$vehicle->myear->year}}</option>
                                                @endforeach
                                            </select>
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
                                           
                                            <div id="vehicleIssues"></div>

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
                   


                        <script>
 document.getElementById('vehicle_id').addEventListener('change', function() {
    var vehicleId = this.value;
    fetch('/get-vehicle-issues/' + vehicleId)
        .then(response => response.json())
        .then(data => {
            var issuesHtml = ''; // Initialize issuesHtml here
            if (data.length > 0) {
                issuesHtml += '<p>Select any issues that were resolved as part of this service:</p>';
                issuesHtml += '<div class="form-check">'; // Add form-check class here
                data.forEach(issue => {
                    issuesHtml += '<label class="form-check-label" style="display: block;">'; // Add form-check-label class here
                    issuesHtml += '<input type="checkbox" class="form-check-input" name="issues[]" value="' + issue.id + '" style="margin-right: 5px;">';
                    issuesHtml += issue.summary;
                    issuesHtml += '</label>';
                });
                issuesHtml += '</div>';
            } else {
                issuesHtml += '<p>No issues found for this vehicle.</p>';
            }
            document.getElementById('vehicleIssues').innerHTML = issuesHtml;
        })
        .catch(error => {
            console.error('Error:', error);
        });
});

</script>


@endsection
