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
    protected $fillable = ['name', 'user_id', 'processor_id', 'motherboard_id', 'memory_id', 'graphics_id', 'storage_id', 'optical_id', 'tower_id', 'power_id'];

    public function graphic()
    {
        return Graphic::find($this->graphics_id);
    }

    public function memory()
    {
        return Memory::find($this->memory_id);
    }

    public function motherboard()
    {
        return Motherboard::find($this->motherboard_id);
    }

    public function optical()
    {
        return Optical::find($this->optical_id);
    }

    public function power()
    {
        return Power::find($this->power_id);
    }

    public function processor()
    {
        return Processor::find($this->processor_id);
    }

    public function storage()
    {
        return Storage::find($this->storage_id);
    }

    public function tower()
    {
        return Tower::find($this->tower_id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
