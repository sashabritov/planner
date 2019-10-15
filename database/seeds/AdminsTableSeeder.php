<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create(['fullName' => 'qweqwe', 
            'email' => 'qwe@qwe.qwe', 
            'password' => bcrypt('qweqwe'), 
            'permission_id' => 0,
            'position_id' => 0
        ]);
    }
}
