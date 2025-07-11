<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\RoleModules;
use App\Models\RolePermission;
use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::truncate();
        Permission::truncate();
        RolePermission::truncate();
        RoleModules::truncate();

        $resourcePermissions = ['index', 'create', 'store', 'show','edit','update','destroy','status'];

        $modules = [
            [
                'display_name' => 'Dashboard',
                'name' => 'dashboard',
                'link' => '/admin/dashboard',
                'permissions' => ['view', 'report', 'print'],
                'icon' => 'fa-dashboard'
            ],
            [
                'display_name' => 'RBAC Accesses',
                'name' => 'accesses',
                'link' => '#',
                'permissions' => ['show'],
                'icon' => 'fa-shield',
                'submenus' => [
                    [
                        'display_name' => 'Modules',
                        'name' => 'modules',
                        'link' => '/admin/module',
                        'permissions' => array_merge($resourcePermissions, []),
                    ],
                    [
                        'display_name' => 'Roles',
                        'name' => 'roles',
                        'link' => '/admin/role',
                        'permissions' => array_merge($resourcePermissions, []),
                    ],
                    [
                        'display_name' => 'Module Permissions',
                        'name' => 'module_permissions',
                        'link' => '/admin/module_permission',
                        'permissions' => array_merge($resourcePermissions, []),
                    ],
                    [
                        'display_name' => 'Role Permissions',
                        'name' => 'role_permissions',
                        'link' => '/admin/role_permissions',
                        'permissions' => array_merge($resourcePermissions, []),
                    ],
                    [
                        'display_name' => 'Users',
                        'name' => 'users',
                        'link' => '/admin/users',
                        'permissions' => array_merge($resourcePermissions, []),
                        'submenus' => []
                    ],
                ]
            ],
            [
                'display_name' => 'Settings',
                'name' => 'setting',
                'link' => '#',
                'permissions' => ['show'],
                'icon' => 'fa-cog',
                'submenus' => [
                    [
                        'display_name' => 'Configurations',
                        'name' => 'configuration',
                        'link' => '/admin/configurations',
                        'permissions' => array_merge($resourcePermissions, []),
                    ],
                ]
            ],
            [
                'display_name' => 'Journal',
                'name' => 'journal',
                'link' => '#',
                'permissions' => ['show'],
                'icon' => 'fa-book',
                'submenus' => [
                    [
                        'display_name' => 'Team Members',
                        'name' => 'team_member',
                        'link' => '/admin/team_member',
                        'permissions' => array_merge($resourcePermissions, []),
                    ],
                    [
                        'display_name' => 'Team Groups',
                        'name' => 'team_group',
                        'link' => '/admin/team_group',
                        'permissions' => array_merge($resourcePermissions, []),
                    ],
                ]
            ],
        ];

        foreach ($modules as $data) {
            $submenus = isset($data['submenus']) && count($data['submenus']) > 0 ? $data['submenus'] : [];
            $permissions = $data['permissions'];
            unset($data['submenus']);
            unset($data['permissions']);

            $parentModule = $this->insertModule($data, 0);
            $this->insertRoleModule($parentModule->id, 1);


            foreach ($permissions as $permission) {
                $new_permission = $this->insertPermission($parentModule->name, $permission, $parentModule->display_name, $parentModule->id);
                $this->insertRolePermission($new_permission->id, 1);
            }

            if (count($submenus) > 0) {
                foreach ($submenus as $submenu) {
                    $subSubMenus = isset($submenu['submenus']) && count($submenu['submenus']) > 0 ? $submenu['submenus'] : [];

                    $permissions = $submenu['permissions'];
                    unset($submenu['permissions']);
                    unset($submenu['submenus']);

                    $module = $this->insertModule($submenu, $parentModule->id, 1);
                    $subParent = $module;

                    $this->insertRoleModule($module->id, 1);

                    foreach ($permissions as $permission) {
                        $new_permission = $this->insertPermission($module->name, $permission, $module->display_name, $module->id);
                        $this->insertRolePermission($new_permission->id, 1);
                    }

                    if (count($subSubMenus) > 0) {
                        foreach ($subSubMenus as $subSubMenu) {
                            $permissions = $subSubMenu['permissions'];
                            unset($subSubMenu['permissions']);
                            unset($subSubMenu['submenus']);

                            $module = $this->insertModule($subSubMenu, $subParent->id);
                            $this->insertRoleModule($module->id, 1);


                            foreach ($permissions as $permission) {
                                $new_permission = $this->insertPermission($module->name, $permission, $module->display_name, $module->id);
                                $this->insertRolePermission($new_permission->id, 1);
                            }
                        }
                    }
                }
            }
        }
    }

    public function insertModule($data, $parent_id = 0)
    {
        $module = new Module();
        $module->fill($data);
        $module->parent_id = $parent_id;
        $module->save();

        return $module;
    }

    public function insertRoleModule($module_id, $role_id = 1)
    {
        $role_module = new RoleModules();
        $role_module->role_id = $role_id;
        $role_module->module_id = $module_id;
        $role_module->save();

        return $role_module;
    }

    public function insertPermission($name, $permission, $display_name, $module_id)
    {
        $new_name = $name . '.' . $permission;
        $new_permission = new Permission();
        $new_permission->module_id = $module_id;
        $new_permission->name = $new_name;
        $new_permission->display_name = $display_name . ' ' . str_replace('_', ' ', $permission);
        $new_permission->save();

        return $new_permission;
    }

    public function insertRolePermission($permission_id, $role_id = 1)
    {
        $role_module = new RolePermission();
        $role_module->role_id = $role_id;
        $role_module->permission_id = $permission_id;
        $role_module->save();

        return $role_module;
    }
}
