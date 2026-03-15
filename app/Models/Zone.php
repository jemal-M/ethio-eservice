<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = [
        'name', 'region_id'
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function woredas()
    {
        return $this->hasMany(Woreda::class);
    }
}
