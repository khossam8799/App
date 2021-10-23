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
use App\Models\State;
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
    public function handle()
    {
        $statesIds=State::pluck('id')->toArray();
        foreach($statesIds as $stateId){
            $statecitiesIds=City::where('stateId',$stateId)->pluck('id')->toArray();
            $citiesAreasIds=Area::whereIn('cityId',$statecitiesIds)->pluck('id')->toArray();
            $stateName=State::where('id',$stateId)->value('name');
            Log::info($stateName.' had '.count($statecitiesIds).' cities and ' .count($citiesAreasIds) .' areas' );
        }

    }
}
