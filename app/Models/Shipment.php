<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = [
        'tracking_number',
        'user_id',
        'sender_name',
        'sender_phone',
        'sender_email',
        'sender_address',
        'recipient_name',
        'recipient_phone',
        'recipient_email',
        'recipient_address',
        'service_type',
        'total_price',
        'current_status',
        'is_draft',
        'dispatch_date',
        'delivery_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function packages()
    {
        return $this->hasMany(ShipmentPackage::class);
    }

    public function statuses()
    {
        return $this->hasMany(ShipmentStatus::class);
    }

    public function generateTrackingNumber()
    {
        return 'TRK-' . strtoupper(uniqid());
    }
}
