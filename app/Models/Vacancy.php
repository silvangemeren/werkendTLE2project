<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $table = 'vacancies';

    protected $fillable = ['title', 'description','location', 'function', 'work_hours', 'salary', 'status', 'employer_id','imageUrl'];

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }


    public function applications()
    {
        return $this->hasMany(Application::class, 'vacancy_id');
    }

}
