<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    // WAJIB: Format ini yang paling diterima oleh driver Oracle (Yajra)
    protected $dateFormat = 'Y-m-d H:i:s';

    protected $fillable = [
        'customer_name',
        'customer_phone',
        'barber_id',
        'booking_date',
        'booking_time',
        'status',
    ];

    protected $casts = [
        'booking_date' => 'date',
        'booking_time' => 'datetime',
    ];

    public function barber()
    {
        return $this->belongsTo(Barber::class, 'barber_id');
    }
}