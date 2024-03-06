
@extends('layouts/layoutMaster')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
@endsection

@section('vendor-script')
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/app-logistics-dashboard.js') }}"></script>
@endsection

@section('title', 'Demand Forecasting')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-9 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0 pl-0 pl-sm-2 p-2">Latest Defect Statistics</h5>
                    <div class="card-action-element ms-auto py-0">
                        <form action="{{ route('pages-page-2') }}" method="GET" class="d-flex align-items-center">
                            <select name="product" class="form-select form-select-sm me-2">
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ $selectedProduct == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="salesChart" width="800" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3">
            <h6>Sales and Predictions</h6>
            <h7>Sales Data</h7>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity Sold</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td>{{ $sale->product->name }}</td>
                            <td>{{ $sale->quantity_sold }}</td>
                            <td>{{ $sale->created_at->format('M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($selectedProduct)
                <h5 class="mt-4">Predicted Sales for {{ $predictedProductName }}</h5>
                <p>Next Month Predicted Sales: {{ $predictedNextMonthSales }}</p>
                <p>Predicted Month: {{ $predictedMonth }}</p>
            @endif
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var ctx = document.getElementById('salesChart').getContext('2d');

// Determine the last index of the sales data
var lastIndex = 0;
@foreach($sales as $index => $sale)
    lastIndex = {{ $index }};
@endforeach

// Define labels and datasets based on the sales data and predicted sales
var labels = [
    @foreach($sales as $sale)
        '{{ $sale->created_at->format("M Y") }}',
    @endforeach
];

var datasets = [
    {
        label: 'Actual Sales',
        data: [
            @foreach($sales as $sale)
                {{ $sale->quantity_sold }},
            @endforeach
        ],
        borderColor: 'green',
        backgroundColor: 'rgba(0, 255, 0, 0.1)',
        fill: false
    },
    {
        label: 'Regression Line',
        data: [
            @foreach($predictedSalesData[$selectedProduct]['regressionLine'] as $point)
                {{ $point['y'] }},
            @endforeach
        ],
        borderColor: 'blue',
        backgroundColor: 'rgba(0, 0, 255, 0.1)',
        fill: false
    }
];



// Limit the chart to display only the last 12 months of data
var labelsLimited = labels.slice(Math.max(labels.length - 12, 0));
var datasetsLimited = datasets.map(function(dataset) {
    return {
        ...dataset,
        data: dataset.data.slice(Math.max(dataset.data.length - 12, 0))
    };
});

// Create the chart with the updated data
var salesChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labelsLimited,
        datasets: datasetsLimited
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    min: 1
                }
            }],
            xAxes: [{
                ticks: {
                    autoSkip: false
                }
            }]
        },
        responsive: true, // Make the chart responsive
        maintainAspectRatio: false // Prevent chart from maintaining aspect ratio
    }
});
</script>


@endsection