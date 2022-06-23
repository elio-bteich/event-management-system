<?php

namespace Database\Seeders;

use App\Models\ReservationOption;
use Illuminate\Database\Seeder;

class ReservationOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [
            ['description' => 'walk in', 'min_capacity' => 1, 'max_capacity' => 1],
            ['description' => 'table', 'min_capacity' => 1, 'max_capacity' => 4],
            ['description' => 'lounge', 'min_capacity' => 2, 'max_capacity' => 4],
            ['description' => 'backstage lounge', 'min_capacity' => 2, 'max_capacity' => 4],
        ];
        foreach ($options as $option) {
            ReservationOption::create($option);
        }
    }
}
