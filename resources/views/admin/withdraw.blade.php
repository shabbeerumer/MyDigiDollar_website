<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Withdraw Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Prevent dropdown from being cut off */
        .table-responsive .dropdown-menu {
            position: absolute !important;
            z-index: 1000;
        }
    
        /* Ensure dropdown has full visibility */
        .dropdown {
            position: relative;
        }
    </style>
    
</head>
<body>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h3>Withdraw Requests</h3>
                <select class="form-select form-select-sm w-25">
                    <option>All Statuses</option>
                    <option>Pending</option>
                    <option>Approved</option>
                    <option>Rejected</option>
                </select>
            </div>
            
            <div class="">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Date</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($withdrawRequests as $request)
                            <tr>
                                <td>{{ $request->user_name }}</td>
                                <td>${{ number_format($request->withdraw_amount, 2) }}</td>
                                <td>{{ ucfirst($request->payment_methods) }}</td>
                                <td>{{ $request->created_at->format('d M Y') }}</td>
                                <td>{{ $request->address }}</td>

                                <td>
                                    @switch($request->status)
                                        @case('pending')
                                            <span class="badge bg-warning">Pending</span>
                                            @break
                                        @case('approved')
                                            <span class="badge bg-success">Approved</span>
                                            @break
                                        @case('rejected')
                                            <span class="badge bg-danger">Rejected</span>
                                            @break
                                    @endswitch
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <form action="{{ route('admin.updateWithdrawRequest', $request->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="approved">
                                                    <button type="submit" class="dropdown-item">Approve</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ route('admin.updateWithdrawRequest', $request->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="rejected">
                                                    <button type="submit" class="dropdown-item">Reject</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No Withdraw Requests</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- <div class="card-footer">
                {{ $withdrawRequests->links() }}
            </div> --}}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
