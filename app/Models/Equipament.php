<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipament extends Model
{
    protected $fillable = ['name', 'equipment_type', 'description', 'identification_code', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
