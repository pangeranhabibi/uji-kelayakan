<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Keterlambatan</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
          integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK"
          crossorigin="anonymous" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
        }

        .card {
            max-width: 400px;
            margin: auto;
            margin-top: 100px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: #fff; /* White background */
        }

        .card-header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: grey; /* Blue color */
        }

        .form-label {
            font-weight: bold;
            color: #495057; /* Dark gray color */
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: grey;
            border-color: grey;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-color: #0056b3;
        }

        .alert-danger {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <form action="{{ route('login.auth') }}" method="POST" class="card">
        @csrf
        @if (Session::get('failed'))
            <div class="alert alert-danger">{{ Session::get('failed') }}</div>
        @endif
        <div class="card-header">Login</div>
        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" class="form-control" id="email" name="email" value="{{old('email') }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password :</label>
            <input type="password" class="form-control" id="password" name="password" value="{{old('password') }}">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
</body>
</html>
