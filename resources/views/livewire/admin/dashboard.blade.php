<div style="background-color: #f8fafc;">
<div class="container-xl py-5 px-4">
    <h2 class="mb-4">RealInvestment Dashboard</h2>

    <!-- Stat Cards -->
    <!-- ... [same as yours] ... -->
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Bids</h5>
                    <h3>{{ number_format($activeBids) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Properties Sold</h5>
                    <h3>{{ number_format($propertiesSold) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Active Auctions</h5>
                    <h3>{{ number_format($activeAuctions) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Revenue</h5>
                    <h3>PK {{ number_format($auctionRevenue) }}</h3>
                </div>
            </div>
        </div>
    </div>


    <div class="card card-default">
        <div class="card-header">
            <h2>Transactions</h2>
{{--            <div>--}}
{{--                <select wire:model.live="timeFilter">--}}
{{--                    <option value="daily">Daily</option>--}}
{{--                    <option value="monthly">Monthly</option>--}}
{{--                    <option value="yearly">Yearly</option>--}}
{{--                </select>--}}

{{--                <span>{{$timeFilter}}</span>--}}
{{--            </div>--}}

        </div>
        <div class="card-body">
            <canvas id="transactionsChart"></canvas>
        </div>
    </div>
</div>


<!-- ✅ Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        const transactionLineChart = @json($transactionLineChart);

        // Transactions Line Chart
        new Chart(document.getElementById("transactionsChart"), {
            type: 'line',
            data: {
                labels: transactionLineChart.labels,
                datasets: [
                    {
                        label: "Total Transactions",
                        backgroundColor: "#4e73df",
                        data: transactionLineChart.totalTransactions
                    },
                    {label: "Buy",  backgroundColor: "#1cc88a", data: transactionLineChart.buy},
                    {label: "Sold", type: 'line', borderColor: "#e74a3b", data: transactionLineChart.sold}
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Total Transactions'
                    }
                }
            }
        });
    });
</script>
</div>
