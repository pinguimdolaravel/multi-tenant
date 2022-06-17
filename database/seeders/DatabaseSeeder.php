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
            /** @var Tenant $tenant */
            $tenant = Tenant::query()->create([
                'id'    => 'aj',
                'name'  => 'Aj',
                'logo'  => 'https://w7.pngwing.com/pngs/402/36/png-transparent-lorem-ipsum-logo-font-ofset-text-logo-integer.png',
                'color' => '#dc2b2b',
                'from'  => 'aj@aj.test',
            ]);
            $tenant->domains()->create(['domain' => 'aj.test']);

            /** @var Tenant $tenant */
            $tenant = Tenant::query()->create([
                'id'    => 'jean',
                'name'  => 'Jean',
                'logo'  => 'https://image.similarpng.com/very-thumbnail/2020/12/Lorem-ipsum-logo-isolated-clipart-PNG.png',
                'color' => '#000000',
                'from'  => 'jean@jean.test',
            ]);
            $tenant->domains()->create(['domain' => 'jean.test']);
        }

    }
}
