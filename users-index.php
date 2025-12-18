<!-- Users Start -->
<div class="container-fluid px-0 mb-4">
    <div class="bg-white rounded-box p-4">

        <div class="d-flex align-items-center justify-content-between mb-3">
            <h6 class="mb-0 fw-semibold">Users Management</h6>
            <a href="#" class="text-primary">Show All</a>
        </div>

        <div class="d-flex justify-content-end mb-3">
            <a class="btn btn-sm btn-warning">
                <i class="fa fa-user-plus me-1"></i> Add User
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th><input class="form-check-input" type="checkbox"></th>
                        <th>Date</th>
                        <th>Invoice</th>
                        <th>User</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
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
                        <td class="text-center">
                            <a class="btn btn-sm btn-warning me-1" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" title="Delete">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>02 Jan 2045</td>
                        <td>INV-0124</td>
                        <td>Jane Smith</td>
                        <td>$210</td>
                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-warning me-1">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
</div>
<!-- Users End -->
