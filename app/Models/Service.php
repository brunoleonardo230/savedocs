<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name','priority_id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'service_id', 'id');
    }

    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }

    public function priority()
    {
        return $this->belongsTo(Priority::class, 'priority_id');
    }
        
}
