<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddhasAdressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addressesAreasIds=Address::select('areaId')->get();

        DB::table('areas')
        ->whereExists(function ($query){
            $query->select(DB::raw(1))
            ->from('addresses')
            ->whereColumn('addresses.areaId','areas.id');
        })
        ->update([
            'hasAddresses'=>true
        ]);


    }
}
