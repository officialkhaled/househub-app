<?php

namespace Database\Seeders;

use DB;
use App\Models\Floor;
use App\Models\Building;
use Illuminate\Database\Seeder;

class StarterSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('buildings')->delete();
        DB::table('floors')->delete();
        DB::table('flats')->delete();
        DB::table('utilities')->delete();
        DB::table('monthly_rent_reports')->delete();

        $buildings = [
            [
                'id' => 1,
                'user_id' => 1,
                'name' => 'Nahar Villa',
                'house_number' => '79',
                'address' => 'Kawlar Masjid Road (Shialdanga), Kawlar, Dhaka-1229',
                'total_floors' => 6,
            ],
            [
                'id' => 2,
                'user_id' => 3,
                'name' => 'Mega Mansion',
                'house_number' => '84',
                'address' => 'Sector 3, Road 7, Uttara, Dhaka-1230',
                'total_floors' => 14,
            ],
            [
                'id' => 3,
                'user_id' => 2,
                'name' => 'Aston Villa',
                'house_number' => '104/105',
                'address' => 'Road 11, Banani, Dhaka',
                'total_floors' => 6,
            ],
        ];
        $floors = [
            [
                'id' => 1,
                'building_id' => 1,
                'floor_number' => 1,
            ],
            [
                'id' => 2,
                'building_id' => 1,
                'floor_number' => 2,
            ],
            [
                'id' => 3,
                'building_id' => 2,
                'floor_number' => 5,
            ],
            [
                'id' => 4,
                'building_id' => 2,
                'floor_number' => 6,
            ],
        ];

        Building::insert($buildings);
        Floor::insert($floors);
    }
}
