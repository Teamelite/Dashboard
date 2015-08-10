<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class AccessControlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = "administrator";
        $admin->display_name = "Administrator";
        $admin->description = "An administrator gains access to everything.";
        $admin->power = 1000;
        $admin->save();

        $dashboardAccess = new Permission();
        $dashboardAccess->name = "dashboard.access";
        $dashboardAccess->display_name = "Dashboard access";
        $dashboardAccess->description = "Grant's a user access to the dashboard.";
        $dashboardAccess->save();

        $admin->attachPermission($dashboardAccess);
    }
}
