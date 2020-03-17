<?php

use Illuminate\Database\Seeder;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use App\Provinsi;
use App\City;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftarProvinsi = RajaOngkir::provinsi()->all();
        foreach ($daftarProvinsi as $provinsiRow) {
            Provinsi::create([
                'provinsi_id' => $provinsiRow['province_id'],
                'title' => $provinsiRow['province']
            ]);
            $daftarKota = RajaOngkir::kota()->dariProvinsi($provinsiRow['province_id'])->get();
            foreach ($daftarKota as $kotaRow) {
                City::create([
                    'provinsi_id' => $provinsiRow['province_id'],
                    'city_id' => $kotaRow['city_id'],
                    'title' => $kotaRow['city_name']
                ]);
            }
        }
    }
}
