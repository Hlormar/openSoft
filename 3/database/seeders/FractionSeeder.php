<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fraction;

class FractionSeeder extends Seeder
{
    public function run(): void
    {
    Fraction::updateOrCreate(
        ['name' => 'Adeptus Mechanicus'],
        [
            'subtitle' => 'Imperium technology factory',
            'description' => 'Adeptus Mechanicus — это технологическая фракция Империума. Они хранят знания о древних технологиях и создают оружие для армии.',
            'image_path' => 'res/adeptus/40K_LP_-_Imperium_-_Adeptus_Mechanicus.webp',
        ]
    );
    Fraction::updateOrCreate(
        ['name' => 'Imperial Agents'],
        [
            'subtitle' => 'Agents of imperial codex',
            'description' => 'Imperial Agents — элитные оперативники, выполняющие секретные миссии по всему галактическому пространству.',
            'image_path' => 'res/adeptus/HP-241008-824x1256-ImperialAgentsCodex.webp',
        ]
    );
    Fraction::updateOrCreate(
        ['name' => 'Adeptus Custodes'],
        [
            'subtitle' => 'The Emperor bodyguards',
            'description' => 'Adeptus Custodes — элитные воины, защищающие Императора человечества на Золотом Троне. ',
            'image_path' => 'res/adeptus/LP-240413-CODEXCARD-Custodes__1_.webp',
        ]
    );
    Fraction::updateOrCreate(
        ['name' => 'Sisters Of Battle'],
        [
            'subtitle' => 'Ордо Еретикус Инквизиции',
            'description' => 'Боевые Сёстры Адепта Сороритас составляют основу армий Адептус Министорум.',
            'image_path' => 'res/adeptus/LP40K-240608-Square-Sororitas.webp',
        ]
    );
    Fraction::updateOrCreate(
        ['name' => 'Titans'],
        [
            'subtitle' => 'Lorem ipsum',
            'description' => 'Титаны (англ. Titans), также известные как богомашины — огромные боевые человекоподобные роботы, крупнейшие из боевых машин',
            'image_path' => 'res/adeptus/LP40K-TOUT-060925-ImperialKnightsCodex.webp',
        ]
    );

    }
}