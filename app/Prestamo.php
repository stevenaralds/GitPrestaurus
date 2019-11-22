<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;

class Prestamo extends Model
{
    protected $fillable = [
         'monto', 'formapago','interes','nrocuotas','vlrcuota','totalapagar','cliente_id','user_id','estado','diaspago','saldo'
    ];

    public function User() {
        return $this->belongsTo(User::class);

      }

      public function Cliente() {
        return $this->belongsTo(Cliente::class);

      }

      public function Abono() {
        return $this->hasMany(Abono::class);

    }
}



