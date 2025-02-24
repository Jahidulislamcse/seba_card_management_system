<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('districts')->insert([
            // Division: Barishal
            ['id' => 1, 'division_id' => 1, 'name' => 'Barguna', 'bn_name' => 'বরগুনা'],
            ['id' => 2, 'division_id' => 1, 'name' => 'Barishal', 'bn_name' => 'বরিশাল'],
            ['id' => 3, 'division_id' => 1, 'name' => 'Bhola', 'bn_name' => 'ভোলা'],
            ['id' => 4, 'division_id' => 1, 'name' => 'Jhalokati', 'bn_name' => 'ঝালকাঠি'],
            ['id' => 5, 'division_id' => 1, 'name' => 'Patuakhali', 'bn_name' => 'পটুয়াখালী'],
            ['id' => 6, 'division_id' => 1, 'name' => 'Pirojpur', 'bn_name' => 'পিরোজপুর'],

            // Division: Chattogram
            ['id' => 7, 'division_id' => 2, 'name' => 'Bandarban', 'bn_name' => 'বান্দরবান'],
            ['id' => 8, 'division_id' => 2, 'name' => 'Brahmanbaria', 'bn_name' => 'ব্রাহ্মণবাড়িয়া'],
            ['id' => 9, 'division_id' => 2, 'name' => 'Chandpur', 'bn_name' => 'চাঁদপুর'],
            ['id' => 10, 'division_id' => 2, 'name' => 'Chattogram', 'bn_name' => 'চট্টগ্রাম'],
            ['id' => 11, 'division_id' => 2, 'name' => 'Coxsbazar', 'bn_name' => 'কক্সবাজার'],
            ['id' => 12, 'division_id' => 2, 'name' => 'Cumilla', 'bn_name' => 'কুমিল্লা'],
            ['id' => 13, 'division_id' => 2, 'name' => 'Feni', 'bn_name' => 'ফেনী'],
            ['id' => 14, 'division_id' => 2, 'name' => 'Khagrachhari', 'bn_name' => 'খাগড়াছড়ি'],
            ['id' => 15, 'division_id' => 2, 'name' => 'Lakshmipur', 'bn_name' => 'লক্ষ্মীপুর'],
            ['id' => 16, 'division_id' => 2, 'name' => 'Noakhali', 'bn_name' => 'নোয়াখালী'],
            ['id' => 17, 'division_id' => 2, 'name' => 'Rangamati', 'bn_name' => 'রাঙ্গামাটি'],

            // Division: Dhaka
            ['id' => 18, 'division_id' => 3, 'name' => 'Dhaka', 'bn_name' => 'ঢাকা'],
            ['id' => 19, 'division_id' => 3, 'name' => 'Faridpur', 'bn_name' => 'ফরিদপুর'],
            ['id' => 20, 'division_id' => 3, 'name' => 'Gazipur', 'bn_name' => 'গাজীপুর'],
            ['id' => 21, 'division_id' => 3, 'name' => 'Gopalganj', 'bn_name' => 'গোপালগঞ্জ'],
            ['id' => 22, 'division_id' => 3, 'name' => 'Kishoreganj', 'bn_name' => 'কিশোরগঞ্জ'],
            ['id' => 23, 'division_id' => 3, 'name' => 'Madaripur', 'bn_name' => 'মাদারীপুর'],
            ['id' => 24, 'division_id' => 3, 'name' => 'Manikganj', 'bn_name' => 'মানিকগঞ্জ'],
            ['id' => 25, 'division_id' => 3, 'name' => 'Munshiganj', 'bn_name' => 'মুন্সিগঞ্জ'],
            ['id' => 26, 'division_id' => 3, 'name' => 'Narayanganj', 'bn_name' => 'নারায়ণগঞ্জ'],
            ['id' => 27, 'division_id' => 3, 'name' => 'Narsingdi', 'bn_name' => 'নরসিংদী'],
            ['id' => 28, 'division_id' => 3, 'name' => 'Rajbari', 'bn_name' => 'রাজবাড়ী'],
            ['id' => 29, 'division_id' => 3, 'name' => 'Shariatpur', 'bn_name' => 'শরীয়তপুর'],
            ['id' => 30, 'division_id' => 3, 'name' => 'Tangail', 'bn_name' => 'টাঙ্গাইল'],

            // Division: Khulna
            ['id' => 31, 'division_id' => 4, 'name' => 'Bagerhat', 'bn_name' => 'বাগেরহাট'],
            ['id' => 32, 'division_id' => 4, 'name' => 'Chuadanga', 'bn_name' => 'চুয়াডাঙ্গা'],
            ['id' => 33, 'division_id' => 4, 'name' => 'Jashore', 'bn_name' => 'যশোর'],
            ['id' => 34, 'division_id' => 4, 'name' => 'Jhenaidah', 'bn_name' => 'ঝিনাইদহ'],
            ['id' => 35, 'division_id' => 4, 'name' => 'Khulna', 'bn_name' => 'খুলনা'],
            ['id' => 36, 'division_id' => 4, 'name' => 'Kushtia', 'bn_name' => 'কুষ্টিয়া'],
            ['id' => 37, 'division_id' => 4, 'name' => 'Magura', 'bn_name' => 'মাগুরা'],
            ['id' => 38, 'division_id' => 4, 'name' => 'Meherpur', 'bn_name' => 'মেহেরপুর'],
            ['id' => 39, 'division_id' => 4, 'name' => 'Narail', 'bn_name' => 'নড়াইল'],
            ['id' => 40, 'division_id' => 4, 'name' => 'Satkhira', 'bn_name' => 'সাতক্ষীরা'],
        ]);
    }
}
