<?php

namespace Database\Seeders;

use App\Models\Colour;
use Illuminate\Database\Seeder;

class ColourSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $colors = ['red', 'green', 'blue', 'white'];
        for ($i = 0; $i < count($colors); $i++) {
            Colour::create([
                'name' => $colors[$i],
            ]);
        }
    }
}
