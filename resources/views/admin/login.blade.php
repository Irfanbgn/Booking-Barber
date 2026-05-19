<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login Admin - PieceBarber</title>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="max-w-md w-full bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-stone-900 p-6 text-center">
                <h2 class="text-2xl font-bold text-white">PieceBarber</h2>
                <p class="text-amber-400 text-sm mt-1">Admin Dashboard</p>
            </div>
            
            <!-- Form Login -->
            <div class="p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('admin.login.submit') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
                        <input type="email" name="email" 
                            class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                            placeholder="admin@piecebarber.com" required autofocus>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        <input type="password" name="password" 
                            class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                            placeholder="Masukkan password" required>
                    </div>

                    <div class="mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-amber-600 focus:ring-amber-500">
                            <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                        </label>
                    </div>

                    <button type="submit" 
                        class="w-full bg-stone-900 hover:bg-amber-600 text-white font-bold py-3 rounded-lg transition duration-200">
                        Login
                    </button>
                </form>

                <div class="mt-6 text-center text-sm text-gray-500">
                    <p>🔒 Halaman khusus admin</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>