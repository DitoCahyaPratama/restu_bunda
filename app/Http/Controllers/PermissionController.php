<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //
    public function Permission()
    {   
        $admin_permission = Permission::where('slug','create-stocks')->first();
		$bendahara_permission = Permission::where('slug', 'view-funds')->first();
		$manager_permission = Permission::where('slug', 'view-stoks')->first();

		//RoleTableSeeder.php
		$admin_role = new Role();
		$admin_role->slug = 'admin';
		$admin_role->name = 'Admin Restu Bunda';
		$admin_role->save();
		$admin_role->permissions()->attach($admin_permission);

		$bendahara_role = new Role();
		$bendahara_role->slug = 'bendahara';
		$bendahara_role->name = 'Bendahara Restu Bunda';
		$bendahara_role->save();
		$bendahara_role->permissions()->attach($bendahara_permission);

        $manager_role = new Role();
		$manager_role->slug = 'manager';
		$manager_role->name = 'Manager Restu Bunda';
		$manager_role->save();
		$manager_role->permissions()->attach($manager_permission);

        $admin_role = Role::where('slug','admin')->first();
		$bendahara_role = Role::where('slug','bendahara')->first();
		$manager_role = Role::where('slug', 'manager')->first();

		$createStock = new Permission();
		$createStock->slug = 'create-stocks';
		$createStock->name = 'Create Stoks';
		$createStock->save();
        $createStock->roles()->attach($admin_role);
        
        $viewFunds = new Permission();
		$viewFunds->slug = 'view-funds';
		$viewFunds->name = 'View Funds';
		$viewFunds->save();
		$viewFunds->roles()->attach($bendahara_role);

		$viewStocks = new Permission();
		$viewStocks->slug = 'view-stoks';
		$viewStocks->name = 'View Stocks';
		$viewStocks->save();
		$viewStocks->roles()->attach($manager_role);

		$admin_role = Role::where('slug','admin')->first();
        $bendahara_role = Role::where('slug', 'bendahara')->first();
        $manager_role = Role::where('slug', 'manager')->first();
        $admin_perm = Permission::where('slug','create-stocks')->first();
        $bendahara_perm = Permission::where('slug', 'view-funds')->first();
		$manager_perm = Permission::where('slug','view-stocks')->first();

		$admin = new User();
		$admin->name = 'Dito Admin';
		$admin->email = 'admin@gmail.com';
		$admin->password = bcrypt('qwerty');
		$admin->save();
		$admin->roles()->attach($admin_role);
		$admin->permissions()->attach($admin_perm);

        $bendahara = new User();
		$bendahara->name = 'Dito Bendahara';
		$bendahara->email = 'bendahara@gmail.com';
		$bendahara->password = bcrypt('qwerty');
		$bendahara->save();
		$bendahara->roles()->attach($bendahara_role);
		$bendahara->permissions()->attach($bendahara_perm);

		$manager = new User();
		$manager->name = 'Dito Manager';
		$manager->email = 'manager@gmail.com';
		$manager->password = bcrypt('qwerty');
		$manager->save();
		$manager->roles()->attach($manager_role);
        $manager->permissions()->attach($manager_perm);
        		
		return redirect()->back();
    }
    public function Cek(){
        $user = $request->user();
        dd($user->hasRole('admin','editor'));
    }
}
