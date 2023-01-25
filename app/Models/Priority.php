<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    use HasFactory;

    protected $fillable = ['name','color'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'priority_id', 'id');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'priority_id', 'id');
    }
        
}
