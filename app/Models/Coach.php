<?php

namespace App\Models;

use App\Enums\CoachServiceEnum;
use App\Enums\CoachVehicleTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;
    protected $fillable = [
        'license_plate', //biển số xe
        'coach_maintenance_date',
        'sum_ticket'


    ];
    protected $casts = [
        'service' => CoachServiceEnum::class,
        'vehicle_type' => CoachVehicleTypeEnum::class, //loai xe
    ];

    public function Ticket()
    {
        return $this->hasmany('Ticket::class');
    }
    public function Itinerary()
    {
        return $this->hasMany('Itinerary::class');
    }
}
