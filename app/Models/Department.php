<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name','description'];
    public function employees()
    {
        return $this->hasMany('App\Models\User');
    }
    public function office(){
          
        return $this->belongsTo('App\Models\Office');

    }
}
