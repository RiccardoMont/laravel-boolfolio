<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['Html', 'Css', 'Js', 'Vue', 'Php', 'Laravel'];

        foreach($technologies as $technology) {
            $tech = new Technology();
            $tech->name = $technology;
            $tech->slug = Str::slug($technology, '-');
            $tech->save();
        }
    }
}
