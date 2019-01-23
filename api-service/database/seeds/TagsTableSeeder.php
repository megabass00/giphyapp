<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tags')->delete();
        
        \DB::table('tags')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'simpson',
                'created_at' => '2018-12-28 13:22:52',
                'updated_at' => '2018-12-28 13:22:52',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'aplauso',
                'created_at' => '2018-12-28 13:23:13',
                'updated_at' => '2018-12-28 13:27:06',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'marron',
                'created_at' => '2018-12-28 13:23:29',
                'updated_at' => '2018-12-28 13:23:29',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'sarita',
                'created_at' => '2018-12-28 15:19:26',
                'updated_at' => '2018-12-28 15:19:26',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'payaso',
                'created_at' => '2018-12-28 15:20:31',
                'updated_at' => '2018-12-28 15:20:31',
            ),
            5 => 
            array (
                'id' => 10,
                'name' => 'wonka',
                'created_at' => '2019-01-06 12:48:33',
                'updated_at' => '2019-01-06 12:48:33',
            ),
            6 => 
            array (
                'id' => 11,
                'name' => 'alegria',
                'created_at' => '2019-01-06 12:48:54',
                'updated_at' => '2019-01-06 12:48:54',
            ),
            7 => 
            array (
                'id' => 12,
                'name' => 'churrito',
                'created_at' => '2019-01-06 12:49:40',
                'updated_at' => '2019-01-06 12:49:40',
            ),
            8 => 
            array (
                'id' => 13,
                'name' => 'ostion',
                'created_at' => '2019-01-06 12:50:10',
                'updated_at' => '2019-01-06 12:50:10',
            ),
            9 => 
            array (
                'id' => 14,
                'name' => 'tetas',
                'created_at' => '2019-01-06 12:56:40',
                'updated_at' => '2019-01-06 12:56:40',
            ),
            10 => 
            array (
                'id' => 15,
                'name' => 'baile',
                'created_at' => '2019-01-06 12:57:42',
                'updated_at' => '2019-01-06 12:57:42',
            ),
            11 => 
            array (
                'id' => 16,
                'name' => 'niño',
                'created_at' => '2019-01-06 12:58:35',
                'updated_at' => '2019-01-06 12:58:35',
            ),
            12 => 
            array (
                'id' => 17,
                'name' => 'sacapuntas',
                'created_at' => '2019-01-06 12:59:03',
                'updated_at' => '2019-01-06 12:59:03',
            ),
            13 => 
            array (
                'id' => 18,
                'name' => 'travesti',
                'created_at' => '2019-01-06 13:00:36',
                'updated_at' => '2019-01-06 13:00:36',
            ),
            14 => 
            array (
                'id' => 19,
                'name' => 'cabra',
                'created_at' => '2019-01-06 13:01:31',
                'updated_at' => '2019-01-06 13:01:31',
            ),
            15 => 
            array (
                'id' => 20,
                'name' => 'risa',
                'created_at' => '2019-01-06 13:02:11',
                'updated_at' => '2019-01-06 13:02:11',
            ),
            16 => 
            array (
                'id' => 21,
                'name' => 'sorpresa',
                'created_at' => '2019-01-06 13:08:53',
                'updated_at' => '2019-01-06 13:08:53',
            ),
            17 => 
            array (
                'id' => 22,
                'name' => 'ralphie',
                'created_at' => '2019-01-06 13:10:19',
                'updated_at' => '2019-01-06 13:10:19',
            ),
            18 => 
            array (
                'id' => 23,
                'name' => 'culo',
                'created_at' => '2019-01-06 13:13:22',
                'updated_at' => '2019-01-06 13:13:22',
            ),
            19 => 
            array (
                'id' => 24,
                'name' => 'chupabarbas',
                'created_at' => '2019-01-06 13:14:39',
                'updated_at' => '2019-01-06 13:14:39',
            ),
            20 => 
            array (
                'id' => 25,
                'name' => 'fiesta',
                'created_at' => '2019-01-16 09:59:05',
                'updated_at' => '2019-01-16 09:59:05',
            ),
            21 => 
            array (
                'id' => 26,
                'name' => 'enfadado',
                'created_at' => '2019-01-16 09:59:17',
                'updated_at' => '2019-01-16 09:59:17',
            ),
            22 => 
            array (
                'id' => 27,
                'name' => 'golpe',
                'created_at' => '2019-01-16 09:59:26',
                'updated_at' => '2019-01-16 09:59:26',
            ),
            23 => 
            array (
                'id' => 28,
                'name' => 'mono',
                'created_at' => '2019-01-16 09:59:36',
                'updated_at' => '2019-01-16 09:59:36',
            ),
            24 => 
            array (
                'id' => 29,
                'name' => 'corre',
                'created_at' => '2019-01-16 09:59:55',
                'updated_at' => '2019-01-16 09:59:55',
            ),
            25 => 
            array (
                'id' => 31,
                'name' => 'padredefamilia',
                'created_at' => '2019-01-16 10:00:21',
                'updated_at' => '2019-01-16 10:00:21',
            ),
            26 => 
            array (
                'id' => 32,
                'name' => 'wow',
                'created_at' => '2019-01-16 10:00:31',
                'updated_at' => '2019-01-16 10:00:31',
            ),
            27 => 
            array (
                'id' => 33,
                'name' => 'art api',
                'created_at' => '2019-01-16 10:00:40',
                'updated_at' => '2019-01-16 10:00:40',
            ),
            28 => 
            array (
                'id' => 34,
                'name' => 'facepalm',
                'created_at' => '2019-01-16 10:00:54',
                'updated_at' => '2019-01-16 10:00:54',
            ),
            29 => 
            array (
                'id' => 35,
                'name' => 'tonto',
                'created_at' => '2019-01-16 10:01:09',
                'updated_at' => '2019-01-16 10:01:09',
            ),
            30 => 
            array (
                'id' => 36,
                'name' => 'frankestein',
                'created_at' => '2019-01-16 10:01:55',
                'updated_at' => '2019-01-16 10:01:55',
            ),
            31 => 
            array (
                'id' => 37,
                'name' => 'flipando',
                'created_at' => '2019-01-16 10:02:10',
                'updated_at' => '2019-01-16 10:02:10',
            ),
            32 => 
            array (
                'id' => 38,
                'name' => 'roto',
                'created_at' => '2019-01-16 10:02:30',
                'updated_at' => '2019-01-16 10:02:30',
            ),
            33 => 
            array (
                'id' => 39,
                'name' => 'mentos',
                'created_at' => '2019-01-21 14:19:54',
                'updated_at' => '2019-01-21 14:19:54',
            ),
            34 => 
            array (
                'id' => 40,
                'name' => 'toro',
                'created_at' => '2019-01-22 09:14:50',
                'updated_at' => '2019-01-22 09:14:50',
            ),
            35 => 
            array (
                'id' => 41,
                'name' => 'torero',
                'created_at' => '2019-01-22 09:14:58',
                'updated_at' => '2019-01-22 09:14:58',
            ),
            36 => 
            array (
                'id' => 42,
                'name' => 'explosion',
                'created_at' => '2019-01-22 09:15:46',
                'updated_at' => '2019-01-22 09:15:46',
            ),
            37 => 
            array (
                'id' => 43,
                'name' => 'catapulta',
                'created_at' => '2019-01-22 10:00:55',
                'updated_at' => '2019-01-22 10:00:55',
            ),
            38 => 
            array (
                'id' => 44,
                'name' => 'lluvia',
                'created_at' => '2019-01-22 11:28:05',
                'updated_at' => '2019-01-22 11:28:05',
            ),
            39 => 
            array (
                'id' => 45,
                'name' => 'dolor',
                'created_at' => '2019-01-23 14:19:55',
                'updated_at' => '2019-01-23 14:19:55',
            ),
            40 => 
            array (
                'id' => 46,
                'name' => 'futbolin',
                'created_at' => '2019-01-23 14:20:05',
                'updated_at' => '2019-01-23 14:20:05',
            ),
            41 => 
            array (
                'id' => 47,
                'name' => 'saludo',
                'created_at' => '2019-01-23 15:15:25',
                'updated_at' => '2019-01-23 15:15:25',
            ),
            42 => 
            array (
                'id' => 48,
                'name' => 'maldad',
                'created_at' => '2019-01-23 15:21:27',
                'updated_at' => '2019-01-23 15:21:27',
            ),
            43 => 
            array (
                'id' => 49,
                'name' => 'sueño',
                'created_at' => '2019-01-23 15:21:49',
                'updated_at' => '2019-01-23 15:21:49',
            ),
            44 => 
            array (
                'id' => 50,
                'name' => 'conejo',
                'created_at' => '2019-01-23 15:21:58',
                'updated_at' => '2019-01-23 15:21:58',
            ),
            45 => 
            array (
                'id' => 51,
                'name' => 'ordenador',
                'created_at' => '2019-01-23 15:22:34',
                'updated_at' => '2019-01-23 15:22:34',
            ),
            46 => 
            array (
                'id' => 52,
                'name' => 'jodete',
                'created_at' => '2019-01-23 15:23:03',
                'updated_at' => '2019-01-23 15:23:03',
            ),
            47 => 
            array (
                'id' => 53,
                'name' => 'mirada',
                'created_at' => '2019-01-23 15:23:43',
                'updated_at' => '2019-01-23 15:23:43',
            ),
            48 => 
            array (
                'id' => 54,
                'name' => 'calculando',
                'created_at' => '2019-01-23 15:23:58',
                'updated_at' => '2019-01-23 15:23:58',
            ),
            49 => 
            array (
                'id' => 55,
                'name' => 'platillos',
                'created_at' => '2019-01-23 15:24:20',
                'updated_at' => '2019-01-23 15:24:20',
            ),
            50 => 
            array (
                'id' => 56,
                'name' => 'llorar',
                'created_at' => '2019-01-23 15:24:48',
                'updated_at' => '2019-01-23 15:24:48',
            ),
            51 => 
            array (
                'id' => 57,
                'name' => 'pena',
                'created_at' => '2019-01-23 15:24:54',
                'updated_at' => '2019-01-23 15:24:54',
            ),
            52 => 
            array (
                'id' => 58,
                'name' => 'no',
                'created_at' => '2019-01-23 15:25:21',
                'updated_at' => '2019-01-23 15:25:21',
            ),
            53 => 
            array (
                'id' => 59,
                'name' => 'paseo',
                'created_at' => '2019-01-23 15:27:03',
                'updated_at' => '2019-01-23 15:27:03',
            ),
            54 => 
            array (
                'id' => 60,
                'name' => 'hagamoslo',
                'created_at' => '2019-01-23 15:27:35',
                'updated_at' => '2019-01-23 15:27:35',
            ),
            55 => 
            array (
                'id' => 61,
                'name' => 'kraken',
                'created_at' => '2019-01-23 15:28:15',
                'updated_at' => '2019-01-23 15:28:15',
            ),
            56 => 
            array (
                'id' => 62,
                'name' => 'tiempo',
                'created_at' => '2019-01-23 15:28:33',
                'updated_at' => '2019-01-23 15:28:33',
            ),
            57 => 
            array (
                'id' => 63,
                'name' => 'reloj',
                'created_at' => '2019-01-23 15:28:43',
                'updated_at' => '2019-01-23 15:28:43',
            ),
            58 => 
            array (
                'id' => 64,
                'name' => 'reverencia',
                'created_at' => '2019-01-23 15:28:58',
                'updated_at' => '2019-01-23 15:28:58',
            ),
            59 => 
            array (
                'id' => 65,
                'name' => 'vikingo',
                'created_at' => '2019-01-23 15:30:40',
                'updated_at' => '2019-01-23 15:30:40',
            ),
            60 => 
            array (
                'id' => 66,
                'name' => 'planificacion',
                'created_at' => '2019-01-23 15:31:15',
                'updated_at' => '2019-01-23 15:31:15',
            ),
            61 => 
            array (
                'id' => 67,
                'name' => 'cuidado',
                'created_at' => '2019-01-23 15:32:09',
                'updated_at' => '2019-01-23 15:32:09',
            ),
            62 => 
            array (
                'id' => 68,
                'name' => 'dibujos',
                'created_at' => '2019-01-23 15:32:22',
                'updated_at' => '2019-01-23 15:32:22',
            ),
            63 => 
            array (
                'id' => 69,
                'name' => 'caca',
                'created_at' => '2019-01-23 15:33:45',
                'updated_at' => '2019-01-23 15:33:45',
            ),
            64 => 
            array (
                'id' => 70,
                'name' => 'cactus',
                'created_at' => '2019-01-23 15:34:51',
                'updated_at' => '2019-01-23 15:34:51',
            ),
            65 => 
            array (
                'id' => 71,
                'name' => 'droga',
                'created_at' => '2019-01-23 15:35:04',
                'updated_at' => '2019-01-23 15:35:04',
            ),
            66 => 
            array (
                'id' => 72,
                'name' => 'susto',
                'created_at' => '2019-01-23 15:35:27',
                'updated_at' => '2019-01-23 15:35:27',
            ),
            67 => 
            array (
                'id' => 73,
                'name' => 'programando',
                'created_at' => '2019-01-23 15:36:04',
                'updated_at' => '2019-01-23 15:36:04',
            ),
            68 => 
            array (
                'id' => 74,
                'name' => 'gustavo',
                'created_at' => '2019-01-23 15:36:38',
                'updated_at' => '2019-01-23 15:36:38',
            ),
            69 => 
            array (
                'id' => 75,
                'name' => 'espia',
                'created_at' => '2019-01-23 15:37:48',
                'updated_at' => '2019-01-23 15:37:48',
            ),
            70 => 
            array (
                'id' => 76,
                'name' => 'enano',
                'created_at' => '2019-01-23 15:38:03',
                'updated_at' => '2019-01-23 15:38:03',
            ),
            71 => 
            array (
                'id' => 77,
                'name' => 'diana',
                'created_at' => '2019-01-23 15:38:09',
                'updated_at' => '2019-01-23 15:38:09',
            ),
            72 => 
            array (
                'id' => 78,
                'name' => 'despierta',
                'created_at' => '2019-01-23 15:39:28',
                'updated_at' => '2019-01-23 15:39:28',
            ),
            73 => 
            array (
                'id' => 79,
                'name' => 'viento',
                'created_at' => '2019-01-23 15:39:56',
                'updated_at' => '2019-01-23 15:39:56',
            ),
            74 => 
            array (
                'id' => 80,
                'name' => 'jugar',
                'created_at' => '2019-01-23 15:46:27',
                'updated_at' => '2019-01-23 15:46:27',
            ),
            75 => 
            array (
                'id' => 81,
                'name' => 'magic',
                'created_at' => '2019-01-23 15:47:08',
                'updated_at' => '2019-01-23 15:47:08',
            ),
            76 => 
            array (
                'id' => 82,
                'name' => 'nauseas',
                'created_at' => '2019-01-23 15:48:14',
                'updated_at' => '2019-01-23 15:48:14',
            ),
            77 => 
            array (
                'id' => 83,
                'name' => 'sospecha',
                'created_at' => '2019-01-23 15:52:12',
                'updated_at' => '2019-01-23 15:52:12',
            ),
            78 => 
            array (
                'id' => 84,
                'name' => 'power',
                'created_at' => '2019-01-23 15:52:52',
                'updated_at' => '2019-01-23 15:52:52',
            ),
            79 => 
            array (
                'id' => 85,
                'name' => 'robot',
                'created_at' => '2019-01-23 15:52:57',
                'updated_at' => '2019-01-23 15:52:57',
            ),
            80 => 
            array (
                'id' => 86,
                'name' => 'gato',
                'created_at' => '2019-01-23 15:54:01',
                'updated_at' => '2019-01-23 15:54:01',
            ),
            81 => 
            array (
                'id' => 87,
                'name' => 'nba',
                'created_at' => '2019-01-23 15:54:17',
                'updated_at' => '2019-01-23 15:54:17',
            ),
            82 => 
            array (
                'id' => 88,
                'name' => 'fuego',
                'created_at' => '2019-01-23 15:54:37',
                'updated_at' => '2019-01-23 15:54:37',
            ),
            83 => 
            array (
                'id' => 89,
                'name' => 'solitario',
                'created_at' => '2019-01-23 15:55:00',
                'updated_at' => '2019-01-23 15:55:00',
            ),
            84 => 
            array (
                'id' => 90,
                'name' => 'gemelos',
                'created_at' => '2019-01-23 15:55:16',
                'updated_at' => '2019-01-23 15:55:16',
            ),
            85 => 
            array (
                'id' => 91,
                'name' => 'coordinando',
                'created_at' => '2019-01-23 15:55:42',
                'updated_at' => '2019-01-23 15:55:42',
            ),
            86 => 
            array (
                'id' => 92,
                'name' => 'careto',
                'created_at' => '2019-01-23 15:56:05',
                'updated_at' => '2019-01-23 15:56:05',
            ),
            87 => 
            array (
                'id' => 93,
                'name' => 'final',
                'created_at' => '2019-01-23 15:59:04',
                'updated_at' => '2019-01-23 15:59:04',
            ),
            88 => 
            array (
                'id' => 94,
                'name' => 'alonso',
                'created_at' => '2019-01-23 15:59:23',
                'updated_at' => '2019-01-23 15:59:23',
            ),
            89 => 
            array (
                'id' => 95,
                'name' => 'burbuja',
                'created_at' => '2019-01-23 15:59:52',
                'updated_at' => '2019-01-23 15:59:52',
            ),
            90 => 
            array (
                'id' => 96,
                'name' => 'triste',
                'created_at' => '2019-01-23 16:00:10',
                'updated_at' => '2019-01-23 16:00:10',
            ),
            91 => 
            array (
                'id' => 97,
                'name' => 'policia',
                'created_at' => '2019-01-23 16:02:27',
                'updated_at' => '2019-01-23 16:02:27',
            ),
            92 => 
            array (
                'id' => 98,
                'name' => 'perro',
                'created_at' => '2019-01-23 16:02:47',
                'updated_at' => '2019-01-23 16:02:47',
            ),
            93 => 
            array (
                'id' => 99,
                'name' => 'pedo',
                'created_at' => '2019-01-23 16:03:04',
                'updated_at' => '2019-01-23 16:03:04',
            ),
            94 => 
            array (
                'id' => 100,
                'name' => 'smoke',
                'created_at' => '2019-01-23 16:03:29',
                'updated_at' => '2019-01-23 16:03:29',
            ),
            95 => 
            array (
                'id' => 101,
                'name' => 'fauno',
                'created_at' => '2019-01-23 16:03:43',
                'updated_at' => '2019-01-23 16:03:43',
            ),
            96 => 
            array (
                'id' => 102,
                'name' => 'girasol',
                'created_at' => '2019-01-23 16:04:31',
                'updated_at' => '2019-01-23 16:04:31',
            ),
            97 => 
            array (
                'id' => 103,
                'name' => 'moai',
                'created_at' => '2019-01-23 16:04:52',
                'updated_at' => '2019-01-23 16:04:52',
            ),
            98 => 
            array (
                'id' => 104,
                'name' => 'cerdo',
                'created_at' => '2019-01-23 16:05:09',
                'updated_at' => '2019-01-23 16:05:09',
            ),
            99 => 
            array (
                'id' => 105,
                'name' => 'peggy',
                'created_at' => '2019-01-23 16:05:15',
                'updated_at' => '2019-01-23 16:05:15',
            ),
            100 => 
            array (
                'id' => 106,
                'name' => 'hormiga',
                'created_at' => '2019-01-23 16:06:52',
                'updated_at' => '2019-01-23 16:06:52',
            ),
            101 => 
            array (
                'id' => 107,
                'name' => 'perseguido',
                'created_at' => '2019-01-23 16:07:12',
                'updated_at' => '2019-01-23 16:07:12',
            ),
            102 => 
            array (
                'id' => 108,
                'name' => 'cuentame',
                'created_at' => '2019-01-23 16:09:48',
                'updated_at' => '2019-01-23 16:09:48',
            ),
            103 => 
            array (
                'id' => 109,
                'name' => 'pirivuelta',
                'created_at' => '2019-01-23 16:10:09',
                'updated_at' => '2019-01-23 16:10:09',
            ),
            104 => 
            array (
                'id' => 110,
                'name' => 'puñetazo',
                'created_at' => '2019-01-23 16:11:49',
                'updated_at' => '2019-01-23 16:11:49',
            ),
            105 => 
            array (
                'id' => 111,
                'name' => 'desprecio',
                'created_at' => '2019-01-23 16:12:22',
                'updated_at' => '2019-01-23 16:12:22',
            ),
            106 => 
            array (
                'id' => 112,
                'name' => 'basura',
                'created_at' => '2019-01-23 16:13:04',
                'updated_at' => '2019-01-23 16:13:04',
            ),
            107 => 
            array (
                'id' => 113,
                'name' => 'romper',
                'created_at' => '2019-01-23 16:13:28',
                'updated_at' => '2019-01-23 16:13:28',
            ),
            108 => 
            array (
                'id' => 114,
                'name' => 'telefono',
                'created_at' => '2019-01-23 16:13:45',
                'updated_at' => '2019-01-23 16:13:45',
            ),
            109 => 
            array (
                'id' => 115,
                'name' => 'vago',
                'created_at' => '2019-01-23 16:14:06',
                'updated_at' => '2019-01-23 16:14:06',
            ),
            110 => 
            array (
                'id' => 116,
                'name' => 'teleñecos',
                'created_at' => '2019-01-23 16:15:15',
                'updated_at' => '2019-01-23 16:15:15',
            ),
            111 => 
            array (
                'id' => 117,
                'name' => 'linchamiento',
                'created_at' => '2019-01-23 16:15:42',
                'updated_at' => '2019-01-23 16:15:42',
            ),
        ));
        
        
    }
}