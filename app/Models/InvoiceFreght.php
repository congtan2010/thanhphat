<?php

namespace App\Models;

use App\Enums\InvoiceFreghtPayerEnum;
use App\Enums\InvoiceFreghtStatusEnum;
use Illuminate\Database\Eloquent\Model;
use App\Enums\InvoiceFreghtCurrentPositionEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceFreght extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'price',
        'payer',
        'recipient_phone_number',
        'weight',
        'sender_name',
        'sender_phone_number',
        'sender_address'
    ];
    protected $casts = [
        'status' => InvoiceFreghtStatusEnum::class,
        'payer' => InvoiceFreghtPayerEnum::class,
        'current_position' => InvoiceFreghtCurrentPositionEnum::class,
    ];

    public function User()
    {
        return $this->belongsTo('User::class');
    }
}
