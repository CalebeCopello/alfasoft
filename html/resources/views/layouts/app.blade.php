{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-4 mb-4">
        <a class="navbar-brand" href="{{ route('contacts.index') }}">Contacts</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>