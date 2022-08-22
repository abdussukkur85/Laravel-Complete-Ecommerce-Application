<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $sizes = ['SM', 'MD', 'LG', 'XL', 'XXL'];
        for ($i = 0; $i < count($sizes); $i++) {
            Size::create([
                'size' => $sizes[$i],
            ]);
        }
    }
}
