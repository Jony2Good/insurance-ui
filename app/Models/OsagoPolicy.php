<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OsagoPolicy extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'condition' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
