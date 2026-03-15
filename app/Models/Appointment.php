<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
      'service_request_id', 'user_id', 'appoint_date','status'
    ];

}
