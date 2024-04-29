@extends('backend.layouts.header')
@section('content')
<style>
    .custom-right-align {
        text-align: right; /* Align text to the right in the second column */
        /* OR */
        /* float: right; */ /* Float the second column to the right */
    }
</style>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-10">
        <h1 class="h3 mb-2 pt-3 text-gray-800">	{{ _lang('Dashboard') }}</h1>
        </div>
        <div class="col-sm-2 ">
        <form class="validate  pt-3 mb-3" method="post" action="{{ route('dashboard.exex') }}">
            <div class="row">
                {{ csrf_field() }}
                    <div class="date-picker">
                        <select id="date-range" class="form-select form-select-lg mb-3">
                        <option value="today" {{ $selectedOption == 'today' ? 'selected' : '' }}>{{ _lang('Today')}}</option>
                        <option value="yesterday" {{ $selectedOption == 'yesterday' ? 'selected' : '' }}>{{ _lang('Yesterday')}}</option>
                        <option value="this-week" {{ $selectedOption == 'this-week' ? 'selected' : '' }}>{{ _lang('This Week')}}</option>
                        <option value="last-week" {{ $selectedOption == 'last-week' ? 'selected' : '' }}>{{ _lang('Last Week')}}</option>
                        <option value="this-month" {{ $selectedOption == 'this-month' ? 'selected' : '' }}>{{ _lang('This Month')}}</option>
                        <option value="last-month" {{ $selectedOption == 'last-month' ? 'selected' : '' }}>{{ _lang('Last Month')}}</option>
                        <option value="custom" {{ $selectedOption == 'custom' ? 'selected' : '' }}>{{ _lang('Custom')}}</option>
                        </select>
                        <div id="custom-date-picker" style="display: none;">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Date From') }}</label>
                                <input type="date" class="form-control datepicker" name="date1" id="date1"
                                    value="{{ isset($date1) ? $date1 : old('date1') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Date To') }}</label>
                                <input type="date" class="form-control datepicker" name="date2" id="date2"
                                    value="{{ isset($date2) ? $date2 : old('date2') }}"  required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">{{ _lang('View Report') }}</button>
                        </div>
                    </div>

            </div>
            <!-- Hidden input field to store the selected option value -->
            <input type="hidden" id="selected-option" name="selected_option">
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
                    <i class="fas fa-money-check-alt fa-2x text-primary"></i>
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
                            <i class="fas fa-calculator fa-2x text-success"></i>
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
                            <i class="fas fa-wrench fa-2x text-info"></i>
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
                            <i class="fas fa-tools fa-2x text-warning"></i>
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
                            <div class="card-footer small text-muted">{{ _lang('Showing data From')}} {{ \Carbon\Carbon::parse($date1)->format('d F Y') }}
 - To {{ \Carbon\Carbon::parse($date2)->format('d F Y') }}
</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                       {{ _lang('INCOME VS EXPENSE')}}
                                    </div>
                                    <canvas id="incomeVsExpenseChart"  height="300"></canvas>
                                    <div class="card-footer small text-muted">{{ _lang('Showing data From')}} {{ \Carbon\Carbon::parse($date1)->format('d F Y') }}
 - To {{ \Carbon\Carbon::parse($date2)->format('d F Y') }}</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        {{_lang('EXPENSE BY CATEGORY')}}
                                    </div>
                                 
                                    <div class="card-body text-center"> <canvas id="expenseChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">{{ _lang('Showing data From')}} {{ \Carbon\Carbon::parse($date1)->format('d F Y') }}
 - To {{ \Carbon\Carbon::parse($date2)->format('d F Y') }}</div>
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

    // Currency symbol
    var currencySymbol = '{{ currency() }}';

    // Create a new Chart instance
    var ctx = document.getElementById('incomeVsExpenseChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: '{{ _lang('Income') }}',
                backgroundColor: '#8ee26b',
                borderColor: '#8ee26b',
                borderWidth: 1,
                data: incomeData
            }, {
                label: '{{ _lang('Expense') }}',
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
                        beginAtZero: true,
                        callback: function(value, index, values) {
                            // Include currency symbol with the value
                            return currencySymbol + value.toLocaleString();
                        }
                    }
                }]
            },
            plugins: {
                datalabels: {
                    formatter: (value, context) => {
                        // Display value on top of each bar with currency symbol
                        return currencySymbol + value.toLocaleString(); // Format number with commas and include currency symbol
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
                        '#fde35a',
                        '#6b8cef',
                        '#c899f4',
                        '#69b8f4',
                        '#00af82',
                        '#e7792f'
                    ],
                    borderColor: [
                        '#fde35a',
                        '#6b8cef',
                        '#c899f4',
                        '#69b8f4',
                        '#00af82',
                        '#e7792f'
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
                    label: '{{_lang('Number of Trips')}}',
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

<script>
    document.getElementById('date-range').addEventListener('change', function() {
        var selectedOption = this.value;
        var customDatePicker = document.getElementById('custom-date-picker');
        var selectedOptionInput = document.getElementById('selected-option');

        if (selectedOption === 'custom') {
            customDatePicker.style.display = 'block';
        } else {
            customDatePicker.style.display = 'none';
            // Automatically set the selected option value in the hidden input field
            selectedOptionInput.value = selectedOption;
            // Automatically submit the form when an option other than "Custom" is selected
            document.querySelector('form.validate').submit();
        }
    });
</script>

<script src="{{ asset('template/assets/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('template/assets/demo/chart-bar-demo.js') }}"></script>
<script src="{{ asset('template/assets/demo/chart-pie-demo.js') }}"></script>

@endpush
@endsection


