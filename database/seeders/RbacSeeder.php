<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RbacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (['super-admin','org-admin','reviewer','user'] as $r) {
            Role::firstOrCreate(['name'=>$r, 'guard_name'=>'web']);
        }

        $admin =User::firstWhere('email','admin@gmail.com');
        if ($admin) $admin->assignRole('super-admin');
    }
}
