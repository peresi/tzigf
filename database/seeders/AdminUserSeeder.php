<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@tzigf.or.tz'],
            [
                'name' => 'TzIGF Admin',
                'password' => Hash::make('admin12345'),
                'is_admin' => true,
            ]
        );
    }
}
