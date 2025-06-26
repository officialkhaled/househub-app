<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\RenterFlatAssign;
use App\Models\Flat;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UpdateFlatStatuses extends Command
{
    protected $signature = 'flats:update-status';
    protected $description = 'Update flat status to available if end_month has arrived';

    public function handle(): void
    {
        $today = now()->startOfMonth();

        $assignments = RenterFlatAssign::whereNotNull('end_month')
            ->whereDate('end_month', '<=', $today)
            ->get();

        foreach ($assignments as $assign) {
            $flat = $assign->flat;
            if ($flat && $flat->status !== 'available') {
                $flat->update(['status' => 'available']);
                $this->info("Flat {$flat->id} status updated to available.");
            }
        }

        $this->info('Flat status update check complete.');
    }
}

