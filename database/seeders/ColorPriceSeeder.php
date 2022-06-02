<?php

namespace Database\Seeders;

use App\Models\ColorPrice;
use Illuminate\Database\Seeder;

class ColorPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ColorPrice::factory(10)->create();
    }
}
