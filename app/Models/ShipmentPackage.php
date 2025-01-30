<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipmentPackage extends Model
{
    protected $fillable = [
        'shipment_id',
        'weight',
        'length',
        'width',
        'height',
        'contents'
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
