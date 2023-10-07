<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Carbon\Carbon;
use App\Models\User;

class DeleteRecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-records';
    



    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes records older than 15 minutes where email_verified_at is NULL';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
      $currentTime =now();
      $fifteenMinutesAgo = $currentTime->subMinutes(15);

      User::where('created_at', '<', $fifteenMinutesAgo) ->whereNull('email_verified_at')->delete();
    }
}
