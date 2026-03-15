<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kebelie extends Model
{
    protected $fillable = [
        'name','woreda_id'
    ];

    public function woreda(){
        return $this->belongsTo(Woreda::class);
    }
}
