@extends('backend.layouts.header')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-6">
        <h1 class="h3 mb-2 pt-3 text-gray-800">	{{ _lang('Dashboard') }}</h1>
        </div>
        <div class="col-sm-6">
        <form class="validate" method="post" action="{{ route('dashboard.exex') }}">
                        <div class="row">
                            {{ csrf_field() }}

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Date From') }}</label>
                                    <input type="date" class="form-control datepicker" name="date1" id="date1"
                                        value="{{ isset($date1) ? $date1 : old('date1') }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Date To') }}</label>
                                    <input type="date" class="form-control datepicker" name="date2" id="date2"
                                        value="{{ isset($date2) ? $date2 : old('date2') }}"  required>
                                </div>
                            </div>


                            <div class="col-md-4 mtop">
                                <button type="submit" class="btn btn-primary btn-sm">{{ _lang('View Report') }}</button>
                            </div>
                        </div>
                    </form>
        </div>
    </div>


    <!-- Content Row -->
    <div class="row">

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
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ _lang('Revenue') }}</div>
                    <div class="h3 mb-0 font-weight-bold text-gray-800">{{currency()}}{{ $tincome ?? ''}}</div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ _lang('Expenses') }}</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{currency()}}{{ $texpense ?? ''}}</div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ _lang('Issues') }}</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{$issue ?? ''}}</div>
                
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ _lang('Services') }}</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $service ?? ''}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 
            
                   
                
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                              {{ _lang('Trips')}}
                            </div>
                            <canvas id="dayWiseTripsChart" height="300"></canvas>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                       {{ _lang('INCOME VS EXPENSE')}}
                                    </div>
                                    <canvas id="incomeVsExpenseChart"  height="300"></canvas>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        {{_lang('EXPENSE BY CATEGORY')}}
                                    </div>
                                 
                                    <div class="card-body text-center"> <canvas id="expenseChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                        </div>
                
</div>





       



@push('js-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>
        // Get the data passed from the controller
        var dayWiseData = @json($day_wise_data);

        // Extract labels, income, and expense amounts from dayWiseData
        var labels = dayWiseData.map(item => formatDate(item.trans_date));
        var incomeData = dayWiseData.map(item => item.income);
        var expenseData = dayWiseData.map(item => item.expense);

        // Create a new Chart instance
        var ctx = document.getElementById('incomeVsExpenseChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Income',
                    backgroundColor: '#8ee26b',
                    borderColor: '#8ee26b',
                    borderWidth: 1,
                    data: incomeData
                }, {
                    label: 'Expense',
                    backgroundColor: '#f4516c',
                    borderColor: '#f4516c',
                    borderWidth: 1,
                    data: expenseData
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                plugins: {
                    datalabels: {
                        formatter: (value, context) => {
                            // Display value on top of each bar
                            return value.toLocaleString(); // Format number with commas
                        },
                        align: 'end', // Align data labels at the end of bars
                        anchor: 'end' // Anchor data labels at the end of bars
                    }
                }
            }
        });

        // Function to format date as "dd month year"
        function formatDate(date) {
            var options = { day: 'numeric', month: 'short', year: 'numeric' };
            return new Date(date).toLocaleDateString('en-US', options);
        }
    </script>

<script>

        var ctx = document.getElementById('expenseChart').getContext('2d');
        var chartData = @json($chart_data);

        var labels = Object.keys(chartData);
        var data = Object.values(chartData);

        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Expense Report',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                title: {
                    display: false,
                    text: 'Expense Report by Expense Type'
                }
            }
        });
    </script>

<script>
        // Get the data passed from the controller
        var dayWiseTripData = @json($day_wise_trip_data);

        // Function to format date as "day month year"
        function formatDate(date) {
            var options = { day: '2-digit', month: 'short', year: 'numeric' };
            return new Date(date).toLocaleDateString('en-US', options);
        }

        // Extract labels (dates) and trip counts from dayWiseTripData
        var labels = dayWiseTripData.map(item => formatDate(item.trip_date));
        var tripCounts = dayWiseTripData.map(item => item.trip_count);

        // Create a new Chart instance
        var ctx = document.getElementById('dayWiseTripsChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Trips',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: tripCounts
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
<script src="{{ asset('template/assets/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('template/assets/demo/chart-bar-demo.js') }}"></script>
<script src="{{ asset('template/assets/demo/chart-pie-demo.js') }}"></script>

@endpush
@endsection


