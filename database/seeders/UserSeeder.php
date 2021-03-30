<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'type'=>'Admin',
            'employee_id' =>'EMP'.time(),
            'department_id'=>1,
            'designation_id'=>1,
            'name'=>'Monika Kundu',
            'contact_number'=>'01987654321',
            'email' =>'mk@gmail.com',
            'password' => bcrypt('12345678'),
            'status'=>'Active',
        ]);
    }
}
