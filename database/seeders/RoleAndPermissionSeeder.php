<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        Role::create(['name' => 'super-admin']);
        $admin = Role::create(['name' => 'admin']);
        $mod = Role::create(['name' => 'moderator']);

//        $resources = [
//            'view-any',
//            'view',
//            'create',
//            'update',
//            'delete',
//            'restore',
//            'force-delete',
//        ];

        $permissions = [
            // Access Page
            'access-filament',
            // Manage Users
            'view-any-user',
            'view-user',
            'create-user',
            'update-user',
            'delete-user',
            'restore-user',
            'force-delete-user',
            // Manage Roles
            'view-any-role',
            'view-role',
            'create-role',
            'update-role',
            'delete-role',
            'restore-role',
            'force-delete-role',
            // Manage Permissions
            'view-any-permission',
            'view-permission',
            'update-permission',
            // Activity Logs
            'view-any-activity-log',
            'view-activity-log',
            // Manage Jobs Failed
            'manage-failed-jobs',
            // Logs Viewer
            'access-logs-viewer',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $admin->syncPermissions([
            // Access Page
            'access-filament',
            // Manage Users
            'view-any-user',
            'view-user',
            'create-user',
            'update-user',
            'delete-user',
            'restore-user',
            // Manage Roles
            'view-any-role',
            'view-role',
            'create-role',
            'update-role',
            'delete-role',
            'restore-role',
            // Manage Permissions
            'view-any-permission',
            'view-permission',
            'update-permission',
            // Activity Logs
            'view-any-activity-log',
            'view-activity-log',
        ]);

        User::find(1)->syncRoles('super-admin');
        User::find(2)->syncRoles('admin');
        User::find(3)->syncRoles('moderator');
        User::find(4)->syncRoles('cosplayer');
    }
}
