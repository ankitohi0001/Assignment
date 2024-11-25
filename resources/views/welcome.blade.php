<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: lightblue;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1>Welcome to Our Application</h1>
                <p class="lead">This is the home page of our simple login and register application.</p>
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
