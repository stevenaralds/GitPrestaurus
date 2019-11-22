<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    protected $fillable = [
         'nrocuotas', 'valor', 'prestamo_id'
     ];
 
      
     public function Prestamo() {
         return $this->belongsTo(Prestamo::class);
 
     }
}
