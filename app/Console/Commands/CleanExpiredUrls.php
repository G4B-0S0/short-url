<?php

namespace App\Console\Commands;

use App\Models\ShortUrlExpires;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CleanExpiredUrls extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:expired-urls';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean up expired short URLs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //

        ShortUrlExpires::where('expires_at', '<', Carbon::now())->delete();
        $this->info('Expired URLs cleaned up.');
    }
}
