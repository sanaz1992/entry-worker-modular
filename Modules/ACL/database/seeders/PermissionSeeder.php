<?php

namespace Modules\ACL\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\ACL\Entities\Permission;
use Modules\ACL\Entities\Role;
use Modules\User\Entities\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name'  => 'roles_list',
                'title' => 'لیست دسترسی ها',
            ],
            [
                'name'  => 'roles_create',
                'title' => 'ایجاد دسترسی',
            ],
            [
                'name'  => 'roles_edit',
                'title' => 'ویرایش دسترسی ها',
            ],
            [
                'name'  => 'users_list',
                'title' => 'لیست مشتری ها',
            ],
            [
                'name'  => 'users_show',
                'title' => 'مشاهده مشتری',
            ],
            [
                'name'  => 'users_create',
                'title' => 'ایجاد مشتری',
            ],
            [
                'name'  => 'users_edit',
                'title' => 'ویرایش مشتری',
            ],
            [
                'name'  => 'users_delete',
                'title' => 'حذف مشتری',
            ],
            [
                'name'  => 'sellers_list',
                'title' => 'لیست نمایندگان',
            ],
            [
                'name'  => 'sellers_show',
                'title' => 'مشاهده نماینده',
            ],
            [
                'name'  => 'sellers_create',
                'title' => 'ایجاد نماینده',
            ],
            [
                'name'  => 'sellers_edit',
                'title' => 'ویرایش نماینده',
            ],
            [
                'name'  => 'sellers_delete',
                'title' => 'حذف نماینده',
            ],
            [
                'name'  => 'admins_list',
                'title' => 'لیست مدیران',
            ],
            [
                'name'  => 'admins_show',
                'title' => 'مشاهده مدیر',
            ],
            [
                'name'  => 'admins_create',
                'title' => 'ایجاد مدیر',
            ],
            [
                'name'  => 'admins_edit',
                'title' => 'ویرایش مدیر',
            ],
            [
                'name'  => 'admins_delete',
                'title' => 'حذف مدیر',
            ],
            [
                'name'  => 'admins_roles_edit',
                'title' => 'ویرایش دسترسی های مدیر',
            ],
            [
                'name'  => 'categories_list',
                'title' => 'لیست گروهبندی محصولات',
            ],
            [
                'name'  => 'categories_create',
                'title' => 'ایجاد گروهبندی محصولات',
            ],
            [
                'name'  => 'categories_edit',
                'title' => 'ویرایش گروهبندی محصولات',
            ],

        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission['name']],
                [
                    'title'      => $permission['title'],
                    'guard_name' => 'web',
                ]
            );
        }

        $role = Role::firstOrCreate(
            ['name' => 'super_admin'],
            [
                'title'      => 'سوپر ادمین',
                'guard_name' => 'web',
            ]
        );

        $allPermissions = Permission::all();
        $role->syncPermissions($allPermissions);

        $user = User::firstOrCreate(
            ['mobile' => '09358364707'],
            [
                'fname'     => 'sanaz',
                'lname'     => 'keyvanloo',
                'password' => Hash::make('12345678'),
            ]
        );
        $user->assignRole($role);
    }
}
