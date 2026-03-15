<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = [
        'name',
        'department_id'
    ];

    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}
