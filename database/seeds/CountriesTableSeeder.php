<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('countries')->delete();
        
        \DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'country_code' => 'AF',
                'name_hu' => 'Afganisztán',
                'name_ro' => 'Afganistan',
                'name_en' => 'Afghanistan',
            ),
            1 => 
            array (
                'id' => 2,
                'country_code' => 'AL',
                'name_hu' => 'Albánia',
                'name_ro' => 'Albania',
                'name_en' => 'Albania',
            ),
            2 => 
            array (
                'id' => 3,
                'country_code' => 'DZ',
                'name_hu' => 'Algéria',
                'name_ro' => 'Algeria',
                'name_en' => 'Algeria',
            ),
            3 => 
            array (
                'id' => 4,
                'country_code' => 'AD',
                'name_hu' => 'Andorra',
                'name_ro' => 'Andorra',
                'name_en' => 'Andorra',
            ),
            4 => 
            array (
                'id' => 5,
                'country_code' => 'AO',
                'name_hu' => 'Angola',
                'name_ro' => 'Angola',
                'name_en' => 'Angola',
            ),
            5 => 
            array (
                'id' => 6,
                'country_code' => 'AI',
                'name_hu' => 'Anguilla',
                'name_ro' => 'Anguilla',
                'name_en' => 'Anguilla',
            ),
            6 => 
            array (
                'id' => 7,
                'country_code' => 'AQ',
                'name_hu' => 'Antarktika',
                'name_ro' => 'Antarctica',
                'name_en' => 'Antarctica',
            ),
            7 => 
            array (
                'id' => 8,
                'country_code' => 'AG',
                'name_hu' => 'Antigua és Barbuda',
                'name_ro' => 'Antigua și Barbuda',
                'name_en' => 'Antigua and Barbuda',
            ),
            8 => 
            array (
                'id' => 9,
                'country_code' => 'AR',
                'name_hu' => 'Argentína',
                'name_ro' => 'Argentina',
                'name_en' => 'Argentina',
            ),
            9 => 
            array (
                'id' => 10,
                'country_code' => 'AM',
                'name_hu' => 'Örményország',
                'name_ro' => 'Armenia',
                'name_en' => 'Armenia',
            ),
            10 => 
            array (
                'id' => 11,
                'country_code' => 'AW',
                'name_hu' => 'Aruba',
                'name_ro' => 'Aruba',
                'name_en' => 'Aruba',
            ),
            11 => 
            array (
                'id' => 12,
                'country_code' => 'AU',
                'name_hu' => 'Ausztrália',
                'name_ro' => 'Australia',
                'name_en' => 'Australia',
            ),
            12 => 
            array (
                'id' => 13,
                'country_code' => 'AT',
                'name_hu' => 'Ausztria',
                'name_ro' => 'Austria',
                'name_en' => 'Austria',
            ),
            13 => 
            array (
                'id' => 14,
                'country_code' => 'AZ',
                'name_hu' => 'Azerbajdzsán',
                'name_ro' => 'Azerbaidjan',
                'name_en' => 'Azerbaijan',
            ),
            14 => 
            array (
                'id' => 15,
                'country_code' => 'BS',
                'name_hu' => 'Bahama-szigetek',
                'name_ro' => 'Bahamas',
                'name_en' => 'Bahamas',
            ),
            15 => 
            array (
                'id' => 16,
                'country_code' => 'BH',
                'name_hu' => 'Bahrein',
                'name_ro' => 'Bahrain',
                'name_en' => 'Bahrain',
            ),
            16 => 
            array (
                'id' => 17,
                'country_code' => 'BD',
                'name_hu' => 'Banglades',
                'name_ro' => 'Bangladesh',
                'name_en' => 'Bangladesh',
            ),
            17 => 
            array (
                'id' => 18,
                'country_code' => 'BB',
                'name_hu' => 'Barbados',
                'name_ro' => 'Barbados',
                'name_en' => 'Barbados',
            ),
            18 => 
            array (
                'id' => 19,
                'country_code' => 'BY',
                'name_hu' => 'Fehéroroszország',
                'name_ro' => 'Belarus',
                'name_en' => 'Belarus',
            ),
            19 => 
            array (
                'id' => 20,
                'country_code' => 'BE',
                'name_hu' => 'Belgium',
                'name_ro' => 'Belgia',
                'name_en' => 'Belgium',
            ),
            20 => 
            array (
                'id' => 21,
                'country_code' => 'BZ',
                'name_hu' => 'Belize',
                'name_ro' => 'Belize',
                'name_en' => 'Belize',
            ),
            21 => 
            array (
                'id' => 22,
                'country_code' => 'BJ',
                'name_hu' => 'Benin',
                'name_ro' => 'Benin',
                'name_en' => 'Benin',
            ),
            22 => 
            array (
                'id' => 23,
                'country_code' => 'BM',
                'name_hu' => 'Bermuda',
                'name_ro' => 'Bermuda',
                'name_en' => 'Bermuda',
            ),
            23 => 
            array (
                'id' => 24,
                'country_code' => 'BT',
                'name_hu' => 'Bhután',
                'name_ro' => 'Bhutan',
                'name_en' => 'Bhutan',
            ),
            24 => 
            array (
                'id' => 25,
                'country_code' => 'BO',
                'name_hu' => 'Bolívia',
                'name_ro' => 'Bolivia',
                'name_en' => 'Bolivia',
            ),
            25 => 
            array (
                'id' => 26,
                'country_code' => 'BA',
                'name_hu' => 'Bosznia-Hercegovina',
                'name_ro' => 'Bosnia și Herțegovina',
                'name_en' => 'Bosnia and Herzegovina',
            ),
            26 => 
            array (
                'id' => 27,
                'country_code' => 'BW',
                'name_hu' => 'Botswana',
                'name_ro' => 'Botswana',
                'name_en' => 'Botswana',
            ),
            27 => 
            array (
                'id' => 28,
                'country_code' => 'BV',
                'name_hu' => 'Bouvet-sziget',
                'name_ro' => 'Insula Bouvet',
                'name_en' => 'Bouvet Island',
            ),
            28 => 
            array (
                'id' => 29,
                'country_code' => 'BR',
                'name_hu' => 'Brazília',
                'name_ro' => 'Brazilia',
                'name_en' => 'Brazil',
            ),
            29 => 
            array (
                'id' => 30,
                'country_code' => 'IO',
                'name_hu' => 'Brit Indiai-óceáni Terület',
                'name_ro' => 'Teritoriul Britanic din Oceanul Indian',
                'name_en' => 'British Indian Ocean Territory',
            ),
            30 => 
            array (
                'id' => 31,
                'country_code' => 'BN',
                'name_hu' => 'Brunei',
                'name_ro' => 'Brunei',
                'name_en' => 'Brunei Darussalam',
            ),
            31 => 
            array (
                'id' => 32,
                'country_code' => 'BG',
                'name_hu' => 'Bulgária',
                'name_ro' => 'Bulgaria',
                'name_en' => 'Bulgaria',
            ),
            32 => 
            array (
                'id' => 33,
                'country_code' => 'BF',
                'name_hu' => 'Burkina Faso',
                'name_ro' => 'Burkina Faso',
                'name_en' => 'Burkina Faso',
            ),
            33 => 
            array (
                'id' => 34,
                'country_code' => 'BI',
                'name_hu' => 'Burundi',
                'name_ro' => 'Burundi',
                'name_en' => 'Burundi',
            ),
            34 => 
            array (
                'id' => 35,
                'country_code' => 'KH',
                'name_hu' => 'Kambodzsa',
                'name_ro' => 'Cambodgia',
                'name_en' => 'Cambodia',
            ),
            35 => 
            array (
                'id' => 36,
                'country_code' => 'CM',
                'name_hu' => 'Kamerun',
                'name_ro' => 'Camerun',
                'name_en' => 'Cameroon',
            ),
            36 => 
            array (
                'id' => 37,
                'country_code' => 'CA',
                'name_hu' => 'Kanada',
                'name_ro' => 'Canada',
                'name_en' => 'Canada',
            ),
            37 => 
            array (
                'id' => 38,
                'country_code' => 'CV',
                'name_hu' => 'Zöld-foki Köztársaság',
                'name_ro' => 'Capul Verde',
                'name_en' => 'Cape Verde',
            ),
            38 => 
            array (
                'id' => 39,
                'country_code' => 'KY',
                'name_hu' => 'Kajmán-szigetek',
                'name_ro' => 'Insulele Cayman',
                'name_en' => 'Cayman Islands',
            ),
            39 => 
            array (
                'id' => 40,
                'country_code' => 'CF',
                'name_hu' => 'Közép-afrikai Köztársaság',
                'name_ro' => 'Republica Centrafricană',
                'name_en' => 'Central African Republic',
            ),
            40 => 
            array (
                'id' => 41,
                'country_code' => 'TD',
                'name_hu' => 'Csád',
                'name_ro' => 'Ciad',
                'name_en' => 'Chad',
            ),
            41 => 
            array (
                'id' => 42,
                'country_code' => 'CL',
                'name_hu' => 'Chile',
                'name_ro' => 'Chile',
                'name_en' => 'Chile',
            ),
            42 => 
            array (
                'id' => 43,
                'country_code' => 'CN',
                'name_hu' => 'Kína',
                'name_ro' => 'Republica Populară Chineză',
                'name_en' => 'China',
            ),
            43 => 
            array (
                'id' => 44,
                'country_code' => 'CX',
                'name_hu' => 'Karácsony-sziget',
                'name_ro' => 'Insula Crăciunului',
                'name_en' => 'Christmas Island',
            ),
            44 => 
            array (
                'id' => 45,
                'country_code' => 'CC',
                'name_hu' => 'Kókusz-sziget',
                'name_ro' => 'Insulele Cocos',
            'name_en' => 'Cocos (Keeling) Islands',
            ),
            45 => 
            array (
                'id' => 46,
                'country_code' => 'CO',
                'name_hu' => 'Kolumbia',
                'name_ro' => 'Columbia',
                'name_en' => 'Colombia',
            ),
            46 => 
            array (
                'id' => 47,
                'country_code' => 'KM',
                'name_hu' => 'Comore-szigetek',
                'name_ro' => 'Comore',
                'name_en' => 'Comoros',
            ),
            47 => 
            array (
                'id' => 48,
                'country_code' => 'CD',
                'name_hu' => 'Kongói Demokratikus Köztársaság',
                'name_ro' => 'Afganisztán',
                'name_en' => 'Democratic Republic of the Congo',
            ),
            48 => 
            array (
                'id' => 49,
                'country_code' => 'CG',
                'name_hu' => 'Kongói Köztársaság',
                'name_ro' => 'Republica Congo',
                'name_en' => 'Republic of Congo',
            ),
            49 => 
            array (
                'id' => 50,
                'country_code' => 'CK',
                'name_hu' => 'Cook-szigetek',
                'name_ro' => 'Insulele Cook',
                'name_en' => 'Cook Islands',
            ),
            50 => 
            array (
                'id' => 51,
                'country_code' => 'CR',
                'name_hu' => 'Costa Rica',
                'name_ro' => 'Costa Rica',
                'name_en' => 'Costa Rica',
            ),
            51 => 
            array (
                'id' => 52,
                'country_code' => 'HR',
                'name_hu' => 'Horvátország',
                'name_ro' => 'Croația',
            'name_en' => 'Croatia (Hrvatska)',
            ),
            52 => 
            array (
                'id' => 53,
                'country_code' => 'CU',
                'name_hu' => 'Kuba',
                'name_ro' => 'Cuba',
                'name_en' => 'Cuba',
            ),
            53 => 
            array (
                'id' => 54,
                'country_code' => 'CY',
                'name_hu' => 'Ciprus',
                'name_ro' => 'Cipru',
                'name_en' => 'Cyprus',
            ),
            54 => 
            array (
                'id' => 55,
                'country_code' => 'CZ',
                'name_hu' => 'Csehország',
                'name_ro' => 'Cehia',
                'name_en' => 'Czech Republic',
            ),
            55 => 
            array (
                'id' => 56,
                'country_code' => 'DK',
                'name_hu' => 'Dánia',
                'name_ro' => 'Danemarca',
                'name_en' => 'Denmark',
            ),
            56 => 
            array (
                'id' => 57,
                'country_code' => 'DJ',
                'name_hu' => 'Dzsibuti',
                'name_ro' => 'Djibouti',
                'name_en' => 'Djibouti',
            ),
            57 => 
            array (
                'id' => 58,
                'country_code' => 'DM',
                'name_hu' => 'Dominikai Közösség',
                'name_ro' => 'Dominica',
                'name_en' => 'Dominica',
            ),
            58 => 
            array (
                'id' => 59,
                'country_code' => 'DO',
                'name_hu' => 'Dominikai Köztársaság',
                'name_ro' => 'Republica Dominicană',
                'name_en' => 'Dominican Republic',
            ),
            59 => 
            array (
                'id' => 60,
                'country_code' => 'TP',
                'name_hu' => 'Kelet-Timor',
                'name_ro' => 'Timorul de Est',
                'name_en' => 'East Timor',
            ),
            60 => 
            array (
                'id' => 61,
                'country_code' => 'EC',
                'name_hu' => 'Ecuador',
                'name_ro' => 'Ecuador',
                'name_en' => 'Ecuador',
            ),
            61 => 
            array (
                'id' => 62,
                'country_code' => 'EG',
                'name_hu' => 'Egyiptom',
                'name_ro' => 'Egipt',
                'name_en' => 'Egypt',
            ),
            62 => 
            array (
                'id' => 63,
                'country_code' => 'SV',
                'name_hu' => 'Salvador',
                'name_ro' => 'El Salvador',
                'name_en' => 'El Salvador',
            ),
            63 => 
            array (
                'id' => 64,
                'country_code' => 'GQ',
                'name_hu' => 'Egyenlítői-Guinea',
                'name_ro' => 'Guineea Ecuatorială',
                'name_en' => 'Equatorial Guinea',
            ),
            64 => 
            array (
                'id' => 65,
                'country_code' => 'ER',
                'name_hu' => 'Eritrea',
                'name_ro' => 'Eritreea',
                'name_en' => 'Eritrea',
            ),
            65 => 
            array (
                'id' => 66,
                'country_code' => 'EE',
                'name_hu' => 'Észtország',
                'name_ro' => 'Estonia',
                'name_en' => 'Estonia',
            ),
            66 => 
            array (
                'id' => 67,
                'country_code' => 'ET',
                'name_hu' => 'Etiópia',
                'name_ro' => 'Etiopia',
                'name_en' => 'Ethiopia',
            ),
            67 => 
            array (
                'id' => 68,
                'country_code' => 'FK',
                'name_hu' => 'Falkland-szigetek',
                'name_ro' => 'Insulele Falkland',
            'name_en' => 'Falkland Islands (Malvinas)',
            ),
            68 => 
            array (
                'id' => 69,
                'country_code' => 'FO',
                'name_hu' => 'Feröer-szigetek',
                'name_ro' => 'Insulele Feroe',
                'name_en' => 'Faroe Islands',
            ),
            69 => 
            array (
                'id' => 70,
                'country_code' => 'FJ',
                'name_hu' => 'Fidzsi-szigetek',
                'name_ro' => 'Republica Insulelor Fiji',
                'name_en' => 'Fiji',
            ),
            70 => 
            array (
                'id' => 71,
                'country_code' => 'FI',
                'name_hu' => 'Finnország',
                'name_ro' => 'Finlanda',
                'name_en' => 'Finland',
            ),
            71 => 
            array (
                'id' => 72,
                'country_code' => 'FR',
                'name_hu' => 'Franciaország',
                'name_ro' => 'Franța',
                'name_en' => 'France',
            ),
            72 => 
            array (
                'id' => 73,
                'country_code' => 'GF',
                'name_hu' => 'Francia Guyana',
                'name_ro' => 'Guyana Franceză',
                'name_en' => 'French Guiana',
            ),
            73 => 
            array (
                'id' => 74,
                'country_code' => 'PF',
                'name_hu' => 'Francia Polinézia',
                'name_ro' => 'Polinezia Franceză',
                'name_en' => 'French Polynesia',
            ),
            74 => 
            array (
                'id' => 75,
                'country_code' => 'TF',
                'name_hu' => 'Francia déli és antarktiszi területek',
                'name_ro' => 'Teritoriile australe și antarctice franceze',
                'name_en' => 'French Southern and Antarctic Lands',
            ),
            75 => 
            array (
                'id' => 76,
                'country_code' => 'GA',
                'name_hu' => 'Gabon',
                'name_ro' => 'Gabon',
                'name_en' => 'Gabon',
            ),
            76 => 
            array (
                'id' => 77,
                'country_code' => 'GM',
                'name_hu' => 'Gambia',
                'name_ro' => 'Gambia',
                'name_en' => 'Gambia',
            ),
            77 => 
            array (
                'id' => 78,
                'country_code' => 'GE',
                'name_hu' => 'Grúzia',
                'name_ro' => 'Georgia',
                'name_en' => 'Georgia',
            ),
            78 => 
            array (
                'id' => 79,
                'country_code' => 'DE',
                'name_hu' => 'Németország',
                'name_ro' => 'Germania',
                'name_en' => 'Germany',
            ),
            79 => 
            array (
                'id' => 80,
                'country_code' => 'GH',
                'name_hu' => 'Ghána',
                'name_ro' => 'Ghana',
                'name_en' => 'Ghana',
            ),
            80 => 
            array (
                'id' => 81,
                'country_code' => 'GI',
                'name_hu' => 'Gibraltár',
                'name_ro' => 'Gibraltar',
                'name_en' => 'Gibraltar',
            ),
            81 => 
            array (
                'id' => 82,
                'country_code' => 'GK',
                'name_hu' => 'Guernsey Bailiffség',
                'name_ro' => 'Guernsey',
                'name_en' => 'Guernsey',
            ),
            82 => 
            array (
                'id' => 83,
                'country_code' => 'GR',
                'name_hu' => 'Görögország',
                'name_ro' => 'Grecia',
                'name_en' => 'Greece',
            ),
            83 => 
            array (
                'id' => 84,
                'country_code' => 'GL',
                'name_hu' => 'Grönland',
                'name_ro' => 'Groenlanda',
                'name_en' => 'Greenland',
            ),
            84 => 
            array (
                'id' => 85,
                'country_code' => 'GD',
                'name_hu' => 'Grenada',
                'name_ro' => 'Grenada',
                'name_en' => 'Grenada',
            ),
            85 => 
            array (
                'id' => 86,
                'country_code' => 'GP',
                'name_hu' => 'Guadeloupe',
                'name_ro' => 'Guadelupa',
                'name_en' => 'Guadeloupe',
            ),
            86 => 
            array (
                'id' => 87,
                'country_code' => 'GU',
                'name_hu' => 'Guam',
                'name_ro' => 'Guam',
                'name_en' => 'Guam',
            ),
            87 => 
            array (
                'id' => 88,
                'country_code' => 'GT',
                'name_hu' => 'Guatemala',
                'name_ro' => 'Guatemala',
                'name_en' => 'Guatemala',
            ),
            88 => 
            array (
                'id' => 89,
                'country_code' => 'GN',
                'name_hu' => 'Guinea',
                'name_ro' => 'Guineea',
                'name_en' => 'Guinea',
            ),
            89 => 
            array (
                'id' => 90,
                'country_code' => 'GW',
                'name_hu' => 'Bissau-Guinea',
                'name_ro' => 'Guineea-Bissau',
                'name_en' => 'Guinea-Bissau',
            ),
            90 => 
            array (
                'id' => 91,
                'country_code' => 'GY',
                'name_hu' => 'Guyana',
                'name_ro' => 'Guyana',
                'name_en' => 'Guyana',
            ),
            91 => 
            array (
                'id' => 92,
                'country_code' => 'HT',
                'name_hu' => 'Haiti',
                'name_ro' => 'Haiti',
                'name_en' => 'Haiti',
            ),
            92 => 
            array (
                'id' => 93,
                'country_code' => 'HM',
                'name_hu' => 'Heard-sziget és McDonald-szigetek',
                'name_ro' => 'Insula Heard și Insulele McDonald',
                'name_en' => 'Heard and Mc Donald Islands',
            ),
            93 => 
            array (
                'id' => 94,
                'country_code' => 'HN',
                'name_hu' => 'Honduras',
                'name_ro' => 'Honduras',
                'name_en' => 'Honduras',
            ),
            94 => 
            array (
                'id' => 95,
                'country_code' => 'HK',
                'name_hu' => 'Hongkong',
                'name_ro' => 'Hong Kong',
                'name_en' => 'Hong Kong',
            ),
            95 => 
            array (
                'id' => 96,
                'country_code' => 'HU',
                'name_hu' => 'Magyarország',
                'name_ro' => 'Ungaria',
                'name_en' => 'Hungary',
            ),
            96 => 
            array (
                'id' => 97,
                'country_code' => 'IS',
                'name_hu' => 'Izland',
                'name_ro' => 'Islanda',
                'name_en' => 'Iceland',
            ),
            97 => 
            array (
                'id' => 98,
                'country_code' => 'IN',
                'name_hu' => 'India',
                'name_ro' => 'India',
                'name_en' => 'India',
            ),
            98 => 
            array (
                'id' => 99,
                'country_code' => 'IM',
                'name_hu' => 'Man',
                'name_ro' => 'Insula Man',
                'name_en' => 'Isle of Man',
            ),
            99 => 
            array (
                'id' => 100,
                'country_code' => 'ID',
                'name_hu' => 'Indonézia',
                'name_ro' => 'Indonezia',
                'name_en' => 'Indonesia',
            ),
            100 => 
            array (
                'id' => 101,
                'country_code' => 'IR',
                'name_hu' => 'Irán',
                'name_ro' => 'Iran',
                'name_en' => 'Iran',
            ),
            101 => 
            array (
                'id' => 102,
                'country_code' => 'IQ',
                'name_hu' => 'Irak',
                'name_ro' => 'Irak',
                'name_en' => 'Iraq',
            ),
            102 => 
            array (
                'id' => 103,
                'country_code' => 'IE',
                'name_hu' => 'Írország',
                'name_ro' => 'Irlanda',
                'name_en' => 'Ireland',
            ),
            103 => 
            array (
                'id' => 104,
                'country_code' => 'IL',
                'name_hu' => 'Izrael',
                'name_ro' => 'Israel',
                'name_en' => 'Israel',
            ),
            104 => 
            array (
                'id' => 105,
                'country_code' => 'IT',
                'name_hu' => 'Olaszország',
                'name_ro' => 'Italia',
                'name_en' => 'Italy',
            ),
            105 => 
            array (
                'id' => 106,
                'country_code' => 'CI',
                'name_hu' => 'Elefántcsontpart',
                'name_ro' => 'Coasta de Fildeș',
                'name_en' => 'Ivory Coast',
            ),
            106 => 
            array (
                'id' => 107,
                'country_code' => 'JE',
                'name_hu' => 'Jersey Bailiffség',
                'name_ro' => 'Insula Jersey',
                'name_en' => 'Jersey',
            ),
            107 => 
            array (
                'id' => 108,
                'country_code' => 'JM',
                'name_hu' => 'Jamaica',
                'name_ro' => 'Jamaica',
                'name_en' => 'Jamaica',
            ),
            108 => 
            array (
                'id' => 109,
                'country_code' => 'JP',
                'name_hu' => 'Japán',
                'name_ro' => 'Japonia',
                'name_en' => 'Japan',
            ),
            109 => 
            array (
                'id' => 110,
                'country_code' => 'JO',
                'name_hu' => 'Jordánia',
                'name_ro' => 'Iordania',
                'name_en' => 'Jordan',
            ),
            110 => 
            array (
                'id' => 111,
                'country_code' => 'KZ',
                'name_hu' => 'Kazahsztán',
                'name_ro' => 'Kazahstan',
                'name_en' => 'Kazakhstan',
            ),
            111 => 
            array (
                'id' => 112,
                'country_code' => 'KE',
                'name_hu' => 'Kenya',
                'name_ro' => 'Kenya',
                'name_en' => 'Kenya',
            ),
            112 => 
            array (
                'id' => 113,
                'country_code' => 'KI',
                'name_hu' => 'Kiribati',
                'name_ro' => 'Kiribati',
                'name_en' => 'Kiribati',
            ),
            113 => 
            array (
                'id' => 114,
                'country_code' => 'XK',
                'name_hu' => 'Koszovó',
                'name_ro' => 'Kosovo',
                'name_en' => 'Kosovo',
            ),
            114 => 
            array (
                'id' => 115,
                'country_code' => 'KW',
                'name_hu' => 'Kuvait',
                'name_ro' => 'Kuweit',
                'name_en' => 'Kuwait',
            ),
            115 => 
            array (
                'id' => 116,
                'country_code' => 'KG',
                'name_hu' => 'Kirgizisztán',
                'name_ro' => 'Kârgâzstan',
                'name_en' => 'Kyrgyzstan',
            ),
            116 => 
            array (
                'id' => 117,
                'country_code' => 'LA',
                'name_hu' => 'Laosz',
                'name_ro' => 'Laos',
                'name_en' => 'Laos',
            ),
            117 => 
            array (
                'id' => 118,
                'country_code' => 'LV',
                'name_hu' => 'Lettország',
                'name_ro' => 'Letonia',
                'name_en' => 'Latvia',
            ),
            118 => 
            array (
                'id' => 119,
                'country_code' => 'LB',
                'name_hu' => 'Libanon',
                'name_ro' => 'Liban',
                'name_en' => 'Lebanon',
            ),
            119 => 
            array (
                'id' => 120,
                'country_code' => 'LS',
                'name_hu' => 'Lesotho',
                'name_ro' => 'Lesotho',
                'name_en' => 'Lesotho',
            ),
            120 => 
            array (
                'id' => 121,
                'country_code' => 'LR',
                'name_hu' => 'Libéria',
                'name_ro' => 'Liberia',
                'name_en' => 'Liberia',
            ),
            121 => 
            array (
                'id' => 122,
                'country_code' => 'LY',
                'name_hu' => 'Líbia',
                'name_ro' => 'Libia',
                'name_en' => 'Libya',
            ),
            122 => 
            array (
                'id' => 123,
                'country_code' => 'LI',
                'name_hu' => 'Liechtenstein',
                'name_ro' => 'Liechtenstein',
                'name_en' => 'Liechtenstein',
            ),
            123 => 
            array (
                'id' => 124,
                'country_code' => 'LT',
                'name_hu' => 'Litvánia',
                'name_ro' => 'Lituania',
                'name_en' => 'Lithuania',
            ),
            124 => 
            array (
                'id' => 125,
                'country_code' => 'LU',
                'name_hu' => 'Luxemburg',
                'name_ro' => 'Luxemburg',
                'name_en' => 'Luxembourg',
            ),
            125 => 
            array (
                'id' => 126,
                'country_code' => 'MO',
                'name_hu' => 'Makaó',
                'name_ro' => 'Macao',
                'name_en' => 'Macau',
            ),
            126 => 
            array (
                'id' => 127,
                'country_code' => 'MK',
                'name_hu' => 'Észak-Macedónia',
                'name_ro' => 'Republica Macedonia',
                'name_en' => 'North Macedonia',
            ),
            127 => 
            array (
                'id' => 128,
                'country_code' => 'MG',
                'name_hu' => 'Madagaszkár',
                'name_ro' => 'Madagascar',
                'name_en' => 'Madagascar',
            ),
            128 => 
            array (
                'id' => 129,
                'country_code' => 'MW',
                'name_hu' => 'Malawi',
                'name_ro' => 'Malawi',
                'name_en' => 'Malawi',
            ),
            129 => 
            array (
                'id' => 130,
                'country_code' => 'MY',
                'name_hu' => 'Malajzia',
                'name_ro' => 'Malaezia',
                'name_en' => 'Malaysia',
            ),
            130 => 
            array (
                'id' => 131,
                'country_code' => 'MV',
                'name_hu' => 'Maldív-szigetek',
                'name_ro' => 'Maldive',
                'name_en' => 'Maldives',
            ),
            131 => 
            array (
                'id' => 132,
                'country_code' => 'ML',
                'name_hu' => 'Mali',
                'name_ro' => 'Mali',
                'name_en' => 'Mali',
            ),
            132 => 
            array (
                'id' => 133,
                'country_code' => 'MT',
                'name_hu' => 'Málta',
                'name_ro' => 'Malta',
                'name_en' => 'Malta',
            ),
            133 => 
            array (
                'id' => 134,
                'country_code' => 'MH',
                'name_hu' => 'Marshall-szigetek',
                'name_ro' => 'Insulele Marshall',
                'name_en' => 'Marshall Islands',
            ),
            134 => 
            array (
                'id' => 135,
                'country_code' => 'MQ',
                'name_hu' => 'Martinique',
                'name_ro' => 'Martinica',
                'name_en' => 'Martinique',
            ),
            135 => 
            array (
                'id' => 136,
                'country_code' => 'MR',
                'name_hu' => 'Mauritánia',
                'name_ro' => 'Mauritania',
                'name_en' => 'Mauritania',
            ),
            136 => 
            array (
                'id' => 137,
                'country_code' => 'MU',
                'name_hu' => 'Mauritius',
                'name_ro' => 'Mauritius',
                'name_en' => 'Mauritius',
            ),
            137 => 
            array (
                'id' => 138,
                'country_code' => 'TY',
                'name_hu' => 'Mayotte',
                'name_ro' => 'Mayotte',
                'name_en' => 'Mayotte',
            ),
            138 => 
            array (
                'id' => 139,
                'country_code' => 'MX',
                'name_hu' => 'Mexikó',
                'name_ro' => 'Mexic',
                'name_en' => 'Mexico',
            ),
            139 => 
            array (
                'id' => 140,
                'country_code' => 'FM',
                'name_hu' => 'Mikronézia',
                'name_ro' => 'Statele Federate ale Microneziei',
                'name_en' => 'Micronesia, Federated States of',
            ),
            140 => 
            array (
                'id' => 141,
                'country_code' => 'MD',
                'name_hu' => 'Moldova',
                'name_ro' => 'Republica Moldova',
                'name_en' => 'Moldova, Republic of',
            ),
            141 => 
            array (
                'id' => 142,
                'country_code' => 'MC',
                'name_hu' => 'Monaco',
                'name_ro' => 'Monaco',
                'name_en' => 'Monaco',
            ),
            142 => 
            array (
                'id' => 143,
                'country_code' => 'MN',
                'name_hu' => 'Mongólia',
                'name_ro' => 'Mongolia',
                'name_en' => 'Mongolia',
            ),
            143 => 
            array (
                'id' => 144,
                'country_code' => 'ME',
                'name_hu' => 'Montenegró',
                'name_ro' => 'Muntenegru',
                'name_en' => 'Montenegro',
            ),
            144 => 
            array (
                'id' => 145,
                'country_code' => 'MS',
                'name_hu' => 'Montserrat',
                'name_ro' => 'Montserrat',
                'name_en' => 'Montserrat',
            ),
            145 => 
            array (
                'id' => 146,
                'country_code' => 'MA',
                'name_hu' => 'Marokkó',
                'name_ro' => 'Maroc',
                'name_en' => 'Morocco',
            ),
            146 => 
            array (
                'id' => 147,
                'country_code' => 'MZ',
                'name_hu' => 'Mozambik',
                'name_ro' => 'Mozambic',
                'name_en' => 'Mozambique',
            ),
            147 => 
            array (
                'id' => 148,
                'country_code' => 'MM',
                'name_hu' => 'Mianmar',
                'name_ro' => 'Myanmar',
                'name_en' => 'Myanmar',
            ),
            148 => 
            array (
                'id' => 149,
                'country_code' => 'NA',
                'name_hu' => 'Namíbia',
                'name_ro' => 'Namibia',
                'name_en' => 'Namibia',
            ),
            149 => 
            array (
                'id' => 150,
                'country_code' => 'NR',
                'name_hu' => 'Nauru',
                'name_ro' => 'Nauru',
                'name_en' => 'Nauru',
            ),
            150 => 
            array (
                'id' => 151,
                'country_code' => 'NP',
                'name_hu' => 'Nepál',
                'name_ro' => 'Nepal',
                'name_en' => 'Nepal',
            ),
            151 => 
            array (
                'id' => 152,
                'country_code' => 'NL',
                'name_hu' => 'Hollandia',
                'name_ro' => 'Afganisztán',
                'name_en' => 'Netherlands',
            ),
            152 => 
            array (
                'id' => 153,
                'country_code' => 'AN',
                'name_hu' => 'Holland Antillák',
                'name_ro' => 'Olanda',
                'name_en' => 'Netherlands Antilles',
            ),
            153 => 
            array (
                'id' => 154,
                'country_code' => 'NC',
                'name_hu' => 'Új-Kaledónia',
                'name_ro' => 'Noua Caledonie',
                'name_en' => 'New Caledonia',
            ),
            154 => 
            array (
                'id' => 155,
                'country_code' => 'NZ',
                'name_hu' => 'Új-Zéland',
                'name_ro' => 'Noua Zeelandă',
                'name_en' => 'New Zealand',
            ),
            155 => 
            array (
                'id' => 156,
                'country_code' => 'NI',
                'name_hu' => 'Nicaragua',
                'name_ro' => 'Nicaragua',
                'name_en' => 'Nicaragua',
            ),
            156 => 
            array (
                'id' => 157,
                'country_code' => 'NE',
                'name_hu' => 'Niger',
                'name_ro' => 'Niger',
                'name_en' => 'Niger',
            ),
            157 => 
            array (
                'id' => 158,
                'country_code' => 'NG',
                'name_hu' => 'Nigéria',
                'name_ro' => 'Nigeria',
                'name_en' => 'Nigeria',
            ),
            158 => 
            array (
                'id' => 159,
                'country_code' => 'NU',
                'name_hu' => 'Niue',
                'name_ro' => 'Niue',
                'name_en' => 'Niue',
            ),
            159 => 
            array (
                'id' => 160,
                'country_code' => 'NF',
                'name_hu' => 'Norfolk-sziget',
                'name_ro' => 'Insula Norfolk',
                'name_en' => 'Norfolk Island',
            ),
            160 => 
            array (
                'id' => 161,
                'country_code' => 'KP',
                'name_hu' => 'Észak-Korea',
                'name_ro' => 'Coreea de Nord',
                'name_en' => 'North-Korea',
            ),
            161 => 
            array (
                'id' => 162,
                'country_code' => 'MP',
                'name_hu' => 'Északi-Mariana-szigetek',
                'name_ro' => 'Comunitatea Insulelor Mariane de Nord',
                'name_en' => 'Northern Mariana Islands',
            ),
            162 => 
            array (
                'id' => 163,
                'country_code' => 'NO',
                'name_hu' => 'Norvégia',
                'name_ro' => 'Norvegia',
                'name_en' => 'Norway',
            ),
            163 => 
            array (
                'id' => 164,
                'country_code' => 'OM',
                'name_hu' => 'Omán',
                'name_ro' => 'Oman',
                'name_en' => 'Oman',
            ),
            164 => 
            array (
                'id' => 165,
                'country_code' => 'PK',
                'name_hu' => 'Pakisztán',
                'name_ro' => 'Pakistan',
                'name_en' => 'Pakistan',
            ),
            165 => 
            array (
                'id' => 166,
                'country_code' => 'PW',
                'name_hu' => 'Palau',
                'name_ro' => 'Palau',
                'name_en' => 'Palau',
            ),
            166 => 
            array (
                'id' => 167,
                'country_code' => 'PS',
                'name_hu' => 'Palesztina',
                'name_ro' => 'Palestina',
                'name_en' => 'Palestine',
            ),
            167 => 
            array (
                'id' => 168,
                'country_code' => 'PA',
                'name_hu' => 'Panama',
                'name_ro' => 'Panama',
                'name_en' => 'Panama',
            ),
            168 => 
            array (
                'id' => 169,
                'country_code' => 'PG',
                'name_hu' => 'Pápua Új-Guinea',
                'name_ro' => 'Papua Noua Guinee',
                'name_en' => 'Papua New Guinea',
            ),
            169 => 
            array (
                'id' => 170,
                'country_code' => 'PY',
                'name_hu' => 'Paraguay',
                'name_ro' => 'Paraguay',
                'name_en' => 'Paraguay',
            ),
            170 => 
            array (
                'id' => 171,
                'country_code' => 'PE',
                'name_hu' => 'Peru',
                'name_ro' => 'Peru',
                'name_en' => 'Peru',
            ),
            171 => 
            array (
                'id' => 172,
                'country_code' => 'PH',
                'name_hu' => 'Fülöp-szigetek',
                'name_ro' => 'Filipine',
                'name_en' => 'Philippines',
            ),
            172 => 
            array (
                'id' => 173,
                'country_code' => 'PN',
                'name_hu' => 'Pitcairn-szigetek',
                'name_ro' => 'Insulele Pitcairn',
                'name_en' => 'Pitcairn',
            ),
            173 => 
            array (
                'id' => 174,
                'country_code' => 'PL',
                'name_hu' => 'Lengyelország',
                'name_ro' => 'Polonia',
                'name_en' => 'Poland',
            ),
            174 => 
            array (
                'id' => 175,
                'country_code' => 'PT',
                'name_hu' => 'Portugália',
                'name_ro' => 'Portugalia',
                'name_en' => 'Portugal',
            ),
            175 => 
            array (
                'id' => 176,
                'country_code' => 'PR',
                'name_hu' => 'Puerto Rico',
                'name_ro' => 'Puerto Rico',
                'name_en' => 'Puerto Rico',
            ),
            176 => 
            array (
                'id' => 177,
                'country_code' => 'QA',
                'name_hu' => 'Katar',
                'name_ro' => 'Qatar',
                'name_en' => 'Qatar',
            ),
            177 => 
            array (
                'id' => 178,
                'country_code' => 'RE',
                'name_hu' => 'Reunion',
                'name_ro' => 'Réunion',
                'name_en' => 'Reunion',
            ),
            178 => 
            array (
                'id' => 179,
                'country_code' => 'RO',
                'name_hu' => 'Románia',
                'name_ro' => 'România',
                'name_en' => 'Romania',
            ),
            179 => 
            array (
                'id' => 180,
                'country_code' => 'RU',
                'name_hu' => 'Oroszország',
                'name_ro' => 'Rusia',
                'name_en' => 'Russia',
            ),
            180 => 
            array (
                'id' => 181,
                'country_code' => 'RW',
                'name_hu' => 'Ruanda',
                'name_ro' => 'Rwanda',
                'name_en' => 'Rwanda',
            ),
            181 => 
            array (
                'id' => 182,
                'country_code' => 'KN',
                'name_hu' => 'Saint Kitts és Nevis',
                'name_ro' => 'Sfântul Cristofor și Nevis',
                'name_en' => 'Saint Kitts and Nevis',
            ),
            182 => 
            array (
                'id' => 183,
                'country_code' => 'LC',
                'name_hu' => 'Saint Lucia',
                'name_ro' => 'Sfânta Lucia',
                'name_en' => 'Saint Lucia',
            ),
            183 => 
            array (
                'id' => 184,
                'country_code' => 'VC',
                'name_hu' => 'Saint Vincent és a Grenadine-szigetek',
                'name_ro' => 'Sfântul Vicențiu și Grenadinele',
                'name_en' => 'Saint Vincent and the Grenadines',
            ),
            184 => 
            array (
                'id' => 185,
                'country_code' => 'WS',
                'name_hu' => 'Szamoa',
                'name_ro' => 'Samoa',
                'name_en' => 'Samoa',
            ),
            185 => 
            array (
                'id' => 186,
                'country_code' => 'SM',
                'name_hu' => 'San Marino',
                'name_ro' => 'San Marino',
                'name_en' => 'San Marino',
            ),
            186 => 
            array (
                'id' => 187,
                'country_code' => 'ST',
                'name_hu' => 'São Tomé és Príncipe',
                'name_ro' => 'São Tomé și Príncipe',
                'name_en' => 'Sao Tome and Principe',
            ),
            187 => 
            array (
                'id' => 188,
                'country_code' => 'SA',
                'name_hu' => 'Szaúd-Arábia',
                'name_ro' => 'Arabia Saudită',
                'name_en' => 'Saudi Arabia',
            ),
            188 => 
            array (
                'id' => 189,
                'country_code' => 'SN',
                'name_hu' => 'Szenegál',
                'name_ro' => 'Senegal',
                'name_en' => 'Senegal',
            ),
            189 => 
            array (
                'id' => 190,
                'country_code' => 'RS',
                'name_hu' => 'Szerbia',
                'name_ro' => 'Serbia',
                'name_en' => 'Serbia',
            ),
            190 => 
            array (
                'id' => 191,
                'country_code' => 'SC',
                'name_hu' => 'Seychelle-szigetek',
                'name_ro' => 'Seychelles',
                'name_en' => 'Seychelles',
            ),
            191 => 
            array (
                'id' => 192,
                'country_code' => 'SL',
                'name_hu' => 'Sierra Leone',
                'name_ro' => 'Sierra Leone',
                'name_en' => 'Sierra Leone',
            ),
            192 => 
            array (
                'id' => 193,
                'country_code' => 'SG',
                'name_hu' => 'Szingapúr',
                'name_ro' => 'Singapore',
                'name_en' => 'Singapore',
            ),
            193 => 
            array (
                'id' => 194,
                'country_code' => 'SK',
                'name_hu' => 'Szlovákia',
                'name_ro' => 'Slovacia',
                'name_en' => 'Slovakia',
            ),
            194 => 
            array (
                'id' => 195,
                'country_code' => 'SI',
                'name_hu' => 'Szlovénia',
                'name_ro' => 'Slovenia',
                'name_en' => 'Slovenia',
            ),
            195 => 
            array (
                'id' => 196,
                'country_code' => 'SB',
                'name_hu' => 'Salamon-szigetek',
                'name_ro' => 'Insulele Solomon',
                'name_en' => 'Solomon Islands',
            ),
            196 => 
            array (
                'id' => 197,
                'country_code' => 'SO',
                'name_hu' => 'Szomália',
                'name_ro' => 'Somalia',
                'name_en' => 'Somalia',
            ),
            197 => 
            array (
                'id' => 198,
                'country_code' => 'ZA',
                'name_hu' => 'Dél-afrikai Köztársaság',
                'name_ro' => 'Africa de Sud',
                'name_en' => 'South Africa',
            ),
            198 => 
            array (
                'id' => 199,
                'country_code' => 'GS',
                'name_hu' => 'Déli-Georgia és Déli-Sandwich-szigetek',
                'name_ro' => 'Georgia de Sud și Insulele Sandwich de Sud',
                'name_en' => 'South Georgia South Sandwich Islands',
            ),
            199 => 
            array (
                'id' => 200,
                'country_code' => 'KR',
                'name_hu' => 'Dél-Korea',
                'name_ro' => 'Coreea de Sud',
                'name_en' => 'South Korea',
            ),
            200 => 
            array (
                'id' => 201,
                'country_code' => 'SS',
                'name_hu' => 'Dél-Szudán',
                'name_ro' => 'Sudanul de Sud',
                'name_en' => 'South Sudan',
            ),
            201 => 
            array (
                'id' => 202,
                'country_code' => 'ES',
                'name_hu' => 'Spanyolország',
                'name_ro' => 'Spania',
                'name_en' => 'Spain',
            ),
            202 => 
            array (
                'id' => 203,
                'country_code' => 'LK',
                'name_hu' => 'Srí Lanka',
                'name_ro' => 'Sri Lanka',
                'name_en' => 'Sri Lanka',
            ),
            203 => 
            array (
                'id' => 204,
                'country_code' => 'SH',
                'name_hu' => 'Szent Ilona',
                'name_ro' => 'Sfânta Elena',
                'name_en' => 'St. Helena',
            ),
            204 => 
            array (
                'id' => 205,
                'country_code' => 'PM',
                'name_hu' => 'Saint-Pierre és Miquelon',
                'name_ro' => 'Sfîntul Petru și Miquelon',
                'name_en' => 'St. Pierre and Miquelon',
            ),
            205 => 
            array (
                'id' => 206,
                'country_code' => 'SD',
                'name_hu' => 'Szudán',
                'name_ro' => 'Sudan',
                'name_en' => 'Sudan',
            ),
            206 => 
            array (
                'id' => 207,
                'country_code' => 'SR',
                'name_hu' => 'Suriname',
                'name_ro' => 'Surinam',
                'name_en' => 'Suriname',
            ),
            207 => 
            array (
                'id' => 208,
                'country_code' => 'SJ',
                'name_hu' => 'Jan Mayen-sziget',
                'name_ro' => 'Jan Mayen',
                'name_en' => 'Svalbard and Jan Mayen Islands',
            ),
            208 => 
            array (
                'id' => 209,
                'country_code' => 'SZ',
                'name_hu' => 'Szváziföld',
                'name_ro' => 'Eswatini',
                'name_en' => 'Swaziland',
            ),
            209 => 
            array (
                'id' => 210,
                'country_code' => 'SE',
                'name_hu' => 'Svédország',
                'name_ro' => 'Suedia',
                'name_en' => 'Sweden',
            ),
            210 => 
            array (
                'id' => 211,
                'country_code' => 'CH',
                'name_hu' => 'Svájc',
                'name_ro' => 'Elveția',
                'name_en' => 'Switzerland',
            ),
            211 => 
            array (
                'id' => 212,
                'country_code' => 'SY',
                'name_hu' => 'Szíria',
                'name_ro' => 'Siria',
                'name_en' => 'Syrian Arab Republic',
            ),
            212 => 
            array (
                'id' => 213,
                'country_code' => 'TW',
                'name_hu' => 'Tajvan',
                'name_ro' => 'Taiwan',
                'name_en' => 'Taiwan',
            ),
            213 => 
            array (
                'id' => 214,
                'country_code' => 'TJ',
                'name_hu' => 'Tádzsikisztán',
                'name_ro' => 'Tadjikistan',
                'name_en' => 'Tajikistan',
            ),
            214 => 
            array (
                'id' => 215,
                'country_code' => 'TZ',
                'name_hu' => 'Tanzánia',
                'name_ro' => 'Tanzania',
                'name_en' => 'Tanzania, United Republic of',
            ),
            215 => 
            array (
                'id' => 216,
                'country_code' => 'TH',
                'name_hu' => 'Thaiföld',
                'name_ro' => 'Thailanda',
                'name_en' => 'Thailand',
            ),
            216 => 
            array (
                'id' => 217,
                'country_code' => 'TG',
                'name_hu' => 'Togo',
                'name_ro' => 'Togo',
                'name_en' => 'Togo',
            ),
            217 => 
            array (
                'id' => 218,
                'country_code' => 'TK',
                'name_hu' => 'Tokelau-szigetek',
                'name_ro' => 'Tokelau',
                'name_en' => 'Tokelau',
            ),
            218 => 
            array (
                'id' => 219,
                'country_code' => 'TO',
                'name_hu' => 'Tonga',
                'name_ro' => 'Tonga',
                'name_en' => 'Tonga',
            ),
            219 => 
            array (
                'id' => 220,
                'country_code' => 'TT',
                'name_hu' => 'Trinidad és Tobago',
                'name_ro' => 'Trinidad-Tobago',
                'name_en' => 'Trinidad and Tobago',
            ),
            220 => 
            array (
                'id' => 221,
                'country_code' => 'TN',
                'name_hu' => 'Tunézia',
                'name_ro' => 'Tunisia',
                'name_en' => 'Tunisia',
            ),
            221 => 
            array (
                'id' => 222,
                'country_code' => 'TR',
                'name_hu' => 'Törökország',
                'name_ro' => 'Turcia',
                'name_en' => 'Turkey',
            ),
            222 => 
            array (
                'id' => 223,
                'country_code' => 'TM',
                'name_hu' => 'Türkmenisztán',
                'name_ro' => 'Turkmenistan',
                'name_en' => 'Turkmenistan',
            ),
            223 => 
            array (
                'id' => 224,
                'country_code' => 'TC',
                'name_hu' => 'Turks- és Caicos-szigetek',
                'name_ro' => 'Insulele Turks și Caicos',
                'name_en' => 'Turks and Caicos Islands',
            ),
            224 => 
            array (
                'id' => 225,
                'country_code' => 'TV',
                'name_hu' => 'Tuvalu',
                'name_ro' => 'Tuvalu',
                'name_en' => 'Tuvalu',
            ),
            225 => 
            array (
                'id' => 226,
                'country_code' => 'UG',
                'name_hu' => 'Uganda',
                'name_ro' => 'Uganda',
                'name_en' => 'Uganda',
            ),
            226 => 
            array (
                'id' => 227,
                'country_code' => 'UA',
                'name_hu' => 'Ukrajna',
                'name_ro' => 'Ucraina',
                'name_en' => 'Ukraine',
            ),
            227 => 
            array (
                'id' => 228,
                'country_code' => 'AE',
                'name_hu' => 'Egyesült Arab Emírségek',
                'name_ro' => 'Emiratele Arabe Unite',
                'name_en' => 'United Arab Emirates',
            ),
            228 => 
            array (
                'id' => 229,
                'country_code' => 'GB',
                'name_hu' => 'Egyesült Királyság',
                'name_ro' => 'Regatului Unit',
                'name_en' => 'United Kingdom',
            ),
            229 => 
            array (
                'id' => 230,
                'country_code' => 'US',
                'name_hu' => 'Egyesült Államok',
                'name_ro' => 'Statele Unite ale Americii',
                'name_en' => 'United States',
            ),
            230 => 
            array (
                'id' => 231,
                'country_code' => 'UM',
                'name_hu' => 'Az Amerikai Egyesült Államok lakatlan külbirtokai',
                'name_ro' => 'Insulele Minore Îndepărtate ale Statelor Unite',
                'name_en' => 'United States minor outlying islands',
            ),
            231 => 
            array (
                'id' => 232,
                'country_code' => 'UY',
                'name_hu' => 'Uruguay',
                'name_ro' => 'Uruguay',
                'name_en' => 'Uruguay',
            ),
            232 => 
            array (
                'id' => 233,
                'country_code' => 'UZ',
                'name_hu' => 'Üzbegisztán',
                'name_ro' => 'Uzbekistan',
                'name_en' => 'Uzbekistan',
            ),
            233 => 
            array (
                'id' => 234,
                'country_code' => 'VU',
                'name_hu' => 'Vanuatu',
                'name_ro' => 'Vanuatu',
                'name_en' => 'Vanuatu',
            ),
            234 => 
            array (
                'id' => 235,
                'country_code' => 'VA',
                'name_hu' => 'Vatikán',
                'name_ro' => 'Vatican',
                'name_en' => 'Vatican City State',
            ),
            235 => 
            array (
                'id' => 236,
                'country_code' => 'VE',
                'name_hu' => 'Venezuela',
                'name_ro' => 'Venezuela',
                'name_en' => 'Venezuela',
            ),
            236 => 
            array (
                'id' => 237,
                'country_code' => 'VN',
                'name_hu' => 'Vietnám',
                'name_ro' => 'Vietnam',
                'name_en' => 'Vietnam',
            ),
            237 => 
            array (
                'id' => 238,
                'country_code' => 'VG',
                'name_hu' => 'Brit Virgin-szigetek',
                'name_ro' => 'Insulele Virgine Britanice',
            'name_en' => 'Virgin Islands (British)',
            ),
            238 => 
            array (
                'id' => 239,
                'country_code' => 'VI',
                'name_hu' => 'Amerikai Virgin-szigetek',
                'name_ro' => 'Insulele Virgine Americane',
            'name_en' => 'Virgin Islands (U.S.)',
            ),
            239 => 
            array (
                'id' => 240,
                'country_code' => 'WF',
                'name_hu' => 'Wallis és Futuna',
                'name_ro' => 'Wallis și Futuna',
                'name_en' => 'Wallis and Futuna Islands',
            ),
            240 => 
            array (
                'id' => 241,
                'country_code' => 'EH',
                'name_hu' => 'Nyugat-Szahara',
                'name_ro' => 'Sahara de Vest',
                'name_en' => 'Western Sahara',
            ),
            241 => 
            array (
                'id' => 242,
                'country_code' => 'YE',
                'name_hu' => 'Jemen',
                'name_ro' => 'Yemen',
                'name_en' => 'Yemen',
            ),
            242 => 
            array (
                'id' => 243,
                'country_code' => 'ZM',
                'name_hu' => 'Zambia',
                'name_ro' => 'Zambia',
                'name_en' => 'Zambia',
            ),
            243 => 
            array (
                'id' => 244,
                'country_code' => 'ZW',
                'name_hu' => 'Zimbabwe',
                'name_ro' => 'Zimbabwe',
                'name_en' => 'Zimbabwe',
            ),
        ));
        
        
    }
}