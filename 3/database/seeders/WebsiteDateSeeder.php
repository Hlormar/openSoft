<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WebsiteDate;

class WebsiteDateSeeder extends Seeder
{
    public function run(): void
    {
        WebsiteDate::updateOrCreate(
            ['id' => 1],
            [
                'date' => now()->toDateString(),
            ]
        );
    }
}