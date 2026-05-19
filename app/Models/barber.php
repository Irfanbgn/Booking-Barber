<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    use HasFactory;

    protected $table = 'BARBERS'; // Uppercase untuk Oracle
    protected $fillable = ['name', 'specialist', 'photo_path', 'bio', 'photo']; 

    // Relasi ke Project
    public function projects()
    {
        return $this->hasMany(Project::class, 'barber_id');
    }
    public function teamwork()
{
    return view('teamwork');
}
}