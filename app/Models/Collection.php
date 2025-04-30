<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $table = 'collection';

    protected $fillable = [
        'user_id',
        'type',
        'status',
        'scheduled_date',
        'time',
        'weight',
        'points_earned',
        'location',
    ];

    /**
     * Relación: una recolección pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
