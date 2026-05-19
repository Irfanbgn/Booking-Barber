<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Jadwal - PieceBarber</title>
    <!-- Tailwind CSS untuk styling cepat -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap');
        body { font-family: 'Poppins', sans-serif; }
        .serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-stone-100 text-stone-900">

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full space-y-8 bg-white p-10 rounded-2xl shadow-2xl border border-stone-200 flex flex-col md:flex-row gap-10">
            

            <div class="md:w-1/3 border-b md:border-b-0 md:border-r border-stone-200 pb-8 md:pb-0 md:pr-10">
                <h2 class="serif text-3xl font-bold text-stone-800 mb-4">Booking teros!</h2>
                <p class="text-stone-500 text-sm leading-relaxed mb-6">Silakan pilih jadwal dan barber andalan Anda. 
                    Kami akan mengonfirmasi pesanan Anda sesegera mungkin</p>
                
                <div class="space-y-4">
                    <div class="flex items-center text-stone-600 text-sm">
                        <i class="fa-solid fa-clock w-6 text-amber-600"></i>
                        <span>Buka: 09:00 - 21:00</span>
                    </div>
                    <div class="flex items-center text-stone-600 text-sm">
                        <i class="fa-solid fa-location-dot w-6 text-amber-600"></i>
                        <span>Binjai Utara</span>
                    </div>
                </div>
            </div>

            <!-- Sisi Kanan: Form Input -->
            <div class="md:w-2/3">
                <!-- Pesan Sukses -->
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 flex items-center shadow-sm">
                        <i class="fa-solid fa-circle-check mr-2"></i>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('booking.store') }}" method="POST" class="grid grid-cols-1 gap-5">
                    @csrf
                    
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-stone-500 mb-2">Nama Anda</label>
                        <input type="text" name="customer_name" required 
                            class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition" 
                            placeholder="Contoh: Budi Santoso">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-stone-500 mb-2">Nomor WhatsApp</label>
                        <input type="number" name="customer_phone" required 
                            class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition" 
                            placeholder="0812xxxx">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-stone-500 mb-2">Barber</label>
                            <select name="barber_id" required 
                                class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                                <option value="">Pilih Barber</option>
                                @foreach($barbers as $barber)
                                    <option value="{{ $barber->id }}" {{ (isset($selectedBarber) && $selectedBarber == $barber->id) ? 'selected' : '' }}>
                                        {{ $barber->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
  
                        
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-stone-500 mb-2">Tanggal</label>
                            <input type="date" name="booking_date" min="{{ date('Y-m-d') }}" required 
                                class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                        </div>
                    </div>


                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-stone-500 mb-2">Waktu / Jam</label>
                        <input type="time" name="booking_time" required 
                            class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                    </div>


                    <button type="submit" 
                        class="w-full bg-stone-900 text-white font-bold py-4 rounded-lg hover:bg-amber-700 transition duration-300 shadow-lg uppercase tracking-widest text-sm mt-2">
                        Konfirmasi Booking
                    </button>


                    <a href="/" class="text-center text-stone-400 text-xs hover:text-stone-600 transition">
                        <i class="fa-solid fa-arrow-left mr-1"></i> Kembali ke Beranda
                    </a>
                    
                </form>
            </div>
        </div>
    </div>


</body>
</html>