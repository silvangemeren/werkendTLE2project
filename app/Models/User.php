<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     * @property int id
     * @property string role
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'b_date',
        'city',
        'role',
        'company_id', // Optioneel, want het kan null zijn
    ];



    public function isEmployer(): bool
    {
        return $this->role === 'werkgever';
    }

    public function isEmployee(): bool
    {
        return $this->role === 'werknemer';
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'b_date' => 'datetime',
    ];


    public function applications()
    {
        return $this->hasMany(Application::class, 'user_id');
    }

}
