<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrlExpires extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'short_urls';

    // Campos que se pueden asignar masivamente
    protected $fillable = ['original_url', 'short_code', 'expires_at'];

    // Campos que deben ser tratados como fechas
    protected $casts = [
        'expires_at' => 'datetime',
    ];
}
