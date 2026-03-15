<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'name',
        'code'
    ];
    public function zones(){
        $this->hasMany(Zone::class);
    }
}
