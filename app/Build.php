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

    public function Graphic()
    {
        return Graphic::find($this->graphics_id);
    }

    public function Memory()
    {
        return Memory::find($this->memory_id);
    }

    public function Motherboard()
    {
        return Motherboard::find($this->motherboard_id);
    }

    public function Optical()
    {
        return Optical::find($this->optical_id);
    }

    public function Power()
    {
        return Power::find($this->power_id);
    }

    public function Processor()
    {
        return Processor::find($this->processor_id);
    }

    public function Storage()
    {
        return Storage::find($this->storage_id);
    }

    public function Tower()
    {
        return Tower::find($this->tower_id);
    }

}
