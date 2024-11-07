<?php

namespace Database\Seeders;

use App\Models\DeliveryAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $DeliveryAddressRecords = [
            [
                'id' => 1,
                'user_id' => 1,
                'name' => 'Huynh Minh Tri',
                'address' => 'Duong So 9,Thon Phu Hai',
                'provinces' => 'Quang Nam',
                'districts' => 'Dai Loc',
                'wards' => 'Dai Hiep',
                'mobile' => '0389052393',
                'status' => 1
            ],
            [
            'id' => 2,
            'user_id' => 2,
            'name' => 'Phan Nguyen Dat',
            'address' => 'Duong So 10,Thon Phu Trung',
            'provinces' => 'Quang Nam',
            'districts' => 'Dai Loc',
            'wards' => 'Dai Quang',
            'mobile' => '0905024232',
            'status' => 1
            ]
        ];
        DeliveryAddress::insert($DeliveryAddressRecords);
    }

}
