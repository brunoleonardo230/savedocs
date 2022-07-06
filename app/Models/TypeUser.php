<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeUser extends Model
{
    use HasFactory;

    public $table = 'type_users';

    protected $fillable = ['type'];

    const PHYSICAL_PERSON   = 1;
    const LEGAL_PERSON      = 2;

    public function users()
    {
        return $this->hasMany(User::class, 'type_user_id', 'id');
    }
        
}
