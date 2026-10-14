<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicle = new Vehicle();
        $vehicle->name = 'Toyota Yaris';
        $vehicle->registration_number = 'ABC123';
        $vehicle->save();
    }
}
