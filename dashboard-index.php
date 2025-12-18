<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            background-color: var(--light);
        }

        .card-soft {
            border-radius: 14px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
        }

        .text-muted-sm {
            font-size: 13px;
            color: #6c757d;
        }

        .icon-circle {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: rgba(13, 110, 253, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .rounded-box {
            border-radius: 14px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body>

    <div class="container-fluid p-4 bg-light">

        <!-- Stats Cards -->
        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-3">
                <div class="card-soft bg-white p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted-sm mb-1">Today Sales</p>
                        <h4 class="fw-bold mb-0">$1,234</h4>
                    </div>
                    <div class="icon-circle text-primary">
                        <i class="fa fa-chart-line"></i>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card-soft bg-white p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted-sm mb-1">Total Sales</p>
                        <h4 class="fw-bold mb-0">$18,420</h4>
                    </div>
                    <div class="icon-circle text-success">
                        <i class="fa fa-chart-bar"></i>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card-soft bg-white p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted-sm mb-1">Today Revenue</p>
                        <h4 class="fw-bold mb-0">$920</h4>
                    </div>
                    <div class="icon-circle text-primary">
                        <i class="fa fa-chart-area"></i>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card-soft bg-white p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted-sm mb-1">Total Revenue</p>
                        <h4 class="fw-bold mb-0">$32,100</h4>
                    </div>
                    <div class="icon-circle text-success">
                        <i class="fa fa-chart-pie"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts -->
        <div class="row g-4 mb-4">
            <div class="col-xl-6">
                <div class="bg-white rounded-box p-4">
                    <div class="d-flex justify-content-between mb-3">
                        <h6 class="mb-0">Worldwide Sales</h6>
                        <a href="#">Show All</a>
                    </div>
                    <canvas id="worldwide-sales"></canvas>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="bg-white rounded-box p-4">
                    <div class="d-flex justify-content-between mb-3">
                        <h6 class="mb-0">Sales & Revenue</h6>
                        <a href="#">Show All</a>
                    </div>
                    <canvas id="salse-revenue"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Sales -->
        <div class="bg-white rounded-box p-4 mb-4">
            <div class="d-flex justify-content-between mb-3">
                <h6 class="mb-0">Recent Sales</h6>
                <a href="#">Show All</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered text-start">
                    <thead class="table-light">
                        <tr>
                            <th><input class="form-check-input" type="checkbox"></th>
                            <th>Date</th>
                            <th>Invoice</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td>01 Jan 2045</td>
                            <td>INV-0123</td>
                            <td>John Doe</td>
                            <td>$123</td>
                            <td><span class="badge bg-success">Paid</span></td>
                            <td><a class="btn btn-sm btn-primary">Detail</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Widgets -->
        <div class="row g-4">
            <!-- Messages -->
            <div class="col-xl-4">
                <div class="bg-white rounded-box p-4 h-100">
                    <div class="d-flex justify-content-between mb-3">
                        <h6 class="mb-0">Messages</h6>
                        <a href="#">Show All</a>
                    </div>

                    <div class="d-flex align-items-center border-bottom py-3">
                        <img src="https://i.pravatar.cc/40" class="rounded-circle">
                        <div class="ms-3">
                            <h6 class="mb-0">John Doe</h6>
                            <small class="text-muted">15 minutes ago</small>
                            <p class="mb-0">Short message goes here...</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Calendar -->
            <div class="col-xl-4">
                <div class="bg-white rounded-box p-4 h-100">
                    <div class="d-flex justify-content-between mb-3">
                        <h6 class="mb-0">Calendar</h6>
                        <a href="#">Show All</a>
                    </div>
                    <div class="text-muted">Calendar placeholder</div>
                </div>
            </div>

            <!-- To Do -->
            <div class="col-xl-4">
                <div class="bg-white rounded-box p-4 h-100">
                    <div class="d-flex justify-content-between mb-3">
                        <h6 class="mb-0">To Do List</h6>
                        <a href="#">Show All</a>
                    </div>

                    <div class="d-flex mb-3">
                        <input class="form-control" placeholder="Enter task">
                        <button class="btn btn-primary ms-2">Add</button>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Finish dashboard UI</label>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>