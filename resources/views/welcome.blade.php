<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personality Insights Quiz</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .quiz-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .quiz-logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .quiz-logo img {
            height: 60px;
            margin-bottom: 15px;
        }
        .quiz-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .quiz-header h1 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .quiz-features {
            margin-bottom: 30px;
        }
        .feature-item {
            margin-bottom: 10px;
            color: #7f8c8d;
        }
        .divider {
            height: 1px;
            background-color: #e0e0e0;
            margin: 25px 0;
        }
        .auth-buttons {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        .btn-login {
            background-color: #3498db;
            border: none;
            padding: 12px 30px;
            font-size: 18px;
            font-weight: 600;
            width: 100%;
        }
        .btn-register {
            background-color: #2ecc71;
            border: none;
            padding: 12px 30px;
            font-size: 18px;
            font-weight: 600;
            width: 100%;
        }
        .btn-login:hover {
            background-color: #2980b9;
        }
        .btn-register:hover {
            background-color: #27ae60;
        }
        .disclaimer {
            font-size: 14px;
            color: #95a5a6;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="quiz-container">
        <div class="quiz-header">
            <h1>Personality Insights Quiz</h1>
            <p class="lead">Discover your unique personality traits and get personalized insights based on scientifically-backed analysis.</p>
        </div>

        <div class="quiz-features">
            <div class="feature-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                </svg>
                5 minutes
            </div>
            <div class="feature-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.95-2.675 2.217zm4.14 2.247a.25.25 0 0 1-.25.25h-.782a.25.25 0 0 1-.25-.25v-.934c0-.735.709-1.234 1.275-1.234.542 0 1.025.447 1.025 1.234v.934z"/>
                </svg>
                10+ questions
            </div>
            <div class="feature-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cpu" viewBox="0 0 16 16">
                    <path d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
                </svg>
                AI-powered results
            </div>
        </div>

        <div class="divider"></div>

        @if (Route::has('login'))
            <div class="auth-buttons">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-login">Go to Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-login">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-register">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <p class="disclaimer">
            This quiz is designed for entertainment and self-reflection purposes.<br>
            Results should not be used for clinical or professional decisions.
        </p>
    </div>
</div>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
