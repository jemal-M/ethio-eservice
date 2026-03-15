<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id', 'title', 'message', 'read_at', 'is_read'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeUnread($query)
    {
        return $query->where('is_read', 0);
    }

    public function markAsRead()
    {
        if (!$this->is_read) {
            $this->update(['is_read' => 1, 'read_at' => now()]);
        }
    }

    public function markAsUnread()
    {
        if ($this->is_read) {
            $this->update(['is_read' => 0, 'read_at' => null]);
        }
    }
     
}
