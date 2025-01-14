<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable
{

    public function students()
{
    return $this->hasMany(Student::class, 'grade', 'grade');
}

public function subjects()
{
    // Assuming you are linking the teacher’s email in the 'teacher_email' column in the subjects table
    return $this->hasMany(Subject::class, 'teacher_email', 'email');
}

    use HasFactory, Notifiable;

    protected $guard = 'teacher';

    protected $fillable = [
        'name',
        'middleName',
        'lastName',
        'sex',
        'birthday',
        'user_type',
        'address',
        'email',
        'contact_number',
        'password',
        'contactperson',
        'contactperson_number',
        'id_number',
        'subject',
        'department',
        'program',
        'advisory_year',
        'advisory_section',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts =[
        'email_verified_at' => 'datetime',
    ];
}
