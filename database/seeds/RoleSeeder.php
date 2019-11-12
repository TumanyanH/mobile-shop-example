<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            //1
            [
                'role' => 'admin',
            ],
            //2
            [
                'role' => 'editor',
            ],
            //3
            [
                'role' => 'viewer',
            ],
            //4
            [
                'role' => 'user',
            ],
        ]);
    }
}
