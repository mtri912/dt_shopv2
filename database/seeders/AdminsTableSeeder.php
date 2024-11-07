<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('123456');
        $adminRecords = [
            ['id'=>2,'name'=>'Amit','type'=>'subadmin','mobile'=>123476789,'email'=>'subadmin@admin.com','password'=>$password,'image'=>'','status'=>1],
            ['id'=>3,'name'=>'Jonh','type'=>'subadmin','mobile'=>123468889,'email'=>'john@admin.com','password'=>$password,'image'=>'','status'=>1],
        ];

        Admin::insert($adminRecords);

    }
}
