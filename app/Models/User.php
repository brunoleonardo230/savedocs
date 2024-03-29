<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cpf',
        'email',
        'fantasy_name',
        'cnpj',
        'password',
        'is_active',
        'phone',
        'ticket_remote',
        'ticket_in_person',
        'role_id',
        'address_id',
        'type_user_id',
        'representative_id',
        'user_login',
        'company'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAccessEndAttribute()
    {
        $accessEndAt = $this->subscription('default')->ends_at;

        return Carbon::make($accessEndAt)->format("d/m/Y à\s H:i:s");
    }

    public function getAccessBeginAttribute()
    {
        $accessBeginAt = $this->subscription('default')->created_at;

        return Carbon::make($accessBeginAt)->format("d/m/Y à\s H:i:s");
    }

    public function getAccessRenovationAttribute()
    {
        $accessRenovation = $this->subscription('default')->created_at;

        return Carbon::make($accessRenovation)->addMonth()->format("d/m/Y");
    }

    public function getAccessStatusAttribute()
    {
        $accessStatus = $this->subscription('default')->stripe_status;

        return $accessStatus;
    }

    public function plan()
    {
        $stripePlan = $this->subscription('default')->stripe_price;

        return Plan::where('stripe_id', $stripePlan)->first();
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    public function isAdmin()
    {
        return $this->role->id == Role::ROLE_ADMINISTRATOR;
    }

    public function isClient()
    {
        return $this->role->id == Role::ROLE_CLIENT;
    }

    public function isTechnician()
    {
        return $this->role->id == Role::ROLE_TECHNICIAN;
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function representative()
    {
        return $this->belongsTo(Representative::class);
    }

    public function equipaments()
    {
        return $this->hasMany(Equipament::class, 'user_id', 'id');
    }

    public function userCompany($id)
    {
        $user_name = User::select('fantasy_name')->find($id);
        
        return $user_name;
    }
}
