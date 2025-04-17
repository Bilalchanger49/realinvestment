<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // Role & Permission Management
            'role.create', 'role.view', 'role.edit', 'role.delete',
            'permission.create', 'permission.view', 'permission.delete',
            'user.view', 'user.assign_role',

            // Property Management
            'property.create', 'property.view', 'property.edit', 'property.delete',
            'property.return.distribution',

            // Admin functionalities
            'investments.view', 'auctions.view', 'advertisements.view',
            'bids.view', 'transactions.view',

            // Profile verification
            'profile.verification.view',
            'profile.verification.accept',
            'profile.verification.reject',

            // Blogs category
            'category.view', 'category.create', 'category.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
