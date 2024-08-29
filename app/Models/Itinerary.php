<?php

namespace App\Models;

use App\Enums\ItineraryStartingPoinEnum;

use App\Enums\ItineraryDestinationEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Itinerary extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $casts = [
        'starting_poin' => ItineraryStartingPoinEnum::class,
        'destination' => ItineraryDestinationEnum::class,

    ];
    public function ItineraryManagement()
    {
        return $this->hasMany('ItineraryManagement::class');
    }
    public function Coach()
    {
        return $this->belongsTo('Coach::class');
    }
}
