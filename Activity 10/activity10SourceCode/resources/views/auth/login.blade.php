<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }
        .form-container {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="card form-container">
    <h2 class="form-title text-center">Login</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <!-- Email Input -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required autofocus>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password Input -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </div>

        <!-- Link to Register -->
        <div class="text-center">
            Doesn't have an account? <a href="{{ route('register') }}">Sign Up</a>
        </div>
    </form>
</div>


</body>
</html>
