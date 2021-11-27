<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\State;
use Illuminate\Support\Facades\Log;



class CountStates implements ShouldQueue
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
        $states= State::select('name')->withCount('cities')->withCount('areas')->get();
        foreach($states as $state){
            Log::info($state->name.' state has '.$state->cities_count. ' city and '.$state->areas_count. ' area.');
        }
    }
}
