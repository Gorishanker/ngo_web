<?php

namespace Database\Seeders;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =  [
            'name'=>'NGO',
            'email'=>'admin@gmail.com',
            'mobile_no'=>'7689864687',
            'is_active'=>'1',
            'password'=> Hash::make('Admin@123'),
            'created_at'=> Carbon::now()
        ];
        Admin::create($data);
    }
}
