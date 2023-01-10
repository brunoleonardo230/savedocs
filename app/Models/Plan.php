<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name','url','stripe_id','price','ticket_remote','ticket_in_person','recomended','description'];
    
    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function getPriceBrAttribute()
    {
        return number_format($this->price, 2, ',', '.');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
