<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Build;
use App\GraphicsCard;
use App\Memory;
use App\Motherboard;
use App\OpticalDrive;
use App\PowerSupply;
use App\Processor;
use App\Storage;
use App\Tower;

class BuildsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $components = array();
        $components['processor'] = array('models' => Processor::all(), 'title' => 'Processor');
        $components['motherboard'] = array('models' => Motherboard::all(), 'title' => 'Motherboard');
        $components['graphics_card'] = array('models' => GraphicsCard::all(), 'title' => 'Graphics Card');
        $components['memory'] = array('models' => Memory::all(), 'title' => 'Memory');
        $components['storage'] = array('models' => Storage::all(), 'title' => 'Storage');
        $components['tower'] = array('models' => Tower::all(), 'title' => 'Case');
        $components['power_supply'] = array('models' => PowerSupply::all(), 'title' => 'Power Supply');
        $components['optical_drive'] = array('models' => OpticalDrive::all(), 'title' => 'Optical Drive');

        return view('build.create', compact('components'));
    }

    public function store()
    {
        $buildId = Build::create([
            'processor_id' => request('processor'),
            'motherboard_id' => request('motherboard'),
            'graphics_card_id' => request('graphics_card'),
            'memory_id' => request('memory'),
            'storage_id' => request('storage'),
            'tower_id' => request('tower'),
            'power_supply_id' => request('power_supply'),
            'optical_drive_id' => request('optical_drive'),
            'user_id' => Auth::user()->id
        ])->id;

        return redirect('/builds/'.$buildId);
    }

    public function show(Build $build)
    {
        $components = array();
        $components['processor'] = array('models' => Processor::all(), 'title' => 'Processor');
        $components['motherboard'] = array('models' => Motherboard::all(), 'title' => 'Motherboard');
        $components['graphics_card'] = array('models' => GraphicsCard::all(), 'title' => 'Graphics Card');
        $components['memory'] = array('models' => Memory::all(), 'title' => 'Memory');
        $components['storage'] = array('models' => Storage::all(), 'title' => 'Storage');
        $components['tower'] = array('models' => Tower::all(), 'title' => 'Case');
        $components['power_supply'] = array('models' => PowerSupply::all(), 'title' => 'Power Supply');
        $components['optical_drive'] = array('models' => OpticalDrive::all(), 'title' => 'Optical Drive');

        $chosenComponents = array();
        $chosenComponents['processor'] = $build['processor_id'];
        $chosenComponents['motherboard'] = $build['motherboard_id'];
        $chosenComponents['graphics_card'] = $build['graphics_card_id'];
        $chosenComponents['memory'] = $build['memory_id'];
        $chosenComponents['storage'] = $build['storage_id'];
        $chosenComponents['tower'] = $build['tower_id'];
        $chosenComponents['power_supply'] = $build['power_supply_id'];
        $chosenComponents['optical_drive'] = $build['optical_drive_id'];

        return view('build.show', compact('components', 'chosenComponents'));
    }
}
