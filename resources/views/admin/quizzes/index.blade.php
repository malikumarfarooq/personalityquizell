@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Quizzes</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.quizzes.create') }}" class="btn btn-sm btn-outline-secondary">
                Create Quiz
            </a>
        </div>
    </div>

    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Search quizzes...">
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Questions</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Personality Assessment</td>
                <td><span class="badge bg-success">active</span></td>
                <td>15</td>
                <td>2024-01-15</td>
                <td>
                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                </td>
            </tr>
            <tr>
                <td>Career Guidance Quiz</td>
                <td><span class="badge bg-secondary">draft</span></td>
                <td>8</td>
                <td>2024-01-10</td>
                <td>
                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                </td>
            </tr>
            <tr>
                <td>Skills Evaluation</td>
                <td><span class="badge bg-success">active</span></td>
                <td>22</td>
                <td>2024-01-05</td>
                <td>
                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                </td>
            </tr>
            <tr>
                <td>Learning Style Assessment</td>
                <td><span class="badge bg-warning text-dark">archived</span></td>
                <td>12</td>
                <td>2024-01-01</td>
                <td>
                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
