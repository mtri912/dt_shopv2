<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $couponRecords = [
            [
                'id' => 1,
                'coupon_option' => 'Manual',
                'coupon_code' => 'test10',
                'categories' => '7,8,9,10,11',
                'brands' => '1,2',
                'users' => '1',
                'coupon_type' => 'Single',
                'amount_type' => 'Percentage',
                'amount' => '10',
                'expiry_date' => '2024-12-31',
                'status' => 1
            ],
            [
                'id' => 2,
                'coupon_option' => 'Manual',
                'coupon_code' => 'test20',
                'categories' => '7,8,9,10,11',
                'brands' => '1,2',
                'users' => 'amit100@yopmail.com',
                'coupon_type' => 'Single',
                'amount_type' => 'Percentage',
                'amount' => '20',
                'expiry_date' => '2024-12-31',
                'status' => 1
            ],
            [
                'id' => 3,
                'coupon_option' => 'Automatic',
                'coupon_code' => 'h25lafsf',
                'categories' => '7,8,9,10,11',
                'brands' => '1,2',
                'users' => '1',
                'coupon_type' => 'Multiple',
                'amount_type' => 'Fixed',
                'amount' => '100',
                'expiry_date' => '2024-12-31',
                'status' => 1
            ],
        ];

        Coupon::insert($couponRecords);

    }
}
