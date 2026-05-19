<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teamwork Documentation - PieceBarber</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;600&display=swap');
        body { font-family: 'Poppins', sans-serif; }
        .serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-stone-50 text-stone-900">

    <header class="relative py-24 bg-stone-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <img src="https://i.pinimg.com/736x/5b/d6/24/5bd6241655b775fd814a66e30aeae67b.jpg   " class="w-full h-full object-cover" alt="Background">
        </div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="serif text-5xl md:text-6xl font-bold mb-4">Tentang Pekerja</h1>
            <p class="text-amber-500 tracking-[0.3em] uppercase text-sm font-semibold">Dokumentasi & Portofolio Pekerja</p>
            <div class="h-1 w-24 bg-amber-600 mx-auto mt-6"></div>
        </div>
    </header>

    <main class="container mx-auto px-6 py-20">
        <div class="grid grid-cols-1 gap-20">
            
            @forelse($barbers as $barber)
            <div class="flex flex-col md:flex-row items-stretch bg-white shadow-xl rounded-2xl overflow-hidden border border-stone-200">
                
                <div class="md:w-2/5 relative h-[400px] md:h-auto">
                    <img src="{{ asset('storage/barber/'.$barber->photo) }}" 
                         alt="{{ $barber->name }}" 
                         class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 right-0  from-black/80 to-transparent p-8 md:hidden">
                        <h2 class="serif text-3xl text-white font-bold">{{ $barber->name }}</h2>
                    </div>
                </div>
                

                <div class="md:w-3/5 p-8 md:p-12 flex flex-col justify-center">
                    <span class="text-amber-600 font-bold uppercase tracking-widest text-xs mb-2">Verified Barber</span>
                    <h2 class="serif text-4xl font-bold text-stone-800 mb-4 hidden md:block">{{ $barber->name }}</h2>
                    
                    <div class="flex items-center mb-6">
                        <div class="px-4 py-1 bg-stone-100 border border-stone-200 rounded-full text-stone-600 text-sm font-medium italic">
                            Specialist: {{ $barber->specialist }}
                        </div>
                    </div>  

                    <div class="prose text-stone-600 mb-8">
                        <h4 class="text-stone-900 font-semibold mb-2">Dokumentasi Profil:</h4>
                        <p class="leading-relaxed">
                            {{ $barber->bio ?? 'Pekerja profesional dengan dedikasi tinggi dalam seni menata rambut. Memiliki sertifikasi resmi dan pengalaman luas dalam gaya rambut modern maupun klasik.' }}
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-8 border-t border-b border-stone-100 py-6">
                        <div>
                            <p class="text-xs text-stone-400 uppercase font-bold tracking-tighter">Status Pekerja</p>
                            <p class="text-stone-800 font-semibold">Aktif / Tersedia</p>
                        </div>
                        <div>
                            <p class="text-xs text-stone-400 uppercase font-bold tracking-tighter">ID Pegawai</p>
                            <p class="text-stone-800 font-semibold">PB-00{{ $barber->id }}</p>
                        </div>
                    </div>

                    <div>
                        <a href="/booking?barber={{ $barber->id }}" class="inline-block bg-stone-900 text-white px-10 py-4 rounded-full font-bold hover:bg-amber-600 transition-all duration-300 shadow-lg hover:shadow-amber-500/20">
                            Pesan Jadwal Cukur
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-20 bg-white rounded-3xl border-2 border-dashed border-stone-200">
                <i class="fa-solid dark:text-stone-300 fa-users-slash text-6xl mb-4"></i>
                <h3 class="text-xl font-bold text-stone-400">Belum ada dokumentasi pekerja.</h3>
                <p class="text-stone-400">Silakan tambahkan data melalui database atau seeder.</p>
            </div>
            @endforelse

        </div>
    </main>

    <footer class="bg-stone-900 py-12 text-center text-stone-500 text-sm">
        <p>&copy; 2026 PieceBarber Documentation System. All Rights Reserved.</p>
        <div class="mt-4 flex justify-center space-x-6 text-lg">
            <a href="#" class="hover:text-white transition"><i class="fa-brands fa-instagram"></i></a>
            <a href="#" class="hover:text-white transition"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
    </footer>

</body>
</html>