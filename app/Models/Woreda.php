<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Woreda extends Model
{
    protected $fillable = ['name', 'zone_id'];
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function kebeles()
    {
        return $this->hasMany(Kebelie::class);
    }
}
