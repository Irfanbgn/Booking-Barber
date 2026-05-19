<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page Title</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 italic">Edit Dokumentasi: {{ $barber->name }}</h2>
        
        <form action="{{ route('barber.update', $barber->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Nama Lengkap</label>
        <input type="text" name="name" value="{{ $barber->name }}" class="w-full border p-3 rounded-lg" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Spesialisasi</label>
        <input type="text" name="specialist" value="{{ $barber->specialist }}" class="w-full border p-3 rounded-lg" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Foto Pekerja</label>
        
        @if($barber->photo)
            <div class="mb-2">
                <p class="text-xs text-gray-500 mb-1">Foto saat ini:</p>
                <img src="{{ asset('storage/barbers/' . $barber->photo) }}" class="w-24 h-24 rounded border object-cover">
            </div>
        @endif

        <input type="file" name="photo" class="w-full border p-2 rounded-lg text-sm bg-gray-50">
        <p class="text-xs text-gray-400 mt-1 italic">*Biarkan kosong jika tidak ingin mengganti foto</p>
    </div>

    <div class="mb-6">
        <label class="block text-gray-700 font-bold mb-2">Bio</label>
        <textarea name="bio" rows="4" class="w-full border p-3 rounded-lg">{{ $barber->bio }}</textarea>
    </div>

    <div class="flex gap-3">
        <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-bold w-full">Update Data</button>
        <a href="{{ route('admin.dashboard') }}" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-bold text-center w-full">Batal</a>
    </div>
</form>
    </div>
</body>
</html>
