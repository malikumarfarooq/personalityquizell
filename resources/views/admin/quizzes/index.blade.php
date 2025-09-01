@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Quizzes</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('admin.quizzes.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus me-1"></i> Create New Quiz
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <form method="GET" action="{{ route('admin.quizzes.index') }}">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search quizzes..." name="search" value="{{ $search }}">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                @if($search || $status !== 'all')
                                    <a href="{{ route('admin.quizzes.index') }}" class="btn btn-outline-danger" type="button">
                                        <i class="fas fa-times"></i>
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fas fa-filter me-1"></i>{{ $status === 'all' ? 'All Status' : ucfirst($status) }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('admin.quizzes.index', ['search' => $search]) }}">All Status</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('admin.quizzes.index', ['search' => $search, 'status' => 'active']) }}">Active</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.quizzes.index', ['search' => $search, 'status' => 'draft']) }}">Draft</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.quizzes.index', ['search' => $search, 'status' => 'archived']) }}">Archived</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                @if($quizzes->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Questions</th>
                                <th>Duration</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quizzes as $quiz)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.quizzes.show', $quiz) }}" class="text-decoration-none text-dark fw-bold">
                                            {{ $quiz->title }}
                                        </a>
                                        @if($quiz->description)
                                            <br><small class="text-muted">{{ Str::limit($quiz->description, 50) }}</small>
                                        @endif
                                    </td>
                                    <td>
                                    <span class="badge {{ $quiz->status_badge }}">
                                        <i class="fas
                                            @if($quiz->status === 'active') fa-check-circle
                                            @elseif($quiz->status === 'draft') fa-pencil-alt
                                            @else fa-archive
                                            @endif me-1"></i>
                                        {{ ucfirst($quiz->status) }}
                                    </span>
                                    </td>
                                    <td>
                                    <span class="badge bg-light text-dark">
                                        <i class="fas fa-question me-1"></i>{{ $quiz->questions_count }}
                                    </span>
                                    </td>
                                    <td>
                                        @if($quiz->duration)
                                            <span class="badge bg-info">
                                            <i class="fas fa-clock me-1"></i>{{ $quiz->duration }}m
                                        </span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>{{ $quiz->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.quizzes.show', $quiz) }}" class="btn btn-outline-info" title="View" data-bs-toggle="tooltip">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.quizzes.edit', $quiz) }}" class="btn btn-outline-primary" title="Edit" data-bs-toggle="tooltip">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.quizzes.destroy', $quiz) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this quiz?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" title="Delete" data-bs-toggle="tooltip">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="text-muted">
                            Showing {{ $quizzes->firstItem() }} to {{ $quizzes->lastItem() }} of {{ $quizzes->total() }} results
                        </div>
                        {{ $quizzes->links() }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-clipboard-list fa-3x text-muted mb-3"></i>
                        <h5>No quizzes found</h5>
                        <p class="text-muted">
                            @if($search || $status !== 'all')
                                Try adjusting your search or filter criteria
                            @else
                                Get started by creating your first quiz
                            @endif
                        </p>
                        @if($search || $status !== 'all')
                            <a href="{{ route('admin.quizzes.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i> Clear filters
                            </a>
                        @else
                            <a href="{{ route('admin.quizzes.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-1"></i> Create Quiz
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>
@endpush
