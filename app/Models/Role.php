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

    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }

    public function isEditable()
    {
        switch ($this->id) {
            case self::ROLE_ADMINISTRATOR:
                return false;
                break;
            case self::ROLE_TECHNICIAN:
                return false;
                break;
            case self::ROLE_CLIENT:
                return false;
                break;
            default:
                return true;
                break;
        }
    }
}
