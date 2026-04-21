<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-semibold mb-4">Member Login</h2>

        @if(session('error'))
            <div class="mb-3 p-2 bg-red-100 text-red-800 rounded">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('member.login') }}">
            @csrf
            <div class="mb-3">
                <label class="block text-sm">Email</label>
                <input name="email" type="email" class="mt-1 w-full p-2 border rounded" required>
            </div>
            <div class="mb-3">
                <label class="block text-sm">Password</label>
                <input name="password" type="password" class="mt-1 w-full p-2 border rounded" required>
            </div>
            <button class="w-full bg-blue-600 text-white p-2 rounded">Login</button>
        </form>
    </div>
</body>
</html>
