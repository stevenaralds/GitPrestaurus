<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Prestamo;

class DetallePrestamo extends Model
{
    protected $fillable = [
        'fecha_creacion', 'cuota', 'saldo','debito','prestamo_id'
    ];
}


