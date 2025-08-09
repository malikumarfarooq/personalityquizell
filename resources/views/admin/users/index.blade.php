@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Users</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="#" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus me-1"></i> Add User
                </a>
            </div>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h4 class="mb-4">Manage registered users and their permissions</h4>

                <div class="row mb-5">
                    <div class="col-md-3">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h6 class="card-title text-muted">Total Users</h6>
                                <h4 class="fw-bold">1,247</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h6 class="card-title text-muted">Active Users</h6>
                                <h4 class="fw-bold">1,024</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h6 class="card-title text-muted">Administrators</h6>
                                <h4 class="fw-bold">15</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h6 class="card-title text-muted">New This Month</h6>
                                <h4 class="fw-bold">87</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-5">

                <div class="mb-4">
                    <h5 class="mb-3">User List</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                            <tr>
                                <th>User</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Quizzes Taken</th>
                                <th>Joined</th>
                                <th>Last Active</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="fw-bold">John Doe</div>
                                    <div class="text-muted small">john@example.com</div>
                                </td>
                                <td><span class="badge bg-primary">user</span></td>
                                <td><span class="badge bg-success">active</span></td>
                                <td>3</td>
                                <td>2024-01-15</td>
                                <td>2024-01-20</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="fw-bold">Jane Smith</div>
                                    <div class="text-muted small">jane@example.com</div>
                                </td>
                                <td><span class="badge bg-danger">admin</span></td>
                                <td><span class="badge bg-success">active</span></td>
                                <td>12</td>
                                <td>2024-01-10</td>
                                <td>2024-01-21</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="fw-bold">Bob Johnson</div>
                                    <div class="text-muted small">bob@example.com</div>
                                </td>
                                <td><span class="badge bg-primary">user</span></td>
                                <td><span class="badge bg-success">active</span></td>
                                <td>1</td>
                                <td>2024-01-08</td>
                                <td>2024-01-19</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="fw-bold">Alice Brown</div>
                                    <div class="text-muted small">alice@example.com</div>
                                </td>
                                <td><span class="badge bg-primary">user</span></td>
                                <td><span class="badge bg-success">active</span></td>
                                <td>5</td>
                                <td>2024-01-05</td>
                                <td>2024-01-18</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .card.bg-light {
            background-color: #f8f9fa!important;
        }
        .badge {
            font-size: 0.85em;
            font-weight: 500;
            padding: 0.35em 0.65em;
        }
        .table th {
            white-space: nowrap;
        }
        .table td {
            vertical-align: middle;
        }
        .text-muted {
            opacity: 0.8;
        }
        .btn-group-sm .btn {
            padding: 0.25rem 0.5rem;
        }
    </style>
@endpush
