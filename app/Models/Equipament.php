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

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function getEquipamentType()
    {
        $equipamentType = config('savedocs.equipament_type');
        if (array_key_exists($this->equipment_type, $equipamentType)) {
            return (object) $equipamentType[$this->equipment_type];
        }

        return [];
    }

}
