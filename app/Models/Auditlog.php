<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auditlog extends Model
{
      protected $fillable = [
        'user_id', 'action', 'description','model_id','model_type'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function model()
    {
        return $this->morphTo();
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['user_id']) && $filters['user_id'] != '') {
            $query->where('user_id', $filters['user_id']);
        }

        if (isset($filters['action']) && $filters['action'] != '') {
            $query->where('action', $filters['action']);
        }

        if (isset($filters['model_type']) && $filters['model_type'] != '') {
            $query->where('model_type', $filters['model_type']);
        }

        if (isset($filters['dateFrom']) && $filters['dateFrom'] != '') {
            $query->whereDate('created_at', '>=', $filters['dateFrom']);
        }

        if (isset($filters['dateTo']) && $filters['dateTo'] != '') {
            $query->whereDate('created_at', '<=', $filters['dateTo']);
        }
    }

    public function scopeSearch($query, $search)
    {
        $query->where(function ($q) use ($search) {
            $q->where('description', 'like', '%'.$search.'%')
            ->orWhere('action', 'like', '%'.$search.'%');
        });
    }

    public static $rules = array(
        'user_id' => 'required',
        'action' => 'required',
        'description' => 'required',
        'model_id' => 'required',
        'model_type' => 'required'
    );

    public static $rulesUpdate = array(
        'user_id' => 'required',
        'action' => 'required',
        'description' => 'required',
        'model_id' => 'required',
        'model_type' => 'required'
    );
    
}
