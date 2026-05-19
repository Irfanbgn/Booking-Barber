<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut | Modern Barbershop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap');
        body { font-family: 'Poppins', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-stone-900 text-stone-100">

    <!-- Navbar -->
    <nav class="flex justify-between items-center px-10 py-6 absolute w-full z-10">
        <div class="text-2xl font-serif font-bold tracking-tighter">Piece<span class="text-amber-500">Barber</span></div>
        <div class="hidden md:flex space-x-8 text-sm uppercase tracking-widest">
            <a href="{{ route('teamwork') }}" class="hover:text-amber-500 transition">Teamwork</a>
            <a href="#services" class="hover:text-amber-500 transition">Layanan kami</a>
            <a href="{{ route('booking.create') }}" class="hover:text-amber-500 transition">booking</a>
        </div>  
        
    </nav>

    <!-- Hero Section -->
    <header class="relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-black/60 z-0"></div>
        <!-- Ganti URL gambar dengan foto barbershop yang keren -->
        <img src="https://i.pinimg.com/736x/24/67/c6/2467c61ea0e746918f3644cf3c94c7ae.jpg" class="absolute inset-0 w-full h-full object-cover -z-10" alt="Barbershop">
        
        <div class="relative z-1 text-center px-4">
            <h1 class="text-5xl md:text-7xl font-serif mb-4 uppercase italic">Premium Grooming</h1>
            <p class="text-lg md:text-xl text-stone-300 mb-8 max-w-2xl mx-auto font-light">Lebih dari sekadar potong rambut. Kami memberikan kepercayaan diri lewat setiap helai rambut yang kami bentuk.</p>
            <a href="{{ route('booking.create') }}" class="bg-amber-600 hover:bg-amber-700 ...">
    Booking Sekarang
</a>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services" class="py-24 bg-stone-100 text-stone-900">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-serif mb-16 relative inline-block">
                Layanan Kami
                <div class="h-1 w-20 bg-amber-600 mx-auto mt-2"></div>
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Card 1 -->
                <div class="p-8 border border-stone-200 rounded-lg hover:shadow-2xl transition group bg-white">
                    <i class="fa-solid fa-scissors text-4xl mb-6 text-amber-600"></i>
                    <h3 class="text-xl font-bold mb-4">Classic Haircut</h3>
                    <p class="text-stone-500 mb-6">Potongan rambut klasik yang presisi disesuaikan dengan bentuk wajah Anda.</p>
                    <span class="text-amber-700 font-bold">Rp 50.000</span>
                </div>

                <!-- Card 2 -->
                <div class="p-8 border border-amb-200 rounded-lg hover:shadow-2xl transition group bg-white scale-105 border-amber-500 ring-1 ring-amber-500">
                    <i class="fa-solid fa-razor text-4xl mb-6 text-amber-600"></i>
                    <h3 class="text-xl font-bold mb-4">Gentleman Shave</h3>
                    <p class="text-stone-500 mb-6">Cukur janggut premium menggunakan handuk hangat dan krim cukur terbaik.</p>
                    <span class="text-amber-700 font-bold">Rp 35.000</span>
                </div>

                <!-- Card 3 -->
                <div class="p-8 border border-stone-200 rounded-lg hover:shadow-2xl transition group bg-white">
                    <i class="fa-solid fa-spray-can text-4xl mb-6 text-amber-600"></i>
                    <h3 class="text-xl font-bold mb-4">Hair Coloring</h3>
                    <p class="text-stone-500 mb-6">Ubah tampilan Anda dengan pilihan warna rambut yang trendi dan aman.</p>
                    <span class="text-amber-700 font-bold">Rp 120.000</span>
                </div>
            </div>
        </div>
    </section>
    <!-- Section Teamwork (Barbers) -->
<section id="team" class="py-24 bg-stone-900 text-stone-100">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-serif mb-16 relative inline-block">
    
            <!-- Footer -->
    <footer class="bg-black py-12 border-t border-stone-800">
        <div class="container mx-auto px-6 text-center">
            <div class="text-xl font-serif font-bold mb-6">Piece<span class="text-amber-500">Barber</span></div>
            <div class="flex justify-center space-x-6 mb-8">
                <a href="#" class="text-stone-400 hover:text-white"><i class="fab fa-instagram fa-lg"></i></a>
                <a href="#" class="text-stone-400 hover:text-white"><i class="fab fa-whatsapp fa-lg"></i></a>
                <a href="#" class="text-stone-400 hover:text-white"><i class="fab fa-facebook fa-lg"></i></a>
            </div>
            <p class="text-stone-600 text-sm">&copy; 2026 PieceBarber. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>