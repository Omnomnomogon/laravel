<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Notes App</title>
    <!-- Новые стили -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .nav-link {
            color: #333;
        }

        .container {
            padding: 20px;
        }
    </style>
    <!-- Ссылки на стили и скрипты -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.tiny.cloud/1/epzyw87n6ljrwavtsdt4xoxmwbee7ie6lk8yq8ga7e3x28ld/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('notes.index') }}">My Notes App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('notes.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('notes.create') }}">Create Note</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content') <!-- Здесь будет содержимое каждой страницы -->
</div>

<!-- Скрипты -->
<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
@section('scripts')

@endsection
</body>

</html>
