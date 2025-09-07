<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/homepage.js'])

    <title>Document</title>
</head>
<body>
    <section class="w-full h-screen">
        <div id="map" class="w-full h-full"></div>
    </section>

<script>
    // Contoh: ambil semua locations dari controller
    window.locationsData = @json($locations);
</script>
</body>
</html>
