<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard Admin - PieceBarber</title>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto">
<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Dashboard Admin PieceBarber</h1>
    
    <!-- Tombol Logout -->
    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
            🚪 Logout
        </button>
    </form>
</div>
        <!-- PERBAIKAN 1: Menampilkan pesan sukses -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
            <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-amber-500">
                <p class="text-gray-500 text-sm font-bold uppercase">Pemasukan Bulan Ini</p>
                <h2 class="text-4xl font-mono font-bold text-gray-800">Rp {{ number_format($pemasukanBulanIni, 0, ',', '.') }}</h2>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-blue-500">
                <p class="text-gray-500 text-sm font-bold uppercase">Total Antrean Hari Ini</p>
                <h2 class="text-4xl font-mono font-bold text-gray-800">{{ $bookings->where('created_at', '>=', today())->count() }}</h2>
            </div>
        </div>

        <!-- PERBAIKAN 2: MENAMBAHKAN TABEL PEMASUKAN (Ini yang paling penting!) -->
        <div class="bg-white rounded-xl shadow-sm mb-10 overflow-hidden">
            <div class="p-6 border-b flex justify-between items-center bg-gray-50">
                <h3 class="font-bold text-lg text-gray-700">📊 Daftar Pemasukan</h3>
                <a href="{{ route('pemasukan.create') }}" class="bg-green-600 text-white px-4 py-2 rounded text-sm hover:bg-green-700 transition shadow-sm">
                    + Tambah Pemasukan
                </a>
            </div>
            
            @if(isset($semuaPemasukan) && count($semuaPemasukan) > 0)
                <table class="w-full text-left">
                    <thead class="bg-gray-50 text-gray-400 text-xs uppercase border-b">
                        <tr>
                            <th class="p-4">Keterangan</th>
                            <th class="p-4">Jumlah</th>
                            <th class="p-4">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach($semuaPemasukan as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4 font-medium text-gray-800">{{ $item->keterangan }}</td>
                            <td class="p-4 text-green-600 font-bold">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                            <td class="p-4 text-gray-500">{{ date('d/m/Y H:i', strtotime($item->tanggal)) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="p-10 text-center text-gray-400 italic">
                    Belum ada data pemasukan. Klik tombol "Tambah Pemasukan" untuk mulai mencatat.
                </div>
            @endif
        </div>

        <div class="bg-white rounded-xl shadow-sm mb-10 overflow-hidden">
            <div class="p-6 border-b flex justify-between items-center bg-gray-50">
                <h3 class="font-bold text-lg text-gray-700">✂️ Dokumentasi Pekerja</h3>
                <a href="{{ route('barber.create') }}" class="bg-stone-900 text-white px-4 py-2 rounded text-sm hover:bg-amber-600 transition shadow-sm">+ Tambah Pekerja</a>
            </div>
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-400 text-xs uppercase border-b">
                    <tr>
                        <th class="p-4">Nama & Foto</th>
                        <th class="p-4">Spesialisasi</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach($barbers as $barber)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4">
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full overflow-hidden border border-gray-200 mr-4 shadow-sm bg-gray-10">
                                    @if($barber->photo)
                                        <img src="{{ asset('storage/app/public/barbers/' . $barber->photo) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="flex items-center justify-center h-full text-[10px] text-gray-400 font-bold uppercase">No Pic</div>
                                    @endif
                                </div>
                                <div class="font-semibold text-gray-800">{{ $barber->name }}</div>
                            </div>
                        </td>
                        <td class="p-4 text-gray-600 font-medium">{{ $barber->specialist }}</td>
                        
                        <td class="p-4">
                            <div class="flex justify-center items-center gap-4">
                                <a href="{{ route('barber.edit', $barber->id) }}" class="text-blue-600 hover:text-blue-800 flex items-center font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Edit
                                </a>

                                <form action="{{ route('barber.destroy', $barber->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus {{ $barber->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 flex items-center font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="bg-white rounded-xl shadow-sm overflow-hidden mt-6">
    <div class="p-6 border-b bg-gray-50 text-gray-700">
        <h3 class="font-bold text-lg text-gray-700">📅 Riwayat Booking</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-gray-400 text-xs uppercase border-b">
                <tr>
                    <th class="p-4">Waktu Booking</th>
                    <th class="p-4">Nama Pelanggan</th>
                    <th class="p-4">No. Telepon</th>
                    <th class="p-4">Barber</th>
                    <th class="p-4">Tanggal & Waktu</th>
                    <th class="p-4 text-center">Status</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y text-sm">
                @forelse($bookings as $booking)
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4 italic text-gray-500">
                        {{ $booking->created_at ? \Carbon\Carbon::parse($booking->created_at)->format('d/m/Y H:i') : '-' }}
                    </td>
                    <td class="p-4 font-bold text-gray-800">{{ $booking->customer_name }}</td>
                    <td class="p-4 text-gray-600">{{ $booking->customer_phone ?? '-' }}</td>
                    <td class="p-4">
                        @if($booking->barber)
                            {{ $booking->barber->name }}
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="p-4">
                        {{ $booking->booking_date ? \Carbon\Carbon::parse($booking->booking_date)->format('d/m/Y') : '-' }}
                        @if($booking->booking_time)
                            {{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }}
                        @endif
                    </td>
                    <td class="p-4 text-center">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold 
                            @if($booking->status == 'Confirmed' || $booking->status == 'completed') 
                               
                            @elseif($booking->status == 'cancelled' || $booking->status == 'Cancelled')
                                
                                bg-yellow-100 text-yellow-700
                            @endif">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    
                    <!-- ✅ TOMBOL KONFIRMASI -->
                    <td class="p-4 text-center">
                        @if($booking->status != 'Confirmed' && $booking->status != 'completed' && $booking->status != 'cancelled')
                        <form action="{{ route('booking.confirm', $booking->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('PUT')
                            <button type="submit" 
                                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition shadow-sm"
                                onclick="return confirm('Konfirmasi booking untuk {{ $booking->customer_name }}?')">
                                ✅ Konfirmasi
                            </button>
                        </form>
                        @elseif($booking->status == 'Confirmed')
                        <span class="text-green-600 text-sm font-semibold">✓ Sudah dikonfirmasi</span>
                        @else
                        <span class="text-gray-400 text-sm">-</span>
                        @endif
                    </td>
                    <td>
                <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                  @csrf
                @method('DELETE')
            <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition shadow-sm" type="submit" class="btn btn-danger btn-sm">
            Hapus
        </buttonlass=>
    </form>
</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="p-10 text-center text-gray-400 italic">
                        📭 Belum ada data booking. Silakan lakukan booking terlebih dahulu.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
    </div>
</body>
</html>