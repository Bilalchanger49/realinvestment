@extends('layouts.auth')

@section('title', 'Dashboard')

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="row">

            {{-- Status Cards --}}
            @foreach (['Pending', 'In Progress', 'Completed'] as $status)
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card card-default card-mini">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h2>{{ $status }}</h2>
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                <div class="dropdown-menu dropdown-menu-right"></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <i class="mdi mdi-arrow-up-bold text-success"></i>
                            {{-- <span class="mx-1">{{ $$status }}</span> --}}
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Pie Chart --}}
            <div class="col-xl-4 col-sm-6 mb-4">
                <div class="card card-default">
                    <div class="card-header">
                        <h2>Investment Distribution</h2>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart" height="220"></canvas>
                    </div>
                </div>
            </div>

            {{-- Bar Chart --}}
            <div class="col-xl-6 col-sm-12 mb-4">
                <div class="card card-default">
                    <div class="card-header">
                        <h2>Weekly Bids</h2>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart" height="220"></canvas>
                    </div>
                </div>
            </div>

            {{-- Combo Bar Line --}}
            <div class="col-xl-12 col-sm-12 mb-4">
                <div class="card card-default">
                    <div class="card-header">
                        <h2>Ads vs Shares vs Profit</h2>
                    </div>
                    <div class="card-body">
                        <canvas id="comboChart" height="220"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Pie Chart - Investment Distribution
    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: ['Properties', 'Auctions', 'Advertisements', 'Shares'],
            datasets: [{
                data: [45, 25, 15, 15],
                backgroundColor: ['#5ba600', '#2bbbad', '#feca57', '#ff6b6b'],
                borderWidth: 1
            }]
        }
    });

    // Bar Chart - Weekly Bids
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Bids Placed',
                data: [12, 19, 3, 5, 2, 3, 9],
                backgroundColor: 'rgba(91, 166, 0, 0.7)'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Combo Bar + Line Chart
    new Chart(document.getElementById('comboChart'), {
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [
                {
                    type: 'bar',
                    label: 'Ad Revenue ($)',
                    data: [800, 950, 870, 1100, 1020, 1150],
                    backgroundColor: '#feca57'
                },
                {
                    type: 'bar',
                    label: 'Share Purchases ($)',
                    data: [400, 420, 390, 600, 500, 530],
                    backgroundColor: '#54a0ff'
                },
                {
                    type: 'line',
                    label: 'Net Gain ($)',
                    data: [400, 530, 480, 500, 520, 620],
                    borderColor: '#5ba600',
                    fill: false,
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection
