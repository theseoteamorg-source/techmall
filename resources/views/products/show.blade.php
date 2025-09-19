<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold">{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <p>${{ $product->price }}</p>
    </div>
</body>
</html>