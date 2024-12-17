<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Vacature' }}</title>

    <!-- Include Tailwind CSS -->
    @vite('resources/css/app.css')
</head>
<body class="bg-black-50 min-h-screen">
<!-- Main Content Container -->
<div class="max-w-4xl mx-auto bg-green-50 p-6 rounded-lg shadow-md">
    {{ $slot }}
</div>
</body>
</html>
