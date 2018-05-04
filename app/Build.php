<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Graphic;
use App\Memory;
use App\Motherboard;
use App\Optical;
use App\Power;
use App\Processor;
use App\Storage;
use App\Tower;

class Build extends Model
{
    protected $fillable = ['user_id', 'processor_id', 'motherboard_id', 'memory_id', 'graphics_id', 'storage_id', 'optical_id', 'tower_id', 'power_id'];
}
