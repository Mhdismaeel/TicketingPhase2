<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\User_permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name'=>'Can create teams','guard_name'=>'web']);
        Permission::create(['name'=>'Can update teams','guard_name'=>'web']);
        Permission::create(['name'=>'Can delete teams','guard_name'=>'web']);
        Permission::create(['name'=>'Can fetch teams','guard_name'=>'web']);
        Permission::create(['name'=>'Can create boards','guard_name'=>'web']);
        Permission::create(['name'=>'Can update boards','guard_name'=>'web']);
        Permission::create(['name'=>'Can delete boards','guard_name'=>'web']);
        Permission::create(['name'=>'Can fetch boards','guard_name'=>'web']);
        Permission::create(['name'=>'Can create columns','guard_name'=>'web']);
        Permission::create(['name'=>'Can update columns','guard_name'=>'web']);
        Permission::create(['name'=>'Can delete columns','guard_name'=>'web']);
        Permission::create(['name'=>'Can fetch columns','guard_name'=>'web']);
        Permission::create(['name'=>'Can create tickets','guard_name'=>'web']);
        Permission::create(['name'=>'Can update tickets','guard_name'=>'web']);
        Permission::create(['name'=>'Can delete tickets','guard_name'=>'web']);
        Permission::create(['name'=>'Can fetch tickets','guard_name'=>'web']);
        Permission::create(['name'=>'Can create users','guard_name'=>'web']);
        Permission::create(['name'=>'Can update users','guard_name'=>'web']);
        Permission::create(['name'=>'Can delete users','guard_name'=>'web']);
        Permission::create(['name'=>'Can fetch users','guard_name'=>'web']);
        Permission::create(['name'=>'Can create roles','guard_name'=>'web']);
        Permission::create(['name'=>'Can update roles','guard_name'=>'web']);
        Permission::create(['name'=>'Can delete roles','guard_name'=>'web']);
        Permission::create(['name'=>'Can fetch roles','guard_name'=>'web']);
        Permission::create(['name'=>'Can create permissions','guard_name'=>'web']);
        Permission::create(['name'=>'Can update permissions','guard_name'=>'web']);
        Permission::create(['name'=>'Can delete permissions','guard_name'=>'web']);
        Permission::create(['name'=>'Can fetch system logs','guard_name'=>'web']);
        Permission::create(['name'=>'Can create projects','guard_name'=>'web']);
        Permission::create(['name'=>'Can update projects','guard_name'=>'web']);
        Permission::create(['name'=>'Can delete projects','guard_name'=>'web']);
        Permission::create(['name'=>'Can fetch projects','guard_name'=>'web']);
        //-***************************************************Owner permissions
        User_permission::create(['user_name'=>'owner@codeminos.dev','role_name'=>'owner','permission_name'=>'Can create teams','project_id'=>'0']);
        User_permission::create(['user_name'=>'owner@codeminos.dev','role_name'=>'owner','permission_name'=>'Can update teams','project_id'=>'0']);
        User_permission::create(['user_name'=>'owner@codeminos.dev','role_name'=>'owner','permission_name'=>'Can delete teams','project_id'=>'0']);
        User_permission::create(['user_name'=>'owner@codeminos.dev','role_name'=>'owner','permission_name'=>'Can update users','project_id'=>'0']);

    }
}
