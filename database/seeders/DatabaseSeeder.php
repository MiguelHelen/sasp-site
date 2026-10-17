<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Usuário de demonstração (apenas para a atividade de PW3).
        User::updateOrCreate(
            ['email' => 'demo@sasp.test'],
            [
                'name' => 'Usuário Demonstração',
                'password' => 'password', // o Model aplica o hash automaticamente
            ]
        );

        $this->call([
            TechnologySeeder::class,
            FeatureSeeder::class,
            PrototypeScreenSeeder::class,
        ]);
    }
}