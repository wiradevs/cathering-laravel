<?php

use Illuminate\Database\Seeder;
use App\Province;
use App\Regency;

class AddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::populate();
        Regency::populate();
    }
}
