<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Driver']);
        Role::create(['name' => 'Vendor']);

        $admin = User::create([
            'name'     => 'Admin',
            'email'    => 'admin@mediacar.com',
            'phone'    => '01006505723',
            'password' => bcrypt('admin')
        ]);

        $admin->assignRole('Admin');
    }
}
