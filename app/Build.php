<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    protected $fillable = ['user_id', 'processor_id', 'motherboard_id', 'memory_id', 'graphics_card_id', 'storage_id', 'optical_drive_id', 'tower_id', 'power_supply_id'];
}
