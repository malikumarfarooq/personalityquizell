@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">AI Integration</h1>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h4 class="mb-4">Configure OpenAI ChatGPT integration for quiz analysis</h4>

                <form action="{{ route('admin.ai-integration.store') }}" method="POST">
                    @csrf

                    <div class="row mb-5">
                        <div class="col-md-8">
                            <h5 class="mb-3">OpenAI Configuration</h5>

                            <div class="mb-4">
                                <label class="form-label fw-bold">OpenAI API Key</label>
                                <div class="input-group mb-2">
                                    <input type="password" name="openai_api_key" class="form-control"
                                           value="{{ old('openai_api_key', $settings->openai_api_key ? 'sk_****************************' : '') }}"
                                           placeholder="Enter new API key to update">
                                    <button class="btn btn-outline-secondary" type="button" id="toggleKey">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <small class="text-muted">Your API key is stored securely and never shared. Leave empty to keep current key.</small>
                                @error('openai_api_key')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Default Language</label>
                                <select name="default_language" class="form-select" style="max-width: 200px;">
                                    <option value="English" {{ old('default_language', $settings->default_language) == 'English' ? 'selected' : '' }}>English</option>
                                    <option value="Spanish" {{ old('default_language', $settings->default_language) == 'Spanish' ? 'selected' : '' }}>Spanish</option>
                                    <option value="French" {{ old('default_language', $settings->default_language) == 'French' ? 'selected' : '' }}>French</option>
                                    <option value="German" {{ old('default_language', $settings->default_language) == 'German' ? 'selected' : '' }}>German</option>
                                    <option value="Japanese" {{ old('default_language', $settings->default_language) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                                </select>
                                @error('default_language')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary px-4">Save Configuration</button>
                            </div>
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="mb-3">Free Analysis Prompt</h5>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Prompt Template</label>
                                <textarea name="free_analysis_prompt" class="form-control" rows="8" style="font-family: monospace;">{{ old('free_analysis_prompt', $settings->free_analysis_prompt) }}</textarea>
                                <div class="mt-2 text-muted">
                                    <small>Use <code>(quiz_answers)</code> to insert the user's quiz responses into the prompt</small>
                                </div>
                                @error('free_analysis_prompt')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-8">
                            <h5 class="mb-3">Premium Analysis Prompt</h5>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Premium Prompt Template</label>
                                <textarea name="premium_analysis_prompt" class="form-control" rows="8" style="font-family: monospace;" placeholder="Enter premium analysis prompt template...">{{ old('premium_analysis_prompt', $settings->premium_analysis_prompt) }}</textarea>
                                <div class="mt-2 text-muted">
                                    <small>Use <code>(quiz_answers)</code> to insert the user's quiz responses into the prompt</small>
                                </div>
                                @error('premium_analysis_prompt')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-start mt-4">
                        <button type="submit" class="btn btn-primary px-4">Save All Prompts</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle API key visibility
            const toggleKey = document.getElementById('toggleKey');
            const apiKeyInput = document.querySelector('input[name="openai_api_key"]');

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
