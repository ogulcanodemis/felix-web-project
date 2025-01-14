<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light text-dark">
<div class="text-center">
    <h1 class="display-1 fw-bold text-danger">@yield('code')</h1>
    @hasSection('message')
        <p class="fs-4">@yield('message')</p>
    @endhasSection
    <a href="{{ url('/') }}" class="btn btn-primary btn-lg mt-3">{{ __('home') }}</a>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
