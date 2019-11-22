<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Cliente extends Model
{
    protected $fillable = [
       'cedula', 'nombre', 'email', 'user_id','tel','cel','dir'
    ];

    public function User() {
        return $this->belongsTo(User::class);

      }


    public function Prestamo() {
        return $this->hasMany(Prestamo::class);

    }
}


