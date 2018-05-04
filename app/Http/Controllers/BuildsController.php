<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Build;
use App\Graphic;
use App\Memory;
use App\Motherboard;
use App\Optical;
use App\Power;
use App\Processor;
use App\Storage;
use App\Tower;

class BuildsController extends Controller
{
    public function index() {
        $builds = Build::all()->where('user_id', Auth::id());

        return view('builds.index', compact('builds'));
    }

    public function create()
    {
        $components = array();
        $components['processor'] = array('models' => Processor::all(), 'title' => 'Processor');
        $components['motherboard'] = array('models' => Motherboard::all(), 'title' => 'Motherboard');
        $components['graphics'] = array('models' => Graphic::all(), 'title' => 'Graphics Card');
        $components['memory'] = array('models' => Memory::all(), 'title' => 'Memory');
        $components['storage'] = array('models' => Storage::all(), 'title' => 'Storage');
        $components['tower'] = array('models' => Tower::all(), 'title' => 'Case');
        $components['power'] = array('models' => Power::all(), 'title' => 'Power Supply');
        $components['optical'] = array('models' => Optical::all(), 'title' => 'Optical Drive');

        return view('builds.create', compact('components'));
    }

    public function store()
    {
        $buildId = Build::create([
            'processor_id' => request('processor'),
            'motherboard_id' => request('motherboard'),
            'graphics_id' => request('graphics'),
            'memory_id' => request('memory'),
            'storage_id' => request('storage'),
            'tower_id' => request('tower'),
            'power_id' => request('power'),
            'optical_id' => request('optical'),
            'user_id' => Auth::id()
        ])->id;

        return redirect('/builds/'.$buildId);
    }

    public function show(Build $build)
    {
        $components = array();
        $components['processor'] = array('models' => Processor::all(), 'title' => 'Processor');
        $components['motherboard'] = array('models' => Motherboard::all(), 'title' => 'Motherboard');
        $components['graphics'] = array('models' => Graphic::all(), 'title' => 'Graphics Card');
        $components['memory'] = array('models' => Memory::all(), 'title' => 'Memory');
        $components['storage'] = array('models' => Storage::all(), 'title' => 'Storage');
        $components['tower'] = array('models' => Tower::all(), 'title' => 'Case');
        $components['power'] = array('models' => Power::all(), 'title' => 'Power Supply');
        $components['optical'] = array('models' => Optical::all(), 'title' => 'Optical Drive');

        $chosenComponents = array();
        $chosenComponents['processor'] = $build['processor_id'];
        $chosenComponents['motherboard'] = $build['motherboard_id'];
        $chosenComponents['graphics'] = $build['graphics_id'];
        $chosenComponents['memory'] = $build['memory_id'];
        $chosenComponents['storage'] = $build['storage_id'];
        $chosenComponents['tower'] = $build['tower_id'];
        $chosenComponents['power'] = $build['power_id'];
        $chosenComponents['optical'] = $build['optical_id'];

        // TODO: if not logged in, return another view (one without the form)

        return view('builds.show', compact('components', 'chosenComponents'));
    }
}
