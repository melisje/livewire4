<?php

namespace Database\Seeders;

use App\Models\Production\Checklist;
use Illuminate\Database\Seeder;

class ChecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Genereer 20 willekeurige checklists in de database
        Checklist::factory()->count(200)->create();
    }
}
