<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capital extends Model
{

    protected $fillable = [
        'capitaltotal', 'user_id'
    ];

    public function User() {
        return $this->belongsTo(User::class);

      }
}
