<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barber;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; 

class BookingController extends Controller
{
    // 1. Tampilan Utama Dashboard (Menampilkan Tabel)
    public function index()
    {
        $barbers = Barber::all();
        
        // Ambil SEMUA data booking tanpa filter tanggal agar PASTI muncul
        $bookings = Booking::with('barber')->orderBy('created_at', 'desc')->get();

        // Biarkan ini dulu agar tidak error di dashboard
        $pemasukanBulanIni = 0; 

        return view('admin.dashboard', compact('barbers', 'bookings', 'pemasukanBulanIni'));
    }

    // 2. Form Booking untuk Pelanggan
    public function create(Request $request)
    {
        $barbers = Barber::all();
        $selectedBarber = $request->query('barber');
        return view('booking', compact('barbers', 'selectedBarber'));
    }

    // 3. Simpan Booking Baru
    public function store(Request $request)
    {
        $request->validate([
            'customer_name'  => 'required',
            'customer_phone' => 'required',
            'barber_id'      => 'required',
            'booking_date'   => 'required',
            'booking_time'   => 'required',
        ]);

        $fullDateTime = Carbon::parse($request->booking_date . ' ' . $request->booking_time);

        Booking::create([
            'customer_name'  => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'barber_id'      => $request->barber_id,
            'booking_date'   => $fullDateTime->format('Y-m-d'), 
            'booking_time'   => $fullDateTime, 
            'status'         => 'pending',
        ]);

        return redirect()->route('booking.create')->with('success', 'Booking berhasil!');
    }

    // 4. Konfirmasi Booking
    public function confirm($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'Confirmed']); 

        return redirect()->back()->with('success', 'Booking telah dikonfirmasi!');
    }
    // 5. Hapus Data Booking
    public function destroy($id)
    {
    $booking = Booking::findOrFail($id);
    $booking->delete();

    return redirect()->back()->with('success', 'Data booking berhasil dihapus!');
}
    
}