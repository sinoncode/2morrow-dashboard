<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RbacSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $permissions = [
            'manage_users' => 'Create, update, and delete users',
            'manage_roles' => 'Create, update, and delete roles',
            'manage_permissions' => 'Create, update, and delete permissions',
            'view_dashboard' => 'View dashboard KPI and summary data',
            'manage_content' => 'Manage content, moderation, and approvals',
            'manage_transactions' => 'Manage transaction records and refunds',
            'manage_notifications' => 'Manage notifications and communications',
            'manage_tickets' => 'Manage support tickets and internal notes',
            'view_reports' => 'View reports and exports',
            'manage_settings' => 'Manage system settings and configuration',
            'view_audit_logs' => 'View audit logs and admin actions',
        ];

        $permissionIds = [];

        foreach ($permissions as $name => $description) {
            $permissionIds[$name] = Permission::firstOrCreate([
                'name' => $name,
            ], [
                'description' => $description,
            ])->id;
        }

        $roles = [
            'superadmin' => [
                'description' => 'Full system access for the primary administrator',
                'permissions' => array_keys($permissions),
            ],
            'admin' => [
                'description' => 'Operations administrator with broad management access',
                'permissions' => [
                    'manage_users',
                    'manage_roles',
                    'manage_permissions',
                    'view_dashboard',
                    'manage_content',
                    'manage_tickets',
                    'view_reports',
                    'manage_notifications',
                ],
            ],
            'agent' => [
                'description' => 'Agent role with access to assigned content and tickets',
                'permissions' => [
                    'view_dashboard',
                    'manage_content',
                    'manage_tickets',
                ],
            ],
            'role advisor' => [
                'description' => 'Advisory role for review and reporting workflows',
                'permissions' => [
                    'view_dashboard',
                    'view_reports',
                    'view_audit_logs',
                ],
            ],
            'user' => [
                'description' => 'Standard user with limited dashboard access',
                'permissions' => [
                    'view_dashboard',
                ],
            ],
        ];

        foreach ($roles as $name => $data) {
            $role = Role::firstOrCreate([
                'name' => $name,
            ], [
                'description' => $data['description'],
            ]);

            $role->permissions()->sync(array_map(fn ($permission) => $permissionIds[$permission], $data['permissions']));
        }
    }
}
