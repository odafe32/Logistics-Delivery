<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipmentStatus extends Model
{
    protected $fillable = [
        'shipment_id',
        'status',
        'notes',
        'location',
        'status_date'
    ];

    protected $casts = [
        'status_date' => 'datetime'
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
