<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'sector_id',
        'phone'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
