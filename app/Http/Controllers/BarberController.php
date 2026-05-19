<?php

namespace App\Http\Controllers;

use App\Models\Barber; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Penting untuk hapus file foto lama

class BarberController extends Controller
{

    public function index() 
    {
        $barbers = Barber::all(); 
        return view('welcome', compact('barbers'));

        $pemasukanBulanIni = \DB::table('pemasukan')
    ->whereMonth('tanggal', now()->month)
    ->sum('jumlah') ?? 0;

        return view('admin.dashboard', compact('barbers', 'pemasukanBulanIni'));
    }

    public function teamwork() 
    {
        $barbers = Barber::all();
        return view('teamwork', compact('barbers'));
    }

    public function adminDashboard()
{
    $barbers = Barber::all();
    
    // Ambil semua data pemasukan
    $semuaPemasukan = \DB::table('pemasukan')->orderBy('tanggal', 'desc')->get();
    
    // Hitung pemasukan bulan ini
    $pemasukanBulanIni = \DB::table('pemasukan')
        ->whereMonth('tanggal', now()->month)
        ->whereYear('tanggal', now()->year)
        ->sum('jumlah') ?? 0;
    
    // ✅ PERBAIKAN: Ambil data booking dari database
    // Asumsi 1: Ada model Booking
    $bookings = \App\Models\Booking::orderBy('created_at', 'desc')->get();
    
    // Atau Asumsi 2: Jika belum buat model, pakai DB facade
    // $bookings = \DB::table('bookings')->orderBy('created_at', 'desc')->get();
    
    return view('admin.dashboard', compact('barbers', 'bookings', 'pemasukanBulanIni', 'semuaPemasukan'));
}

    public function create() 
    {
        return view('admin.add_barber');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required',
            'specialist' => 'required',
            'bio' => 'nullable',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048' // Validasi foto
        ]);

        $data = $request->all();

        // Logika Upload Foto
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/barbers', $filename);
            $data['photo'] = $filename;
        }

        Barber::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'Pekerja baru berhasil ditambahkan!');
    }

    // --- FUNGSI BARU DIMULAI DI SINI ---

    // 1. Menampilkan Form Edit
    public function edit($id) 
    {
        $barber = Barber::findOrFail($id);
        return view('admin.edit', compact('barber'));
    }

    // 2. Memproses Update Data & Foto
    public function update(Request $request, $id) 
    {
        $request->validate([
            'name' => 'required',
            'specialist' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $barber = Barber::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($barber->photo) {
                Storage::delete('public/barbers/' . $barber->photo);
            }

            // Upload foto baru
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/barbers', $filename);
            $data['photo'] = $filename;
        }

        $barber->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Data pekerja berhasil diperbarui!');
    }

    // 3. Menghapus Data & File Foto
    public function destroy($id) 
    {
        $barber = Barber::findOrFail($id);

        // Hapus file foto dari folder storage sebelum hapus data di DB
        if ($barber->photo) {
            Storage::delete('public/barbers/' . $barber->photo);
        }

        $barber->delete();
    
        return redirect()->route('admin.dashboard')->with('success', 'Pekerja berhasil dihapus!');
    }
    // Menampilkan halaman form pemasukan
public function createPemasukan()
{
    return view('admin.pemasukkan_create');
}

// Menyimpan data ke database
public function storePemasukan(Request $request)
{
    $request->validate([
        'keterangan' => 'required|string|max:255',
        'jumlah'     => 'required|numeric|min:0',
    ]);

    \DB::table('pemasukan')->insert([
        'keterangan' => $request->keterangan,
        'jumlah'     => $request->jumlah,
        'tanggal'    => now(), // Ini akan mengisi tanggal hari ini
    ]);

    return redirect()->route('admin.dashboard')->with('success', 'Pemasukan berhasil dicatat!');
}
}