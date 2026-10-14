<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Validation\Rule;

class VehicleController extends Controller
{
    public function index(){
        $title = 'FleetDesk Vehicles';
        $vehicles = Vehicle::all();
        return view('vehicles.index', ['title' => $title, 'vehicles' => $vehicles]);
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'registration_number' => ['required', 'string', 'max:255', 'unique:vehicles,registration_number'],
        ]);
        $vehicle = new Vehicle();
        $vehicle->name = $validated['name'];
        $vehicle->registration_number = $validated['registration_number'];
        $vehicle->save();

        return redirect('/vehicles');
    }

    public function show(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        return view('vehicles.show', ['vehicle' => $vehicle]);
    }

    public function edit(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        return view('vehicles.edit', ['vehicle' => $vehicle]);
    }

    public function update(Request $request, string $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'registration_number' => ['required', 'string', 'max:255', Rule::unique('vehicles', 'registration_number')
            ->ignore($vehicle->id),
            ],
        ]);

        $vehicle->name = $validated['name'];
        $vehicle->registration_number = $validated['registration_number'];
        $vehicle->save();

        return redirect("/vehicles/{$vehicle->id}");
    }

    public function destroy(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return redirect('/vehicles');
    }

}