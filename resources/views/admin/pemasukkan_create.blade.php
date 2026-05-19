<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Tambah Pemasukan - PieceBarber</title>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Catat Pemasukan Baru</h2>
        
        <form action="{{ route('pemasukan.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Keterangan</label>
                <input type="text" name="keterangan" class="w-full border rounded-lg p-2.5" placeholder="Contoh: Jual Minyak Rambut" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Jumlah (Rp)</label>
                <input type="number" name="jumlah" class="w-full border rounded-lg p-2.5" placeholder="Contoh: 50000" required>
            </div>

            <div class="flex gap-2">
                <button type="submit" class="w-full bg-green-600 text-white font-bold py-2 rounded-lg hover:bg-green-700">Simpan</button>
                <a href="{{ route('dashboard') }}" class="w-full bg-gray-500 text-white text-center font-bold py-2 rounded-lg hover:bg-gray-600">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>