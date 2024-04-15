@extends('backend.layouts.header')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-4">Vehicle Create</h1>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('vehicles.index') }}">Vehicles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Vehicle Create</li>
        </ol>
    </nav>

    <div class="card-body">
    <form method="POST" action="{{ route('vehicles.store') }}" enctype="multipart/form-data">
    @csrf
    <h4>Basic Information</h4>
    <!-- Row 1 -->
    <div class="row mb-3">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">{{ _lang('Brand') }}</label>
                <select class="form-control select2-ajax" name="brand_id" id="brand_id" required>
                    <option value="">{{ _lang('Select One') }}</option>
                    {{-- Assuming create_option is a helper function that generates options --}}
                    {{ create_option("car_brands", "id", "name", old('brand_id')) }}
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <label for="model_id" class="form-label">{{ _lang('Model') }}</label>
            <select class="form-control select2-ajax" name="model_id" id="model_id" required>
                {{-- Models will be populated dynamically based on the selected brand --}}
            </select>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">{{ _lang('Manufacture Year') }}</label>
                <select class="form-control" name="manufacture_year" id="manufacture_year" required>
                    <option value="">{{ _lang('Select One') }}</option>
                    {{-- Assuming create_option is a helper function that generates options --}}
                    {{ create_option("years", "id", "year", old('manufacture_year')) }}
                </select>
            </div>
        </div>

     
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">{{ _lang('Upload Photos') }}</label>
                <input type="file" name="files[]" multiple class="form-control @error('files') is-invalid @enderror">
                @error('files')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <!-- Section 2: Vehicle Details -->
    <h4>Vehicle Details</h4>
    <!-- Row 2 -->
    <div class="row mb-3">
           <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">{{ _lang('Register Year') }}</label>
                <select class="form-control" name="register_year" id="register_year" required>
                    <option value="">{{ _lang('Select One') }}</option>
                    {{-- Assuming create_option is a helper function that generates options --}}
                    {{ create_option("years", "id", "year", old('register_year')) }}
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">{{ _lang('Transmission') }}</label>
                <select class="form-control select2-ajax" name="transmission_id" id="transmission_id" required>
                    <option value="">{{ _lang('Select One') }}</option>
                    {{-- Assuming create_option is a helper function that generates options --}}
                    {{ create_option("transmissions", "id", "name", old('transmission_id')) }}
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">{{ _lang('Body Type') }}</label>
                <select class="form-control select2-ajax" name="body_type_id" id="body_type_id" required>
                    <option value="">{{ _lang('Select One') }}</option>
                    {{-- Assuming create_option is a helper function that generates options --}}
                    {{ create_option("car_body_types", "id", "name", old('body_type_id')) }}
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <label for="mileage" class="form-label">{{ _lang('Mileage') }}</label>
            <input type="number" class="form-control @error('mileage') is-invalid @enderror" id="mileage" name="mileage" value="{{ old('mileage') }}">
            @error('mileage')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="in_color" class="form-label">{{ _lang('Interior color') }}</label>
            <input type="text" class="form-control @error('in_color') is-invalid @enderror" id="in_color" name="in_color" value="{{ old('in_color') }}">
            @error('in_color')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="ex_color" class="form-label">{{ _lang('Exterior Color') }}</label>
            <input type="text" class="form-control @error('ex_color') is-invalid @enderror" id="ex_color" name="ex_color" value="{{ old('ex_color') }}">
            @error('ex_color')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row mb-3">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">{{ _lang('Drive') }}</label>
                <select class="form-control select2-ajax" name="drive_type_id" id="drive_type_id" required>
                    <option value="">{{ _lang('Select One') }}</option>
                    {{-- Assuming create_option is a helper function that generates options --}}
                    {{ create_option("drive_types", "id", "name", old('drive_type_id')) }}
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <label for="license_plate" class="form-label">{{ _lang('License Plate') }}</label>
            <input type="text" class="form-control @error('license_plate') is-invalid @enderror" id="license_plate" name="license_plate" value="{{ old('license_plate') }}">
            @error('license_plate')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-2">
            <label for="seating_capacity" class="form-label">{{ _lang('Seating Capacity') }}</label>
            <input type="number" class="form-control @error('seating_capacity') is-invalid @enderror" id="seating_capacity" name="seating_capacity" value="{{ old('seating_capacity') }}">
            @error('seating_capacity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-2">
        <label for="ex_color" class="form-label">{{ _lang('Select Fuel') }}</label>
        @foreach($fuelTypes as $fuelType)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="fuel_types[]" value="{{ $fuelType->id }}" id="fuel_type_{{ $fuelType->id }}">
        <label class="form-check-label" for="fuel_type_{{ $fuelType->id }}">
            {{ $fuelType->name }}
        </label>
    </div>
@endforeach
    </div>
      
    </div>
    </div>

    <!-- Row 3 -->
    <div class="row mb-3">
      
        <div class="col-md-3">
            <label for="engine_number" class="form-label">{{ _lang('Engine Number') }}</label>
            <input type="text" class="form-control @error('engine_number') is-invalid @enderror" id="engine_number" name="engine_number" value="{{ old('engine_number') }}">
            @error('engine_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="engine_capacity" class="form-label">{{ _lang('Engine Capacity') }}</label>
            <input type="number" class="form-control @error('engine_capacity') is-invalid @enderror" id="engine_capacity" name="engine_capacity" value="{{ old('engine_capacity') }}">
            @error('engine_capacity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="chassis_number" class="form-label">{{ _lang('Chassis Number') }}</label>
            <input type="text" class="form-control @error('chassis_number') is-invalid @enderror" id="chassis_number" name="chassis_number" value="{{ old('chassis_number') }}">
            @error('chassis_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="weight" class="form-label">{{ _lang('Weight') }}</label>
            <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight') }}">
            @error('weight')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    
    </div>

 

    <!-- Section 3: Purchase and Service Information -->
    <h4>Purchase and Service Information</h4>
    <!-- Row 5 -->
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="purchase_date" class="form-label">{{ _lang('Purchase Date') }}</label>
            <input type="date" class="form-control @error('purchase_date') is-invalid @enderror" id="purchase_date" name="purchase_date" value="{{ old('purchase_date') }}">
            @error('purchase_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="purchase_price" class="form-label">{{ _lang('Purchase Price') }}</label>
            <input type="number" class="form-control @error('purchase_price') is-invalid @enderror" id="purchase_price" name="purchase_price" value="{{ old('purchase_price') }}">
            @error('purchase_price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Row 6 -->
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="supplier_name" class="form-label">{{ _lang('Supplier Name') }}</label>
            <input type="text" class="form-control @error('supplier_name') is-invalid @enderror" id="supplier_name" name="supplier_name" value="{{ old('supplier_name') }}">
            @error('supplier_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="supplier_phone" class="form-label">{{ _lang('Supplier Phone') }}</label>
            <input type="text" class="form-control @error('supplier_phone') is-invalid @enderror" id="supplier_phone" name="supplier_phone" value="{{ old('supplier_phone') }}">
            @error('supplier_phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="purchase_note" class="form-label">{{ _lang('Purchase Note') }}</label>
            <input type="text" class="form-control @error('purchase_note') is-invalid @enderror" id="purchase_note" name="purchase_note" value="{{ old('purchase_note') }}">
            @error('purchase_note')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <h4>Rental Information</h4>
    <!-- Row 7 -->
    <div class="row mb-3">
        <div class="col-md-2">
            <label for="price_per_km" class="form-label">{{ _lang('Price / KM') }}</label>
            <input type="number" class="form-control @error('price_per_km') is-invalid @enderror" id="price_per_km" name="price_per_km" value="{{ old('price_per_km') }}">
            @error('price_per_km')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-2">
            <label for="price_per_day" class="form-label">{{ _lang('Price / Day') }}</label>
            <input type="number" class="form-control @error('price_per_day') is-invalid @enderror" id="price_per_day" name="price_per_day" value="{{ old('price_per_day') }}">
            @error('price_per_day')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label class="control-label">{{ _lang('Assign Driver') }}</label>
                <select class="form-control select2" name="driver_id" required>
                    <option value="">{{ _lang('Select One') }}</option>
                    {{ create_option("drivers","id","name",old('driver_id'),array("company_id="=>company_id())) }}
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">{{ _lang('Status') }}</label>
                <select class="form-control select2" name="status" required>
                    <option value="">{{ _lang('Select One') }}</option>
                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="form-group">
                <label for="description" class="form-label">{{ _lang('Description') }}</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ _lang('Close') }}</button>
        <button type="submit" class="btn btn-primary">{{ _lang('Save') }}</button>
    </div>
</form>


    </div>
</div>
<script>
    // Wait for the document to be ready
    document.addEventListener("DOMContentLoaded", function() {
        // Get the brand select element
        const brandSelect = document.getElementById('brand_id');
        // Get the model select element
        const modelSelect = document.getElementById('model_id');

        // Add event listener to brand select element
        brandSelect.addEventListener('change', function() {
            // Clear existing options
            modelSelect.innerHTML = '';

            // Get the selected brand ID
            const brandId = this.value;

            // If no brand is selected, do nothing
            if (!brandId) return;

            // Make an AJAX request to get models of the selected brand
            fetch(`{{ route('fetch_models', ['brand_id' => ':brand_id']) }}`.replace(':brand_id', brandId))
                .then(response => response.json())
                .then(data => {
                    // Iterate over the models and add them as options to the model select element
                    data.forEach(model => {
                        const option = document.createElement('option');
                        option.value = model.id;
                        option.textContent = model.name;
                        modelSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching models:', error);
                });
        });
    });
</script>

@endsection
