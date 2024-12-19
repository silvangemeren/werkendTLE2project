<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'vacancy_id', 'applied_at', 'status'];

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::created(function ($application) {
            $application->vacancy->increment('total_applications');
        });

        static::deleted(function ($application) {
            $application->vacancy->decrement('total_applications');
        });
    }

}
