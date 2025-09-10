@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Questions</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('admin.questions.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus me-1"></i> Add New Question
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <form method="GET" action="{{ route('admin.questions.index') }}">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search questions..." name="search" value="{{ $search }}">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                {{ $quizId ? ($quizzes->find($quizId)->title ?? 'Selected Quiz') : 'All Quizzes' }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('admin.questions.index', ['search' => $search]) }}">All Quizzes</a></li>
                                @foreach($quizzes as $quiz)
                                    <li><a class="dropdown-item" href="{{ route('admin.questions.index', ['search' => $search, 'quiz_id' => $quiz->id]) }}">{{ $quiz->title }}</a></li>
                                @endforeach
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
                            <th>Options</th>
                            <th>Required</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($questions as $question)
                            <tr>
                                <td>{{ Str::limit($question->text, 50) }}</td>
{{--                                <td>{{ $question->quiz->title }}</td>--}}
                                <td>{{ $question->quiz?->title ?? 'No Quiz Assigned' }}</td>
                                <td><span class="badge {{ $question->type_badge }}">{{ $question->type }}</span></td>
                                <td>{{ $question->options_count ?? $question->options->count() }}</td>
                                <td>{!! $question->required_badge !!}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.questions.show', $question) }}" class="btn btn-outline-info" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.questions.edit', $question) }}" class="btn btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.questions.destroy', $question) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No questions found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $questions->links() }}
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
        .btn-group-sm .btn {
            padding: 0.25rem 0.5rem;
        }
    </style>
@endpush
