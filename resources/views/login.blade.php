<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md max-w-sm w-full">
        <h2 class="text-2xl font-semibold text-center mb-6">Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Login</button>
        </form>
    </div>
</body>
</html>
