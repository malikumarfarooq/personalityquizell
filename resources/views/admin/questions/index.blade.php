@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Questions</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="#" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus me-1"></i> Add New Question
                </a>
            </div>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search questions..." name="search">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                All Quizzes
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">All Quizzes</a></li>
                                <li><a class="dropdown-item" href="#">Personality Assessment</a></li>
                                <li><a class="dropdown-item" href="#">Career Guidance Quiz</a></li>
                                <li><a class="dropdown-item" href="#">Skills Evaluation</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                        <tr>
                            <th>Question</th>
                            <th>Quiz</th>
                            <th>Type</th>
                            <th>Image</th>
                            <th>Required</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>What is your preferred work environment?</td>
                            <td>Personality Assessment</td>
                            <td><span class="badge bg-info">radio</span></td>
                            <td><i class="fas fa-times text-muted"></i></td>
                            <td><span class="badge bg-success">Required</span></td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="#" class="btn btn-outline-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-danger" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Select all skills you possess:</td>
                            <td>Personality Assessment</td>
                            <td><span class="badge bg-warning text-dark">checkbox</span></td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td><span class="badge bg-secondary">Optional</span></td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="#" class="btn btn-outline-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-danger" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Describe your ideal career path:</td>
                            <td>Career Guidance Quiz</td>
                            <td><span class="badge bg-primary">textarea</span></td>
                            <td><i class="fas fa-times text-muted"></i></td>
                            <td><span class="badge bg-success">Required</span></td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="#" class="btn btn-outline-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-danger" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>What motivates you most?</td>
                            <td>Skills Evaluation</td>
                            <td><span class="badge bg-info">radio</span></td>
                            <td><i class="fas fa-times text-muted"></i></td>
                            <td><span class="badge bg-success">Required</span></td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="#" class="btn btn-outline-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-danger" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
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
            opacity: 0.5;
        }
    </style>
@endpush
