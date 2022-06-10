<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'role'];

    const ROLE_ADMINISTRATOR = 1;
    const ROLE_TECHNICIAN    = 2;
    const ROLE_CLIENT        = 3;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function resources()
    {
        return $this->belongsToMany(Resource::class);
    }
}
