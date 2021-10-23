<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\City;
use App\Models\Area;
use Illuminate\Support\Facades\Log;



class countStates implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle($stateId)
    {
        $statecitiesIds=City::where('stateId',$stateId)->pluck('id')->toArray();
        $citiesAreasIds=Area::whereIn('cityId',$statecitiesIds)->pluck('id')->toArray();

        Log::info('State had '.count($statecitiesIds).' cities and ' .count($citiesAreasIds) .' areas' );

    }
}
