<th>AKSI</th> <!-- Tambah di bagian <thead> -->

<!-- Tambah di bagian <tbody> -->
<td>
    @if($booking->status == 'pending')
        <form action="{{ route('booking.confirm', $booking->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-sm btn-success">Konfirmasi Sekarang</button>
        </form>
    @else
        <span class="badge bg-primary">Sudah Dikonfirmasi</span>
    @endif
</td>