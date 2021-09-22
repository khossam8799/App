<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Address;
use App\Models\Area;

class hasAddressesUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:hasAddressesUpdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'updates hasAddresses col in Areas table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $addressesAreasIds=Address::select('areaId')->distinct()->get();
       $plucked=$addressesAreasIds->pluck('areaId');

        Area::whereIn('id', $plucked)
        ->update([
            'hasAddresses'=>true
        ]);

    }
}
