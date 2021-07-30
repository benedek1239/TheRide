<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\RequiredRide;
use Carbon\Carbon;

class TruncateOldRequiredRides extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'requiredRides:truncate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete the old required rides';

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
        $date = Carbon::now();
        $date = $date->subDays(3);
        RequiredRide::where('start_time', '<', $date)->each(function ($requiredRide) {
            $requiredRide->delete();
        });
    }
}
