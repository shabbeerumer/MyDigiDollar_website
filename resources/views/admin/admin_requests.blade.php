<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .table-responsive .dropdown-menu {
            position: absolute !important;
            z-index: 1000;
        }
    
        .dropdown {
            position: relative;
        }
    </style>
</head>
<body>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h3>Admin Requests</h3>
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
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Package</th>
                            <th class="text-center">image</th>

                            <th>Deposit Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($requests as $request)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $request->username }}</td>
                                <td>{{ $request->email }}</td>
                                <td>{{ $request->package }}</td>
                                <td class="text-center"><img src="../image/{{$request->image}}" alt="" height="30%" width="30%" > </td>
                                <td>{{ $request->deposit_amount }}</td>
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
                                                <form action="{{ route('admin.requests.update', $request->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" name="status" value="approved" class="dropdown-item" {{ $request->status === 'approved' ? 'disabled' : '' }}>
                                                        Approve
                                                    </button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ route('admin.requests.update', $request->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" name="status" value="rejected" class="dropdown-item" {{ $request->status === 'rejected' ? 'disabled' : '' }}>
                                                        Reject
                                                    </button>
                                                </form>
                                            </li>
                                            @if($request->status !== 'pending')
                                            <li>
                                                <form action="{{ route('admin.requests.update', $request->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" name="status" value="pending" class="dropdown-item">
                                                        Set Pending
                                                    </button>
                                                </form>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </td>
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No Requests Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
