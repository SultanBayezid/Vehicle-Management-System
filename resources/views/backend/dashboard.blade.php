@extends('backend.layouts.header')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 pt-3 text-gray-800">Dashboard</h1>

    <!-- Content Row -->
    <div class="row">
    @php
$tripsall = App\Models\Trip::All();
$vehicles = App\Models\Vehicle::All();
$vehiclescount = $vehicles->count();
$tripCount = $tripsall->count();
@endphp
@php $currency = currency(); @endphp
        <!-- Widgets -->
        <div class="col-lg-3 col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <i class="fas fa-road fa-2x text-primary"></i>
                        </div>
                        <div class="col-9 text-right">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Trips</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{$tripCount}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <i class="fas fa-chart-bar fa-2x text-success"></i>
                        </div>
                        <div class="col-9 text-right">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Revenue</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{currency()}}{{current_month_income()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <i class="fas fa-chart-pie fa-2x text-info"></i>
                        </div>
                        <div class="col-9 text-right">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Expenses</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{currency()}}{{current_month_expense() }}</div>
                
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <i class="fas fa-car fa-2x text-warning"></i>
                        </div>
                        <div class="col-9 text-right">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Vehicles</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{$vehiclescount}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row">
        <!-- Line Chart -->
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Line Chart</h6>
                </div>
                <div class="card-body">
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Bar Chart -->
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
                </div>
                <div class="card-body">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
    </div>
   @php
   $trips =  App\Models\Trip::limit(5)->get();
   @endphp
    <!-- Table Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Trips</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Pickup Location</th>
                                    <th>Dropoff Location</th>
                                    <th>Driver</th>
                                    <th>Vehicle</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trips as $trip)
                                <tr>
                                    <td><a href="{{route('trips.show', $trip->id)}}">{{$trip->trip_date}}</a></td>
                                    <td>{{$trip->pickup_location}}</td>
                                    <td>{{$trip->dropoff_location}}</td>
                                    <td>{{$trip->driver->name}}</td>
                                    <td>{{$trip->vehicle->name}}</td>
                                    <td><span class="badge badge-success">Active</span></td>
                                </tr>
                                @endforeach
                                <!-- Add more table rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="header-title">{{ _lang('Financial Account Balance') }}</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{ _lang('A/C') }}</th>
                            <th>{{ _lang('A/C Number') }}</th>
                            <th class="text-right">{{ _lang('Balance') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(get_financial_balance() as $account)
                        <tr id="row_{{ $account->id }}">
                            <td class='account_title'>{{ $account->account_title }}</td>
                            <td class='account_number'>{{ $account->account_number }}</td>
                            <td class='opening_balance text-right'>{{ decimalPlace($account->balance, $currency) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Include charting libraries and script initialization here -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script>
    // JavaScript code for chart initialization and data
    // Replace with your actual chart data and initialization logic
</script>
@endsection
