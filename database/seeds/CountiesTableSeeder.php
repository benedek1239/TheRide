<?php

use Illuminate\Database\Seeder;

class CountiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('counties')->delete();
        
        \DB::table('counties')->insert(array (
            0 => 
            array (
                'id' => 1,
                'country_id' => 96,
                'name_hu' => 'Somogy',
                'name_ro' => '',
                'name_en' => '',
            ),
            1 => 
            array (
                'id' => 2,
                'country_id' => 96,
                'name_hu' => 'Baranya',
                'name_ro' => '',
                'name_en' => '',
            ),
            2 => 
            array (
                'id' => 3,
                'country_id' => 96,
                'name_hu' => 'Zala',
                'name_ro' => '',
                'name_en' => '',
            ),
            3 => 
            array (
                'id' => 4,
                'country_id' => 96,
                'name_hu' => 'Tolna',
                'name_ro' => '',
                'name_en' => '',
            ),
            4 => 
            array (
                'id' => 5,
                'country_id' => 96,
                'name_hu' => 'Veszprém',
                'name_ro' => '',
                'name_en' => '',
            ),
            5 => 
            array (
                'id' => 6,
                'country_id' => 96,
                'name_hu' => 'Győr-Moson-Sopron',
                'name_ro' => '',
                'name_en' => '',
            ),
            6 => 
            array (
                'id' => 7,
                'country_id' => 96,
                'name_hu' => 'Vas',
                'name_ro' => '',
                'name_en' => '',
            ),
            7 => 
            array (
                'id' => 8,
                'country_id' => 96,
                'name_hu' => 'Jász-Nagykun-Szolnok',
                'name_ro' => '',
                'name_en' => '',
            ),
            8 => 
            array (
                'id' => 9,
                'country_id' => 96,
                'name_hu' => 'Heves',
                'name_ro' => '',
                'name_en' => '',
            ),
            9 => 
            array (
                'id' => 10,
                'country_id' => 96,
                'name_hu' => 'Borsod-Abaúj-Zemplén',
                'name_ro' => '',
                'name_en' => '',
            ),
            10 => 
            array (
                'id' => 11,
                'country_id' => 96,
                'name_hu' => 'Hajdú-Bihar',
                'name_ro' => '',
                'name_en' => '',
            ),
            11 => 
            array (
                'id' => 12,
                'country_id' => 96,
                'name_hu' => 'Komárom-Esztergom',
                'name_ro' => '',
                'name_en' => '',
            ),
            12 => 
            array (
                'id' => 13,
                'country_id' => 96,
                'name_hu' => 'Csongrád',
                'name_ro' => '',
                'name_en' => '',
            ),
            13 => 
            array (
                'id' => 14,
                'country_id' => 96,
                'name_hu' => 'Békés',
                'name_ro' => '',
                'name_en' => '',
            ),
            14 => 
            array (
                'id' => 15,
                'country_id' => 96,
                'name_hu' => 'Pest',
                'name_ro' => '',
                'name_en' => '',
            ),
            15 => 
            array (
                'id' => 16,
                'country_id' => 96,
                'name_hu' => 'Bács-Kiskun',
                'name_ro' => '',
                'name_en' => '',
            ),
            16 => 
            array (
                'id' => 17,
                'country_id' => 96,
                'name_hu' => 'Szabolcs-Szatmár-Bereg',
                'name_ro' => '',
                'name_en' => '',
            ),
            17 => 
            array (
                'id' => 18,
                'country_id' => 96,
                'name_hu' => 'Fejér',
                'name_ro' => '',
                'name_en' => '',
            ),
            18 => 
            array (
                'id' => 20,
                'country_id' => 96,
                'name_hu' => 'Nógrád',
                'name_ro' => '',
                'name_en' => '',
            ),
            19 => 
            array (
                'id' => 21,
                'country_id' => 179,
                'name_hu' => 'Arad',
                'name_ro' => 'Arad',
                'name_en' => '',
            ),
            20 => 
            array (
                'id' => 22,
                'country_id' => 179,
                'name_hu' => 'Maros',
                'name_ro' => 'Mureș',
                'name_en' => '',
            ),
            21 => 
            array (
                'id' => 23,
                'country_id' => 179,
                'name_hu' => 'Hunyad',
                'name_ro' => 'Hunedoara',
                'name_en' => '',
            ),
            22 => 
            array (
                'id' => 24,
                'country_id' => 179,
                'name_hu' => 'Brăila',
                'name_ro' => 'Brăila',
                'name_en' => '',
            ),
            23 => 
            array (
                'id' => 25,
                'country_id' => 179,
                'name_hu' => 'Vrancea',
                'name_ro' => 'Vrancea',
                'name_en' => '',
            ),
            24 => 
            array (
                'id' => 26,
                'country_id' => 179,
                'name_hu' => 'Temes',
                'name_ro' => 'Timiș',
                'name_en' => '',
            ),
            25 => 
            array (
                'id' => 27,
                'country_id' => 179,
                'name_hu' => 'Kolozs',
                'name_ro' => 'Cluj',
                'name_en' => '',
            ),
            26 => 
            array (
                'id' => 28,
                'country_id' => 179,
                'name_hu' => 'Krassó-Szörény',
                'name_ro' => 'Caraș-Severin',
                'name_en' => '',
            ),
            27 => 
            array (
                'id' => 29,
                'country_id' => 179,
                'name_hu' => 'Szatmár',
                'name_ro' => 'Satu Mare',
                'name_en' => '',
            ),
            28 => 
            array (
                'id' => 30,
                'country_id' => 179,
                'name_hu' => 'Brassó',
                'name_ro' => 'Brașov',
                'name_en' => '',
            ),
            29 => 
            array (
                'id' => 31,
                'country_id' => 179,
                'name_hu' => 'Prahova',
                'name_ro' => 'Prahova',
                'name_en' => '',
            ),
            30 => 
            array (
                'id' => 32,
                'country_id' => 179,
                'name_hu' => 'Buzău',
                'name_ro' => 'Buzău',
                'name_en' => '',
            ),
            31 => 
            array (
                'id' => 33,
                'country_id' => 179,
                'name_hu' => 'Bukarest',
                'name_ro' => 'București',
                'name_en' => '',
            ),
            32 => 
            array (
                'id' => 34,
                'country_id' => 179,
                'name_hu' => 'Ialomița',
                'name_ro' => 'Ialomița',
                'name_en' => '',
            ),
            33 => 
            array (
                'id' => 35,
                'country_id' => 179,
                'name_hu' => 'Galați',
                'name_ro' => 'Galați',
                'name_en' => '',
            ),
            34 => 
            array (
                'id' => 36,
                'country_id' => 179,
                'name_hu' => 'Suceava',
                'name_ro' => 'Suceava',
                'name_en' => '',
            ),
            35 => 
            array (
                'id' => 37,
                'country_id' => 179,
                'name_hu' => 'Constanța',
                'name_ro' => 'Constanța',
                'name_en' => '',
            ),
            36 => 
            array (
                'id' => 38,
                'country_id' => 179,
                'name_hu' => 'Tulcea',
                'name_ro' => 'Tulcea',
                'name_en' => '',
            ),
            37 => 
            array (
                'id' => 39,
                'country_id' => 179,
                'name_hu' => 'Fehér',
                'name_ro' => 'Alba',
                'name_en' => '',
            ),
            38 => 
            array (
                'id' => 40,
                'country_id' => 179,
                'name_hu' => 'Szeben',
                'name_ro' => 'Sibiu',
                'name_en' => '',
            ),
            39 => 
            array (
                'id' => 41,
                'country_id' => 179,
                'name_hu' => 'Dâmbovița',
                'name_ro' => 'Dâmbovița',
                'name_en' => '',
            ),
            40 => 
            array (
                'id' => 42,
                'country_id' => 179,
                'name_hu' => 'Giurgiu',
                'name_ro' => 'Giurgiu',
                'name_en' => '',
            ),
            41 => 
            array (
                'id' => 43,
                'country_id' => 179,
                'name_hu' => 'Bihar',
                'name_ro' => 'Bihor',
                'name_en' => '',
            ),
            42 => 
            array (
                'id' => 44,
                'country_id' => 179,
                'name_hu' => 'Hargita',
                'name_ro' => 'Harghita',
                'name_en' => '',
            ),
            43 => 
            array (
                'id' => 45,
                'country_id' => 179,
                'name_hu' => 'Mehedinți',
                'name_ro' => 'Mehedinți',
                'name_en' => '',
            ),
            44 => 
            array (
                'id' => 46,
                'country_id' => 179,
                'name_hu' => '	Argeș',
                'name_ro' => 'Argeș',
                'name_en' => '',
            ),
            45 => 
            array (
                'id' => 47,
                'country_id' => 179,
                'name_hu' => 'Máramaros',
                'name_ro' => 'Maramureș',
                'name_en' => '',
            ),
            46 => 
            array (
                'id' => 48,
                'country_id' => 179,
                'name_hu' => 'Beszterce-Naszód',
                'name_ro' => 'Bistrița-Năsăud',
                'name_en' => '',
            ),
            47 => 
            array (
                'id' => 49,
                'country_id' => 179,
                'name_hu' => 'Kovászna',
                'name_ro' => 'Covasna',
                'name_en' => '',
            ),
            48 => 
            array (
                'id' => 50,
                'country_id' => 179,
                'name_hu' => 'Bákó',
                'name_ro' => 'Bacău',
                'name_en' => '',
            ),
            49 => 
            array (
                'id' => 51,
                'country_id' => 179,
                'name_hu' => 'Neamț',
                'name_ro' => 'Neamț',
                'name_en' => '',
            ),
            50 => 
            array (
                'id' => 52,
                'country_id' => 179,
                'name_hu' => 'Iași',
                'name_ro' => 'Iași',
                'name_en' => '',
            ),
            51 => 
            array (
                'id' => 53,
                'country_id' => 179,
                'name_hu' => 'Szilágy',
                'name_ro' => 'Sălaj',
                'name_en' => '',
            ),
            52 => 
            array (
                'id' => 54,
                'country_id' => 179,
                'name_hu' => 'Dolj',
                'name_ro' => 'Dolj',
                'name_en' => '',
            ),
            53 => 
            array (
                'id' => 55,
                'country_id' => 179,
                'name_hu' => 'Teleorman',
                'name_ro' => 'Teleorman',
                'name_en' => '',
            ),
            54 => 
            array (
                'id' => 56,
                'country_id' => 179,
                'name_hu' => 'Botoșani',
                'name_ro' => 'Botoșani',
                'name_en' => '',
            ),
            55 => 
            array (
                'id' => 57,
                'country_id' => 179,
                'name_hu' => 'Vâlcea',
                'name_ro' => 'Vâlcea',
                'name_en' => '',
            ),
            56 => 
            array (
                'id' => 58,
                'country_id' => 179,
                'name_hu' => 'Olt',
                'name_ro' => 'Olt',
                'name_en' => '',
            ),
            57 => 
            array (
                'id' => 59,
                'country_id' => 179,
                'name_hu' => 'Gorj',
                'name_ro' => 'Gorj',
                'name_en' => '',
            ),
            58 => 
            array (
                'id' => 60,
                'country_id' => 179,
                'name_hu' => 'Ilfov',
                'name_ro' => 'Ilfov',
                'name_en' => '',
            ),
            59 => 
            array (
                'id' => 61,
                'country_id' => 179,
                'name_hu' => 'Călărași',
                'name_ro' => 'Călărași',
                'name_en' => '',
            ),
            60 => 
            array (
                'id' => 62,
                'country_id' => 179,
                'name_hu' => 'Vaslui',
                'name_ro' => 'Vaslui',
                'name_en' => '',
            ),
        ));
        
        
    }
}