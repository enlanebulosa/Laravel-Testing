<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    public function scopeLast1($query)
    {
        return $query->orderBy('id', 'desc')->first();
    }
}
