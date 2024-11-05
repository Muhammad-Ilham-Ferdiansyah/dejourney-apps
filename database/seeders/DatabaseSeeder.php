<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Role;
use App\Models\RoleMenu;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::create([
            'name'        => 'Super Admin',
            'description' => 'Role Super Admin'
        ]);
        Role::create([
            'name'        => 'User Normal',
            'description' => 'Role User Normal'
        ]);


        User::create([
            'name'      => 'Muhammad Ilham Ferdiansyah',
            'role_id'   => 1,
            'username'  => 'ilhamferdx',
            'email'     => 'ilhamferdiansyah737@gmail.com',
            'password'  => bcrypt('password123'),
            'is_active' => 1,
            'email_verified_at' => '2024-11-04 14:18:33'
        ]);
        User::create([
            'name'      => 'Muhammad Raihan Nur Azmii',
            'role_id'   => 1,
            'username'  => 'mraihanna18',
            'email'     => 'mraihanna18@gmail.com',
            'password'  => bcrypt('password123'),
            'is_active' => 1,
            'email_verified_at' => '2024-11-04 14:18:33'
        ]);
        User::create([
            'name'      => 'Debi Dwitama Yusup',
            'role_id'   => 1,
            'username'  => 'debi.dwitama',
            'email'     => 'debidwitama@gmail.com',
            'password'  => bcrypt('password123'),
            'is_active' => 1,
            'email_verified_at' => '2024-11-04 14:18:33'
        ]);

        Menu::create([
            'main_id' => 0,
            'name' => 'Home',
            'description' => 'Halaman Induk Home',
            'orderno' => 1,
            'published' => '1',
        ]);
        Menu::create([
            'main_id' => 0,
            'name' => 'Setup',
            'description' => 'Halaman Induk Setup',
            'orderno' => 2,
            'published' => '1',
        ]);
        Menu::create([
            'main_id' => 1,
            'name' => 'Dashboard',
            'description' => 'Halaman Dashboard dari Home',
            'orderno' => 1,
            'link' => '/dashboard',
            'icon' => 'ti ti-layout-dashboard',
            'published' => '1',
        ]);
        Menu::create([
            'main_id' => 2,
            'name' => 'Setup Roles',
            'description' => 'Halaman Setup Roles dari Setup',
            'orderno' => 1,
            'link' => '/roles',
            'icon' => 'ti ti-key',
            'published' => '1',
        ]);
        Menu::create([
            'main_id' => 2,
            'name' => 'Setup Menu',
            'description' => 'Halaman Setup Menu dari Setup',
            'orderno' => 2,
            'link' => '/menus',
            'icon' => 'ti ti-menu',
            'published' => '1',
        ]);
        Menu::create([
            'main_id' => 2,
            'name' => 'Setup Role Menu',
            'description' => 'Halaman Setup Menu dari Setup',
            'orderno' => 3,
            'link' => '/role_menus',
            'icon' => 'ti ti-settings',
            'published' => '1',
        ]);
        Menu::create([
            'main_id' => 2,
            'name' => 'Setup Users',
            'description' => 'Halaman Setup Users dari Setup',
            'orderno' => 4,
            'link' => '/users',
            'icon' => 'ti ti-user',
            'published' => '1',
        ]);

        RoleMenu::create([
            'role_id' => '1',
            'menu_id' => '1'
        ]);
        RoleMenu::create([
            'role_id' => '1',
            'menu_id' => '2'
        ]);
        RoleMenu::create([
            'role_id' => '1',
            'menu_id' => '3'
        ]);
        RoleMenu::create([
            'role_id' => '1',
            'menu_id' => '4'
        ]);
        RoleMenu::create([
            'role_id' => '1',
            'menu_id' => '5'
        ]);
        RoleMenu::create([
            'role_id' => '1',
            'menu_id' => '6'
        ]);
        RoleMenu::create([
            'role_id' => '1',
            'menu_id' => '7'
        ]);
    }
}
