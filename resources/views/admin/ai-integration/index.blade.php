@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">AI Integration</h1>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h4 class="mb-4">Configure OpenAI ChatGPT integration for quiz analysis</h4>

                <div class="row mb-5">
                    <div class="col-md-8">
                        <h5 class="mb-3">OpenAI Configuration</h5>

                        <div class="mb-4">
                            <label class="form-label fw-bold">OpenAI API Key</label>
                            <div class="input-group mb-2">
                                <input type="password" class="form-control" value="sk_..." readonly>
                                <button class="btn btn-outline-secondary" type="button" id="toggleKey">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <small class="text-muted">Your API key is stored securely and never shared.</small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Default Language</label>
                            <select class="form-select" style="max-width: 200px;">
                                <option selected>English</option>
                                <option>Spanish</option>
                                <option>French</option>
                                <option>German</option>
                                <option>Japanese</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-start">
                            <button class="btn btn-primary px-4">Save Configuration</button>
                        </div>
                    </div>
                </div>

                <hr class="my-5">

                <div class="row">
                    <div class="col-md-8">
                        <h5 class="mb-3">Free Analysis Prompt</h5>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Prompt Template</label>
                            <textarea class="form-control" rows="8" style="font-family: monospace;">
You are an AI assistant helping users understand their quiz results. Based on their answers: (quiz_answers), provide a brief analysis of their personality type and general recommendations...

Use (quiz_answers) to insert the user's quiz responses into the prompt</textarea>
                            <div class="mt-2 text-muted">
                                <small>Use <code>(quiz_answers)</code> to insert the user's quiz responses into the prompt</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle API key visibility
            const toggleKey = document.getElementById('toggleKey');
            const apiKeyInput = document.querySelector('input[type="password"]');

            toggleKey.addEventListener('click', function() {
                if (apiKeyInput.type === 'password') {
                    apiKeyInput.type = 'text';
                    this.innerHTML = '<i class="fas fa-eye-slash"></i>';
                } else {
                    apiKeyInput.type = 'password';
                    this.innerHTML = '<i class="fas fa-eye"></i>';
                }
            });
        });
    </script>
@endpush

@push('styles')
    <style>
        code {
            background-color: #f8f9fa;
            padding: 2px 4px;
            border-radius: 4px;
            color: #d63384;
        }
        .form-label {
            margin-bottom: 0.5rem;
        }
        textarea.form-control {
            white-space: pre-wrap;
        }
    </style>
@endpush
