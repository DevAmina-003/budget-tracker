<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id',
        'amount',
        'source',
        'received_at',
    ];

    protected $casts = [
        'received_at' => 'date',
    ];
      public function user()
    {
        return $this->belongsTo(User::class);
    }
}
