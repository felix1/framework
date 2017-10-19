<?php

namespace App\Modules\Platform\Database\Seeds;

use Nova\Database\ORM\Model;
use Nova\Database\Seeder;

use App\Modules\Platform\Database\CreatePermissionsTrait;


class PermissionsTableSeeder extends Seeder
{
    use CreatePermissionsTrait;


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = array(
            array(
                'name'  => 'Access the Administration area',
                'slug'  => 'platform.backend.manage',
                'group' => 'platform',

                'roles' => array(1, 2),
            ),
            array(
                'name'  => 'Manage the Platform Settings',
                'slug'  => 'platform.settings.manage',
                'group' => 'platform',

                'roles' => array(1, 2),
            ),
        );

        $this->createPermissions($permissions);
    }
}
