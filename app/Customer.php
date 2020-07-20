<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $guarded = [];
    public function sales()
    {
        return $this->hasMany('App\Sale');
    }
}
