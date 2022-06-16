<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        if (tenant()) {
            User::factory()->create([
                'name'  => tenant()->id . ' User',
                'email' => tenant()->id . '@example.com',
            ]);
        } else {
            // Seeder da Central de Tenants
            /** @var Tenant $tenant1 */
            $tenant = Tenant::query()->create(['id' => 'aj']);
            $tenant->domains()->create(['domain' => 'aj.test']);

            /** @var Tenant $tenant */
            $tenant = Tenant::query()->create(['id' => 'jean']);
            $tenant->domains()->create(['domain' => 'jean.test']);
        }

    }
}
