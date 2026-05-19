<!DOCTYPE html>
<html lang="id">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Dokumentasi Pekerja</h2>
        
        <form action="{{ route('barber.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
        <label class="block font-bold mb-2">Foto Pekerja</label>
        <input type="file" name="photo" class="w-full border p-2 rounded">
         </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Nama Lengkap</label>
                <input type="text" name="name" class="w-full border p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500" placeholder="Contoh: Sanji Vinsmoke" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Spesialisasi</label>
                <input type="text" name="specialist" class="w-full border p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500" placeholder="Contoh: Pompadour & Beard Trim" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Bio / Deskripsi Pekerja</label>
                <textarea name="bio" rows="4" class="w-full border p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500" placeholder="Ceritakan pengalaman kerja mereka..."></textarea>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-stone-900 text-white px-6 py-3 rounded-lg font-bold hover:bg-amber-600 transition w-full">
                    Simpan ke Oracle
                </button>
                <a href="{{ route('admin.dashboard') }}" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-bold text-center w-full italic">
                    Batal
                </a>
            </div>
        </form>
    </div>
</body>
</html>