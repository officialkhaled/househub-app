<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AssignPermissionsCommand extends Command
{
    protected $signature = 'assign:permission';

    protected $description = 'Assign All Permissions to Super Admin';

    public function handle(): void
    {
        $this->info('Assigning all permissions to the super-admin role...');

        $superAdminRole = Role::where('name', 'super-admin')->firstOrFail();
        $allPermissionNames = Permission::pluck('name')->toArray();

        $superAdminRole->givePermissionTo($allPermissionNames);

        $this->info('All Permissions Assigned Successfully!');
    }
}
