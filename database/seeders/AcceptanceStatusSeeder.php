<?php

namespace Database\Seeders;

use App\Models\AcceptanceStatus;
use Illuminate\Database\Seeder;

class AcceptanceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['description' => 'rejected'],
            ['description' => 'on hold'],
            ['description' => 'accepted'],
        ];
        foreach ($statuses as $status) {
            AcceptanceStatus::create($status);
        }
    }
}
