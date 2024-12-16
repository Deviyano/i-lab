<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpdrachtenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Opdrachten')->insertOrIgnore([
            [
                'Uitleg' => 'Dianne heeft wat gesurft op internet en kwam een filmpje tegen over technologie in de zorg.',
                'Vraag' => 'Geef aan welke hulpmiddelen geschikt zouden zijn voor mevrouw de Wit.',
                'antwoord' => 'Mevrouw de Wit kan een smartwatch gebruiken voor gezondheidsmonitoring.',
                'quiz_id' => '1',
            ],
            [
                'Uitleg' => 'Jan zoekt manieren om zijn mobiliteit te verbeteren.',
                'Vraag' => 'Wat zou een geschikte technologie kunnen zijn?',
                'antwoord' => 'Een elektrische rolstoel kan een oplossing zijn.',
                'quiz_id' => '2',
            ],
            [
                'Uitleg' => 'De volgende vraag gaat over Minecraft.',
                'Vraag' => 'Wanneer kwam Mineraft uit?',
                'antwoord' => '2009',
                'quiz_id' => '3',
            ],
        ]);
    }
}
