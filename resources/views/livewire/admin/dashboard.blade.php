<body style="background-color: #f8fafc;">
    <div class="container-xl py-5 px-4">
        <h2 class="mb-4">RealInvestment Dashboard</h2>

        <!-- Stat Cards -->
        <!-- ... [same as yours] ... -->
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Bids</h5>
                        <h3>5,320</h3>
                        <p class="text-success">+12% ↑</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Properties Sold</h5>
                        <h3>2,150</h3>
                        <p class="text-success">+8% ↑</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Active Auctions</h5>
                        <h3>120</h3>
                        <p class="text-danger">-5% ↓</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Auction Revenue</h5>
                        <h3>$980,000</h3>
                        <p class="text-success">+30% ↑</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Chart Row -->
        <!-- ... [same as yours] ... -->
        <div class="row mb-5">
            <div class="col-md-8">
                <canvas id="monthlyChart"></canvas>
            </div>
            <div class="col-md-4">
                <canvas id="propertyTypeChart"></canvas>
            </div>
        </div>

        <!-- Line Chart for Bidding Activity -->
        <!-- ... [same as yours] ... -->
        <div class="row">
            <div class="col">
                <canvas id="biddingLineChart"></canvas>
            </div>
        </div>
    </div>
    </div>

    <!-- ✅ Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- ✅ Run After DOM Loaded -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Monthly Chart
            new Chart(document.getElementById("monthlyChart"), {
                type: 'bar',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [
                        { label: "Bids", backgroundColor: "#6366f1", data: [45, 60, 55, 70, 90, 110, 80, 75, 95, 65, 50, 60] },
                        { label: "Sold", backgroundColor: "#10b981", data: [30, 45, 50, 60, 80, 95, 60, 70, 85, 55, 40, 50] },
                        { label: "Profit", type: 'line', borderColor: "#f59e0b", data: [15, 25, 20, 30, 10, 40, 20, 30, 40, 25, 20, 30], fill: false }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Monthly Investment Summary'
                        }
                    }
                }
            });

            // Property Type Pie Chart
            new Chart(document.getElementById("propertyTypeChart"), {
                type: 'pie',
                data: {
                    labels: ["Residential", "Commercial", "Land"],
                    datasets: [{
                        data: [45, 35, 20],
                        backgroundColor: ["#3b82f6", "#ec4899", "#facc15"]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Property Type Distribution'
                        }
                    }
                }
            });

            // Bidding Activity Line Chart
            new Chart(document.getElementById("biddingLineChart"), {
                type: 'line',
                data: {
                    labels: ["04 Jan", "05 Jan", "06 Jan", "07 Jan", "08 Jan", "09 Jan", "10 Jan"],
                    datasets: [
                        { label: "Total Bids", borderColor: "#8b5cf6", data: [6, 10, 8, 18, 15, 5, 17], fill: false },
                        { label: "Winning Bids", borderColor: "#fbbf24", borderDash: [5, 5], data: [10, 6, 12, 11, 24, 6, 30], fill: false }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Daily Bidding Activity'
                        }
                    }
                }
            });
        });
    </script>
</body>
