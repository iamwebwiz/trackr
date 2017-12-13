<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    public function shipmentHistories() {
        return $this->hasMany(ShipmentHistory::class);
    }
}
