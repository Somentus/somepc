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
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index() {
        $builds = Build::all()->where('user_id', Auth::id());

        return view('builds.index', compact('builds'));
    }

    public function create()
    {
        $components = [
            'processor' => Processor::all(),
            'motherboard' => Motherboard::all(),
            'graphics' => Graphic::all(),
            'memory' => Memory::all(),
            'storage' => Storage::all(),
            'tower' => Tower::all(),
            'power' => Power::all(),
            'optical' => Optical::all()
        ];

        return view('builds.create', compact('components'));
    }

    public function store()
    {
        if(Auth::check()){
            $buildId = request('id');
            $build = Build::find($buildId);
            if($build) {
                $build->name = request('name');
                $build->processor_id = request('processor');
                $build->motherboard_id = request('motherboard');
                $build->graphics_id = request('graphics');
                $build->memory_id = request('memory');
                $build->storage_id = request('storage');
                $build->tower_id = request('tower');
                $build->power_id = request('power');
                $build->optical_id = request('optical');
                $build->save();
            } else {
                $buildId = Build::create([
                    'name' => request('name'),
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

            }

            return redirect('/builds/'.$buildId);
        }

        return back();
    }

    public function show(Build $build)
    {
        $components = [
            'processor' => Processor::all(),
            'motherboard' => Motherboard::all(),
            'graphics' => Graphic::all(),
            'memory' => Memory::all(),
            'storage' => Storage::all(),
            'tower' => Tower::all(),
            'power' => Power::all(),
            'optical' => Optical::all()
        ];

        if(Auth::check()) {
            return view('builds.edit', compact('components', 'build'));
        }

        return view('builds.show', compact('components', 'build'));

    }
}
