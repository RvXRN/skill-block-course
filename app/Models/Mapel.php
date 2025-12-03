<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $primary_key = "subject_id";
    protected $fillable =[
        'subject_name',
        'curiculum',
        'grade_range'
    ];

    public function users()
{
    return $this->belongsToMany(User::class, 'user_courses', 'subject_id', 'user_id')
                ->withPivot('progress');
}

}
