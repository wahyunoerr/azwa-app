<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Permission::create(['name' => 'supplier']);
        // Permission::create(['name' => 'transaction']);
        // Permission::create(['name' => 'tambah produk']);

        $roleAdmin = Role::create(['name' => 'admin']);
        $user = User::create([
            'name' => 'Admin Ber Brewok',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123')
        ]);

        $user->assignRole($roleAdmin);

        $roleUser = Role::create(['name' => 'user']);
        $user = User::create([
            'name' => 'User Mada',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user123')
        ]);

        $user->assignRole($roleUser);

        $roleSupplier = Role::create(['name' => 'supplier']);
        $user = User::create([
            'name' => 'Supplier Mau Untung Saja',
            'email' => 'supply@gmail.com',
            'password' => Hash::make('supply123')
        ]);

        $user->assignRole($roleSupplier);
    }
}
