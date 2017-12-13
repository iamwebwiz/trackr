<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShipmentHistory extends Model
{
    public function tracking() {
        return $this->belongsTo(Tracking::class);
    }
}
