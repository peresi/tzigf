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
        $adminEmail = env('ADMIN_EMAIL', 'admin@tzigf.or.tz');
        $adminName = env('ADMIN_NAME', 'TzIGF Admin');

        $user = User::firstOrCreate(
            ['email' => $adminEmail],
            [
                'name' => $adminName,
                'password' => Hash::make(env('ADMIN_PASSWORD', 'change-this-password')),
                'is_admin' => true,
            ]
        );

        if (! $user->is_admin) {
            $user->is_admin = true;
            $user->save();
        }
    }
}
