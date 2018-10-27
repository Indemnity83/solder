<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissions extends Seeder
{
    /**
     * The permissions required for the application. the
     * admin role will be granted all these permissions
     * automatically.
     */
    private $permissions = [
        //
    ];

    /**
     * The standard roles required for the application.
     * an 'admin' role will also be created.
     */
    private $roles = [
        'user'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createRoles();
        $this->createPermissions();
        $this->createAdmin();
    }

    /**
     * Add roles to the system
     */
    private function createRoles()
    {
        foreach($this->roles as $role) {
            Role::create(['name' => $role]);
        }
    }

    /**
     * Add permissions to the system
     */
    private function createPermissions()
    {
        foreach($this->permissions as $permission) {
            echo $permission;
            Permission::create(['name' => $permission]);
        }
    }

    /**
     * Create a special admin role and grant it all permissions
     */
    private function createAdmin()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());
    }
}
