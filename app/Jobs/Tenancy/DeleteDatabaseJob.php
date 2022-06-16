<?php

namespace App\Jobs\Tenancy;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Stancl\Tenancy\Jobs\DeleteDatabase;

class DeleteDatabaseJob extends DeleteDatabase
{
    public function handle()
    {
        if ($this->databaseExists()) {
            parent::handle();
        }
    }

    private function databaseExists(): bool
    {
        $database = $this->tenant->database()->getName();

        return $this->tenant->database()->manager()
            ->databaseExists($database);
    }
}
