<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status Update</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-xl font-bold mb-4">Hello, {{ $name }}</h1>
        <p class="text-gray-700 mb-4">Your order status has been updated to: <strong class="text-blue-600">{{ $status }}</strong></p>
        <p class="text-gray-700">Your support means the world to us! Thank you for choosing us.</p>
    </div>
</body>
</html>