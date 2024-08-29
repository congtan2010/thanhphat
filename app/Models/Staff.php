<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\StaffGenderEnum;
use App\Enums\StaffPositionEnum;

class Staff extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'fullname',
        'phone_number',
        'password',
    ];
    protected $casts = [];
    protected $table = 'staff';

    // public function StaffManagement()
    // {
    //     return $this->belongsTo('StaffManagement::class');
    // }
}
