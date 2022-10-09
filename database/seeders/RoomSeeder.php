<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;


class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create( [
            "id" => 1,
            "uid"=> "ref01",
            "id_owner" => 1,
            "name" => "salle 1",
            "openingDate" => "2022-05-01",
            "closingDate" => "2022-06-05",
            "suspension" => false,
            "type" => "C02",
        ]);
            
    }
}
