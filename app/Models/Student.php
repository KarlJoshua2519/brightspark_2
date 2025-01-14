<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{

    // In Student model
public function teacher()
{
    return $this->belongsTo(Teacher::class, 'grade', 'grade');
}
    use HasFactory, Notifiable;

    protected $guard = 'student';

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
        'grade',
        'section',
        'lrn',
        'profile_picture', // Added profile_picture to the fillable fields
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
