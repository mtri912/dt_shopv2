<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('123456');
        $adminRecords = [
            ['id'=>1,'name'=>'Admin','type'=>'admin','mobile'=>123456789,'email'=>'admin@admin.com','password'=>$password,'image'=>'','status'=>1],
        ];

        Admin::insert($adminRecords);
    }
}
