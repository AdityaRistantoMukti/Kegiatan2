<?php

use App\User;
use App\Role;
use App\Permission;
use Illuminate\Database\Seeder;

class AclSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        $permission = Permission::defaultPermissions();

        foreach ($permission as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }
        $this->command->info('Default Permissions added.');

        $roles = Role::defaultRoles();
        foreach ($roles as $role) {
            $role = Role::firstOrCreate(['name' => $role]);

            if ($role->name == 'admin') {
                $role->givePermissionTo(Permission::all());
            }
        }

        $this->command->info('Default Roles added.');
    }
}
