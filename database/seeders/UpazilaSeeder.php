<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpazilaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $upazilas = [
            // Dhaka Division
            ['name' => 'Dhamrai', 'district_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Savar', 'district_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gazipur Sadar', 'district_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kapasia', 'district_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Manikganj Sadar', 'district_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Singair', 'district_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Narayanganj Sadar', 'district_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sonargaon', 'district_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tangail Sadar', 'district_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Madhupur', 'district_id' => 5, 'created_at' => now(), 'updated_at' => now()],

            // Chattogram Division
            ['name' => 'Chattogram Sadar', 'district_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hathazari', 'district_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cox\'s Bazar Sadar', 'district_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Teknaf', 'district_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cumilla Sadar', 'district_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Debidwar', 'district_id' => 8, 'created_at' => now(), 'updated_at' => now()],

            // Rajshahi Division
            ['name' => 'Rajshahi Sadar', 'district_id' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Paba', 'district_id' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pabna Sadar', 'district_id' => 11, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ishwardi', 'district_id' => 11, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Natore Sadar', 'district_id' => 12, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Baraigram', 'district_id' => 12, 'created_at' => now(), 'updated_at' => now()],

            // Khulna Division
            ['name' => 'Khulna Sadar', 'district_id' => 13, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Paikgachha', 'district_id' => 13, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jessore Sadar', 'district_id' => 14, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jhikargacha', 'district_id' => 14, 'created_at' => now(), 'updated_at' => now()],

            // Barishal Division
            ['name' => 'Barishal Sadar', 'district_id' => 15, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Babuganj', 'district_id' => 15, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Patuakhali Sadar', 'district_id' => 16, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Galachipa', 'district_id' => 16, 'created_at' => now(), 'updated_at' => now()],

            // Sylhet Division
            ['name' => 'Sylhet Sadar', 'district_id' => 17, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Beanibazar', 'district_id' => 17, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Habiganj Sadar', 'district_id' => 18, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Madhabpur', 'district_id' => 18, 'created_at' => now(), 'updated_at' => now()],

            // Rangpur Division
            ['name' => 'Rangpur Sadar', 'district_id' => 19, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pirganj', 'district_id' => 19, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dinajpur Sadar', 'district_id' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Birganj', 'district_id' => 20, 'created_at' => now(), 'updated_at' => now()],

            // Mymensingh Division
            ['name' => 'Mymensingh Sadar', 'district_id' => 21, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Muktagachha', 'district_id' => 21, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jamalpur Sadar', 'district_id' => 22, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dewanganj', 'district_id' => 22, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('upazilas')->insert($upazilas);
    }
}
