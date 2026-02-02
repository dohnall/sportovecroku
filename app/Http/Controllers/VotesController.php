<?php

namespace App\Http\Controllers;

use App\Mail\ValidationMail;
use App\Nomination;
use App\Votes;
use Illuminate\Support\Facades\Mail;

class VotesController extends Controller
{

    public static $groups = [
        1 => [
            'name' => 'Sportovní tým nad 18 let',
            'values' => [
                1 => [
                    'header' => 'SK Hostivař',
                    'description' => '<small>Fotbal</small><br>Úspěchy: 3 místo ve fotbalové lize',
                ],
                2 => [
                    'header' => 'Taneční klub Calipso',
                    'description' => '<small>Country tanec</small><br>Úspěchy: Mistrovství ČR a SR - 1. místo, MISTR ČR a SR tradiční country malá skupina, 2. místo tradiční country, 2. m. line dance, 2. m. pásmo, 3. m. acapella',
                ],
                3 => [
                    'header' => 'Golf Club Hostivař - extraligový tým mužů',
                    'description' => '<small>Golf</small><br>Úspěchy: 5. místo - Mistrovství ČR družstev mužů (Extraliga)',
                ],
                4 => [
                    'header' => 'SKBU Hostivař - tým kata muži',
                    'description' => '<small>Karate</small><br>Úspěchy: 1. místo Mistrovství Evropy JKA tým kata muži, 1. místo Mistrovství ČR JKA tým kata muži',
                ],
                5 => [
                    'header' => 'HBC Hostivař muži A',
                    'description' => '<small>Hokejbal</small><br>Úspěchy: Vítěz Českého poháru 2023 a podzimní mistr sezony 2023/2024 (1. místo v tabulce po polovině základní části Extraligy)',
                ],
            ],
        ],
        2 => [
            'name' => 'Sportovní tým do 18 let',
            'values' => [
                1 => [
                    'header' => 'SK Hostivař - ml. přípravka',
                    'description' => '<small>Fotbal</small><br>Úspěchy: 3 místo ve fotbalové lize',
                ],
                2 => [
                    'header' => 'Taneční klub Calipso',
                    'description' => '<small>Country tanec</small><br>Úspěchy: MČR do 18ti let - 2.místo Line Duet, 2. místo Line skupiny, 3. místo tradiční country',
                ],
                3 => [
                    'header' => 'Golf Club Hostivař - smíšené družstvo do 14 let',
                    'description' => '<small>Rugby</small><br>Úspěchy: 6. místo - Mistrovství ČR družstev mládeže do 14 let',
                ],
                4 => [
                    'header' => 'HOCKEY CLUB HOSTIVAŘ - družstvo starších žáků',
                    'description' => '<small>Pozemní hokej</small><br>Úspěchy: R. 2023 / 2. místo ČR pozemní hokej / 2. místo ČR halový pozemní hokej / 2. místo - mezinárodní turnaj BEE HAPPY - Itálie, Riva del Garda',
                ],
                5 => [
                    'header' => 'SK Triumf Praha - společná skladba dvojic a trojic nadějí mladších',
                    'description' => '<small>Moderní gymnastika</small><br>Úspěchy: 3.místo MČR Havířov, 1. místo Cena města Chomutova, 2.místo Mezinárodní závod Memoriál Hermy Jochovej Bratislava, 1. místo La Pirouette Mountain Cup',
                ],
            ],
        ],
        3 => [
            'name' => 'Jednotlivec nad 18 let',
            'values' => [
                1 => [
                    'header' => 'Jan Kripner',
                    'description' => '<small>TJ Pankrác (Praha) a SC Svitávka, Sálová cyklistika - kolová a krasojízda</small><br>Úspěchy: 3.místo Mistrovství Evropy U23 v kolové, 2.místo MČR ELITE kolová, 3. místo MČR U23 kolová,4.a5.místo Světový pohár, 2.místo MČR krasojízda dvojice',
                ],
                2 => [
                    'header' => 'Daniel Zámečník',
                    'description' => '<small>HBC Hostivař, hokejbal</small><br>Úspěchy: Juniorský mistr světa v kategorii do 18 let',
                ],
                3 => [
                    'header' => 'Magdalena Žůček',
                    'description' => '<small>SKBU Hostivař, karate JKA</small><br>Úspěchy: 1. místo Mistrovství světa WSKA kumite juniorky, 2. místo Mistrovství Evropy JKA kumite juniorky, 3. místo Mistrovství světa WSKA kumite ženy',
                ],
                4 => [
                    'header' => 'Jan Čejka',
                    'description' => '<small>HBC Hostivař, hokejbal</small><br>Úspěchy: vítěz kanadského bodování a nejlepší střelec extraligy za sezonu 2022/2023, aktuálně první v kanadském bodování a nejlepší střelec za podzimní část sezony 2023/2024, mistr světa kategorie U23, obecně považovaný za nejlepšího hokejbalistu v ČR',
                ],
            ],
        ],
        4 => [
            'name' => 'Jednotlivec do 18 let',
            'values' => [
                1 => [
                    'header' => 'Wanda Pencáková',
                    'description' => '<small>Doplnejch Powerlifting, silový trojboj</small><br>Úspěchy: 5. na MS (dřep), 7. na MS (trojboj) a 7. na ME (trojboj) mladších juniorek do 57 kg v silovém trojboji, 5× mistryně ČR 2023 v silovém trojboji mladších juniorek (absolutní pořadí, kategorie do 57 kg – celkově, dřep, benčpres, tah)',
                ],
                2 => [
                    'header' => 'Jan Semrád',
                    'description' => '<small>Taneční klub Calipso, clogging a country tance</small><br>Úspěchy: MČR do 18 ti let - Mistr ČR, 1. místo clogging sólo, 2. místo clogging freestyle',
                ],
                3 => [
                    'header' => 'Zuzana Rudová',
                    'description' => '<small>SKBU Hostivař, kickbox</small><br>Úspěchy: 1.misto mistrovství CR-kicklight, 1.misto KosaCup-kicklight, 3.misto Czech open-kicklight, 1.misto Czech fighting série-kicklight + K1, atd.',
                ],
                4 => [
                    'header' => 'Vojtěch Soukup',
                    'description' => '<small>HBC Hostivař, hokejbal</small><br>Úspěchy: Juniorský mistr světa v kategorii do 16 let',
                ],
                5 => [
                    'header' => 'Petr Lehner',
                    'description' => '<small>HBC Hostivař, hokejbal</small><br>Úspěchy: kapitán hokejbalových mistrů světa do 18 let a nejproduktivnější junior seniorské extraligy za podzimní část sezony 2023/2024',
                ],
                6 => [
                    'header' => 'Sofie Chramostová',
                    'description' => '<small>Golf Club Hostivař</small><br>Úspěchy: 3. místo v mládežnickém žebříčku České Golfové Federace v kategorii mladších žákyň',
                ],
                7 => [
                    'header' => 'Alžběta Kozlíková',
                    'description' => '<small>TJ Horní Měcholupy, oddíl karate</small><br>Úspěchy: 3. místo, kumite dorostenky -47kg, Mistrovství ČR mládeže karate Karlovy Vary, 2. 12. 2023',
                ],
                8 => [
                    'header' => 'Adam Šteiner',
                    'description' => '<small>HOCKEY CLUB HOSTIVAŘ - pozemní hokej</small><br>Úspěchy: Hráč HCH dorostenci, reprezentace ČR - U18 + U21 /  ME Wales U18 - Swansea - 1. místo + postup ČR do divize A',
                ],
                9 => [
                    'header' => 'Jiří Mikula',
                    'description' => '<small>SKBU Hostivař, karate JKA</small><br>Úspěchy: 1. místo Mistrovství Světa WSKA kumite tým kadeti, 1. místo Mistrovství ČR JKA kumite junioři',
                ],
                10 => [
                    'header' => 'Amálie Omáčková',
                    'description' => '<small>Judo Academy Praha</small><br>Úspěchy: Budapest cup - 2., Apolon open- 2., ČP Nový Bydžov - 2., ČP Jablonec - 1., Polsko, Opole - 3., Přebor Prahy - 1., MČR družstev 3., MČR jednotlivci 1.',
                ],
                11 => [
                    'header' => 'Jan Šilhavý',
                    'description' => '<small>Dragon fight gym, kickbox</small><br>Úspěchy: 1. místo Mistrovství ČR Praha lightcontact, 2. místo Mistrovství ČR Praha kicklight, 1. místo German open Německo kicklight, 1. místo German open Německo lightcontact, 2. místo Bregenz open Rakousko kicklight, 1. místo Kosa cup Praha kicklight, 1. místo Národní pohár Praha kicklight, 1. místo Czech fighting series Písek kicklight, 1. místo Czech fighting series Písek lightcontact, 1. místo Liga mládeže Praha kicklight, 2. místo Liga mládeže Praha lightcontact, 2. místo Czech fighting series Chomutov lightcontact',
                ],
            ],
        ],
        5 => [
            'name' => 'Trenér roku',
            'values' => [
                1 => [
                    'header' => 'Jan Penc',
                    'description' => '<small>SK Hostivař, fotbal</small><br>Úspěchy: 3 místo ve fotbalové lize',
                ],
                2 => [
                    'header' => 'Jakub Žák',
                    'description' => '<small>TK Calipso, country tance a clogging</small><br>Úspěchy: Mistrovství ČR a SR - 1. m, MISTR ČR a SR tradiční country, 2. m.tradiční country, 2. m. line dance, 2. m. pásmo, 3. m. acapella MČR do 18ti - 2.m. 2x',
                ],
                3 => [
                    'header' => 'Jan Hrsina',
                    'description' => '<small>SKBU Hostivař, kickbox</small><br>Úspěchy: Dovedl starší žákyni k několika zlatým medailím',
                ],
                4 => [
                    'header' => 'František Rozhon',
                    'description' => '<small>HOCKEY CLUB HOSTIVAŘ - pozemní hokej</small><br>Úspěchy: 1. místo tým ČR - ME Wales U18 - Swansea  + postup ČR do divize A',
                ],
                5 => [
                    'header' => 'Lenka Hyblerová Oulehlová',
                    'description' => '<small>SK Triumf Praha, moderní gymnastika</small><br>Úspěchy: E. Bubeníčková Přebornice Prahy, D. Dieva 3.místo Pirueta Cup Chorvatsko, J. Matoušková Přebornice Prahy, juniorské týmy dvojic 2.a 3. místo Přebor P.',
                ],
                6 => [
                    'header' => 'Ondřej Novák',
                    'description' => '<small>HBC Hostivař, hokejbal</small><br>Úspěchy: šéftrenér mládeže HBC Hostivař, která patří mezi absolutní špičku ČR - na juniorském MS v Liberci 2023 v kategoriích U16, U18, U20 a U23 měl klub celkem 16 zástupců. Všichni prošli postupně trenérským vedením Ondřeje Nováka',
                ],
                7 => [
                    'header' => 'Michal Strnad',
                    'description' => '<small>Dragon fight gym</small><br>Úspěchy: na mistrovství ČR vybojovali závodníci Dragon fight gymu - 3x zlato, 2x stříbro, 3x bronz; v roce 2023 vybojovali závodníci Dragon fight gymu 140 zápasů s bilancí 83 výher a 57 proher',
                ],
            ],
        ],
    ];

    public static $results = [
        2019 => [
            1 => [
                'name' => 'Sportovní tým nad 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- SKBU Hostivař "Kata tým - muži"',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- HBC Hostivař "Muži"',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- Sportovní družstvo SDH Horní Měcholupy "Muži"',
                    ],
                ],
            ],
            2 => [
                'name' => 'Sportovní tým do 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- SKBU Hostivař "Kata tým - dívky"',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- HBC Hostivař "Dorost"',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- HC Hostivař "Dorostenky"',
                    ],
                ],
            ],
            3 => [
                'name' => 'Jednotlivec nad 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Daniel Beneš',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- Jiří Vaniš ml.',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- Vladimír Sklenář',
                    ],
                ],
            ],
            4 => [
                'name' => 'Jednotlivec do 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Oliver Simon',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- Jan Čejka',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- Kateřina Aulická',
                    ],
                ],
            ],
            5 => [
                'name' => 'Trenér roku',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Karel Strnad',
                    ],
                ],
            ],
        ],
        2020 => [
            1 => [
                'name' => 'Sportovní tým nad 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- HC Hostivař "Ženy" (Pozemní hokej)',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- Sportovní družstvo SDH Horní Měcholupy "Muži" (Požární sport)',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- HBC Hostivař "A tým" (Hokejbal)',
                    ],
                ],
            ],
            2 => [
                'name' => 'Sportovní tým do 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- HC Hostivař "Dorostenky" (Pozemní hokej)',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- HBC Hostivař "Dorost" (Hokejbal)',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- SK Hostivař "2012 - Mladší přípravka" (Fotbal)',
                    ],
                ],
            ],
            3 => [
                'name' => 'Jednotlivec nad 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Hubínek Jiří (Horská kola - sjezd)',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- Sklenář Vladimír (Terénní triatlon)',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- Růžička Josef (Rugby)',
                    ],
                ],
            ],
            4 => [
                'name' => 'Jednotlivec do 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Šafaříková Kristýna (Pozemní hokej)',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- Kolář Vít (Zápas - volný styl)',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- Omáčková Amálie (Judo)',
                    ],
                ],
            ],
            5 => [
                'name' => 'Senior 60+',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Vltavský Zdeněk (Tenis)',
                    ],
                ],
            ],
            6 => [
                'name' => 'Trenér roku',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Hlaváč Libor (Pozemní hokej)',
                    ],
                ],
            ],
        ],
        2021 => [
            1 => [
                'name' => 'Nejoblíbenější sport',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Pozemní hokej',
                    ],
/*
                    2 => [
                        'header' => '2. místo',
                        'description' => '- Hokejbal',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- Moderní gymnastika',
                    ],
*/
                ],
            ],
            2 => [
                'name' => 'Trenér roku',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Petra Brabcová (Pozemní hokej)',
                    ],
/*
                    2 => [
                        'header' => '2. místo',
                        'description' => '- Jiří Vaniš (Hokejbal)',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- Blanka Chuchlerová (Moderní gymnastika)',
                    ],
*/
                ],
            ],
        ],
        2022 => [
            1 => [
                'name' => 'Sportovní tým do 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Rugby klub Petrovice U16 (rugby)',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- Taehan Praha – Hana Lee/Michaela Baštecká/Julie Šlesingerová (taekwondo)',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- HBC Hostivař – junioři (hokejbal)',
                    ],
                ],
            ],
            2 => [
                'name' => 'Sportovní tým nad 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Rugby klub Petrovice (rugby)',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- Taneční klub Calipso (country tanec)',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- HBC Hostivař – muži A (hokejbal)',
                    ],
                ],
            ],
            3 => [
                'name' => 'Jednotlivec do 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Karásková Linda, sportovní cheerleading, (JNS Cheerleaders)',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- Stříbrská Zuzana, mažoretkový sport, (Bailar Praha)',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- Omáčková Amálie, judo, (Judo Academy)',
                    ],
                ],
            ],
            4 => [
                'name' => 'Jednotlivec nad 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Hájková Judita, taekwondo, (Taehan Praha)',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- Hubínek Jiří, biker – freerider (Val di Botič)',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- Čejka Jan, hokejbal, (HBC Hostivař)',
                    ],
                ],
            ],
            5 => [
                'name' => 'Trenér roku kolektivní sporty',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Žák Jakub, country tanec, (Taneční klub Calipso)',
                    ],
                ],
            ],
            6 => [
                'name' => 'Trenér roku individuální sporty',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Youjae Lee, taekwondo, (Taehan Praha)',
                    ],
                ],
            ],
        ],
        2023 => [
            1 => [
                'name' => 'Sportovní tým nad 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- HBC Hostivař muži A (hokejbal)',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- Taneční klub Calipso (country tanec)',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- SKBU Hostivař – tým kata muži (karate)',
                    ],
                ],
            ],
            2 => [
                'name' => 'Sportovní tým do 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Taneční klub Calipso (country tanec)',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- SK Triumf Praha – společná skladba dvojic a trojic nadějí mladších (moderní gymnastika)',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- HOCKEY CLUB HOSTIVAŘ – družstvo starších žáků (pozemní hokej)',
                    ],
                ],
            ],
            3 => [
                'name' => 'Jednotlivec nad 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Magdalena Žůček (karate JKA)',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- Jan Čejka (hokejbal)',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- Jan Kripner (sálová cyklistika - kolová a krasojízda)',
                    ],
                ],
            ],
            4 => [
                'name' => 'Jednotlivec do 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Jan Semrád (clogging a country tance)',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- Amálie Omáčková (judo)',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- Jan Šilhavý (kickbox)',
                    ],
                ],
            ],
            5 => [
                'name' => 'Trenér roku',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Jakub Žák (TK Calipso)',
                    ],
                ],
            ],
        ],
        2024 => [
            1 => [
                'name' => 'Sportovní tým nad 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Kata team muži -  SKBU Hostivař, karate',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- A tým - HBC Hostivař',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- Country tance a clogging - Taneční klub Calipso',
                    ],
                ],
            ],
            2 => [
                'name' => 'Sportovní tým do 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Tým mladší žáci – Hockey Club Hostivař',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- Společná skladba v MG, naděje nejmladší - TJ ZŠ Hostivař Praha, moderní gymnastika',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- Country tance a clogging - Taneční club Calipso',
                    ],
                ],
            ],
            3 => [
                'name' => 'Jednotlivec nad 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Magdalena Anne Žůček – SKBU Hostivař',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- Jan Čejka – HBC Hostivař',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- Sára Štěpánová - Penta gym Praha, Brazilské jiu-jitsu',
                    ],
                ],
            ],
            4 => [
                'name' => 'Jednotlivec do 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Jiří Mikula – SKBU Hostivař',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- Lenka Hurníková – SKBU Hostivař',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- Adam Duda – TK Horní Měcholupy',
                    ],
                ],
            ],
            5 => [
                'name' => 'Trenér roku',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Vladimír Limburský – SKBU Hostivař',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- David Lachout a Jakub Chabr – HC Hostivař – pozemní hokej',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- Younjae Lee – TAEHAN PRAHA-WORLD TAEKWONDO',
                    ],
                ],
            ],
        ],
        2025 => [
            1 => [
                'name' => 'Sportovní tým nad 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- SKBU Hostivař, karate',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- HBC Hostivař',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- Green Force One – Fighters Cheerleaders',
                    ],
                ],
            ],
            2 => [
                'name' => 'Sportovní tým do 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- SKBU Hostivař',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- Golf Club Hostivař U14',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- TK Calipso',
                    ],
                ],
            ],
            3 => [
                'name' => 'Jednotlivec nad 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Hana Lee',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- Jan Čejka',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- Sára Štěpánová, Magdalena Anne Žůček',
                    ],
                ],
            ],
            4 => [
                'name' => 'Jednotlivec do 18 let',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Matěj Havlík (HBC Hostivař)',
                    ],
                    2 => [
                        'header' => '2. místo',
                        'description' => '- Eliška Šestáková (HC Hostivař)',
                    ],
                    3 => [
                        'header' => '3. místo',
                        'description' => '- Adam Duda',
                    ],
                ],
            ],
            5 => [
                'name' => 'Trenér roku',
                'values' => [
                    1 => [
                        'header' => '1. místo',
                        'description' => '- Youn Jae Lee',
                    ],
                ],
            ],
        ],
    ];

    public static $gallery = [
        2019 => [
            '19' => 'Karol Dobiaš, Antonín Eis, Antonín Panenka, Milan Wenzl a Ivan Grégr.',
            '14' => 'První místo v kategorii Jednotlivec do 18 let - Oliver Simon, SKBU Hostivař, cenu předal Ivan Grégr, fotbalový rozhodčí.',
            '10' => 'Sál KC Varta zaplnili nominovaní sportovci a hosté.',
            '01' => 'Zpěvák Zbyněk Drda.',
            '02' => 'Zpěvačka Naďa Válová potěšila svým vystoupením.',
            '03' => 'Všichni jsou připraveni k předání ocenění v prvním ročníku Sportovce roku MČ Praha 15.',
            '04' => 'Třetí místo v kategorii Sportovní tým nad 18 let – SDH Horní Měcholupy – muži, cenu předal Mgr. Aleš Cejnar, tajemník ÚMČ Praha 15.',
            '05' => 'Třetí místo v kategorii Jednotlivec nad 18 let – Vladimír Sklenář, XCT sport Hospůdka Karolína, cenu předal Michal Fischer, místostarosta MČ Praha 15.',
            '06' => 'Třetí místo v kategorii Jednotlivec do 18 let – Kateřina Aulická, SDH Horní Měcholupy, cenu předal Martin Kaucký, kreativní ředitel MooDesign s.r.o.',
            '07' => 'Třetí místo Sportovní tým do 18 let – HC Hostivař dorostenky, cenu předal Viliam Sivek, výkonný ředitel Sivek Hotels.',
            '08' => 'Trenér roku Karel Strnad SKBU Hostivař, cenu převzal Vladimír Limburský, vedoucí družstva, cenu předala Lucie Prinzová, předsedkyně Výboru ZMČ Praha 15.',
            '09' => 'Slavnostní fanfára v podání ZUŠ Hostivař.',
            '11' => 'První místo v kategorii Sportovní tým nad 18 let, SKBU Hostivař Kata tým muži, cenu předal Milan Wenzl, starosta MČ Praha 15.',
            '12' => 'První místo v kategorii Sportovní tým do 18 let – SKBU Hostivař Kata tým dívky, cenu předal Karol Dobiaš, fotbalový internacionál.',
            '13' => 'První místo v kategorii Jednotlivec nad 18 let – Daniel Beneš, SKBU Hostivař, cenu předal Antonín Panenka, fotbalový internacionál.',
            '15' => 'Napětí mezi nominovanými bylo znát.',
            '16' => 'Moderátoři večera Marie Retková a Zdeněk Vrba.',
            '17' => 'Mistři Evropy v juniorské kategorii, jak jinak než z SKBU Hostivař.',
            '18' => 'Kata v podání mistrů Evropy juniorů, SKBU Hostivař.',
            '20' => 'Druhé místo v kategorii Sportovní tým nad 18 let, HBC Hostivař – muži, cenu předala Mgr. Jitka Kolářová, místostarostka MČ Praha 15.',
            '21' => 'Druhé místo v kategorii Sportovní tým do 18 let – HBC Hostivař dorost, cenu předala Mgr. Zuzana Herčíková, vedoucí ekonomického odboru ÚMČ Praha 15.',
            '22' => 'Druhé místo v kategorii Jednotlivec nad 18 let – Jiří Vaniš ml, HBC Hostivař, cenu předala Jaroslava Šimonová, vedoucí odboru školství, ÚMČ Praha 15.',
            '23' => 'Druhé místo v kategorii Jednotlivec do 18 let – Jan Čejka, HBC Hostivař, cenu předala Naďa Válová, zpěvačka.',
        ],
        2020 => [
            '02' => 'Trofeje jsou vyrobeny ze skla, dřeva a železa.',
            '05' => 'HC Hostivař - pozemní hokej ovládl Sportovce roku 2020  Městské části Praha 15.',
            '08' => '1. místo v kategorii Jednotlivec nad 18 let - Jiří Hubínek (Val di Botič) horská kola - sjezd.',
            '01' => 'Trofeje jsou připraveny k předání.',
            '03' => 'Ocenění pro Sportovce 60+.',
            '04' => 'Ocenění pro Trenéra roku.',
            '06' => 'Vítěz kategorie Sportovec 60+   - Zdeněk Vltavský.',
            '07' => 'Vítěz kategorie Trenér roku - Libor Hlaváč (HC Hostivař) pozemní hokej.',
            '09' => '2. místo v kategorii Jednotlivec nad 18 let - Vladimír Sklenář (XCT Sport Hospůdka Karolína) trénní triatlon.',
            '10' => '3. místo v kategorii Jednotlivec nad 18 let - Josef Růžička (Rugby Club Petrovice - Old boys) rugby.',
            '11' => '1. místo v kategorii Jednotlivec do 18 let - Kristýna Šafaříková (HC Hostivař) pozemní hokej.',
            '12' => '2. místo v kategorii Jednotlivec do 18 let - Vít Kolář (KZ Bohemians Praha) zápas - volný styl.',
            '13' => '3. místo v kategorii Jednotlivec do 18 let - Amálie Omáčková (Judo Academy Praha) judo.',
            '14' => '1. místo v kategorii Tým do 18 let - Dorostenky (HC Hostivař) pozemní hokej.',
            '15' => '2. místo v kategorii Tým do 18 let - Dorost (HBC Hostivař) a 3. místo v kategorii Tým nad 18 let - A tým (HBC Hostivař) hokejbal.',
            '16' => '3. místo v kategorii Tým do 18 let - Mladší přípravka 2012 (SK Hostivař) fotbal.',
            '17' => '1. místo v kategorii Tým nad 18 let - Ženy (HC Hostivař) pozemní hokej.',
            '18' => '2.místo v kategorii Sportovní tým nad 18 - Muži(Sportovní družstvo SDH Horní Měcholupy) požární sport.',
        ],
        2021 => [
            '01' => 'Petra Brabcová (Pozemní hokej)',
        ],
        2022 => [
            '01' => '',
            '02' => '',
            '03' => '',
            '04' => '',
            '05' => '',
            '06' => '',
            '07' => '',
            '08' => '',
            '09' => '',
            '10' => '',
            '11' => '',
            '12' => '',
            '13' => '',
            '14' => '',
            '15' => '',
            '16' => '',
            '17' => '',
            '18' => '',
            '19' => '',
            '20' => '',
            '21' => '',
            '22' => '',
            '23' => '',
            '24' => '',
            '25' => '',
            '26' => '',
            '27' => '',
            '28' => '',
        ],
        2023 => [
            '01' => '',
            '02' => '',
            '03' => '',
            '04' => '',
            '05' => '',
            '06' => '',
            '07' => '',
            '08' => '',
            '09' => '',
            '10' => '',
            '11' => '',
            '12' => '',
            '13' => '',
            '14' => '',
            '15' => '',
            '16' => '',
            '17' => '',
            '18' => '',
            '19' => '',
        ],
        2024 => [
            '01' => '',
            '02' => '',
            '03' => '',
            '04' => '',
            '05' => '',
            '06' => '',
            '07' => '',
            '08' => '',
            '09' => '',
            '10' => '',
            '11' => '',
            '12' => '',
            '13' => '',
        ],
        2025 => [

        ],
    ];

    public static $nominations = [
        1 => [
            'name' => 'Sportovní tým nad 18 let',
            'values' => [
                1 => [
                    'header' => 'Green Force One - Fighters Cheerleaders',
                    'description' => '- International Cheerleading Cup 2025 - světový pohár v USA 2. místo; Mistři ČR 1místo v nejvyšší výkonnostní kategorie L6',
                ],
                2 => [
                    'header' => 'HBC Hostivař - muži A - Hokejbal',
                    'description' => '- Mistři ČR pro sezónu 2024/25',
                ],
                3 => [
                    'header' => 'VZS Praha 15 - VZS',
                    'description' => '- úspěchy v závodech v rámci republiky',
                ],
                4 => [
                    'header' => 'TK Calipso - tanec - country tance, clogging (step)',
                    'description' => '- Mezinárodní taneční festival Československý Country Saloon - 3x 1. místo a 3x titul Mistr ČR (Country tance, Country tance malá skupina, Taneční výzva), 2x 2. místo (clogging acapella, line dance), Mistrovství České republiky - 2x 1. místo (Tradiční country tance, Tradiční country tance malá skupina), 2. místo (Clogging acapella), 3. místo (Tradiční country tance)',
                ],
                5 => [
                    'header' => 'HBC Hostivař - Hokejbal',
                    'description' => '- Titul Mistrů ČR',
                ],
                6 => [
                    'header' => 'Kata tým senioři - Daniel Beneš, Lukáš Adam, Daniel Matoušek - SKBU Hostivař',
                    'description' => '- 1. místo ME JKA kata tým senioři; 1. místo MČR JKA - kata tým senioři',
                ],
            ],
        ],
        2 => [
            'name' => 'Sportovní tým do 18 let',
            'values' => [
                1 => [
                    'header' => 'Golf Club Hostivař U14',
                    'description' => '- 1. místo na Mistrovství ČR družstev do 14 let',
                ],
                2 => [
                    'header' => 'Společná skladba v MG, naděje mladší - TJ ZŠ Hostivař Praha,moderní gymnastika',
                    'description' => '- 2.místo na přeboru Prahy, vítězky pohárových soutěží ve společných skladbách v roce 2025, 4.místo na MČR ve společných skladbách kategorie naděje mladší, skladba s obručemi, složení týmu: Svatková Johana, Hartmannová Johanka, Kellnerová Michelle, Mázdrová Viktorie, Krasnová Elizaveta, Štěpánová Julie',
                ],
                3 => [
                    'header' => 'Green Goblinz - Fighters Cheerleaders',
                    'description' => '- Varsity Chemnitz Summer All Level Championship 2025',
                ],
                4 => [
                    'header' => 'HBC Hostivař - starší žáci - Hokejbal',
                    'description' => '- Vítěz regionální ligy Čechy - střed a sever pro sezónu 2024/25, 4.místo na mistrovství ČR',
                ],
                5 => [
                    'header' => 'Spolek VZS Praha 15 - livestyling',
                    'description' => '- František Bělohlav, úspěchy v republikových závodech, účast na ME Polsko 2025',
                ],
                6 => [
                    'header' => 'TK Calipso Praha - tanec - country tance, clogging (step)',
                    'description' => '- Mistrovství České republiky - 3x 1. místo a 3x titul Mistr ČR (Clogging skupina, Clogging Acapella, Tradiční country malá skupina), 2x 2. místo (Line dance, Line dance dueta), 3 místo (Line dance dueta)',
                ],
                7 => [
                    'header' => 'Dorostenci - HC Hostivař, pozemní hokej',
                    'description' => '- 2. místo v ČR, nyní na 1. místě v tabulce. Dlouhodobě velmi, kvalitní tým nejen po herní stránce, ale i svým nasazením při pomoci klubu.',
                ],
                8 => [
                    'header' => 'SKBU Hostivař - Národní Liga karate JKA ',
                    'description' => '- 1. místo Národní liga Karate JKA',
                ],
            ],
        ],
        3 => [
            'name' => 'Jednotlivec nad 18 let',
            'values' => [
                1 => [
                    'header' => 'Kateřina Šmolíková - Golf Club Hostivař',
                    'description' => '- Mistryně klubu ve hře na rány, Mistryně klubu ve hře na jamky, Vítězka Poháru mistrů klubů',
                ],
                2 => [
                    'header' => 'Sára Štěpánová - Penta gym Praha, Brazilské jiu-jitsu',
                    'description' => '- 1. místo na ADCC Amatérském mistrovství světa v kategorii pokročilých do 55 kg, 1. místo na evropském šampionátu NAGA v kategorii expert do 60 kg a 2. místo v kategorii expert bez omezení hmotnosti, 1. místo na mistrovství Evropy SOLT v kategorii modrých pásů do 55 kg a 3. místo v kategorii fialových pásů do 55 kg.',
                ],
                3 => [
                    'header' => 'Matěj Roch - Fighters Cheerleaders',
                    'description' => '- Člen Green Force One - International Cheerleading Cup 2025 - světový pohár v USA 2.místo, Mistři ČR 2025, 1. Místo v nejvyšší výkonnostní kategorii Muž roku 2024, sportovec roku',
                ],
                4 => [
                    'header' => 'Jan Čejka - HBC Hostivař, hokejbal',
                    'description' => '- Juniorský mistr světa v hokejbalu v kategorii do 23 let, mistr ČR, vítěz kanadského bodování základní části i play-off extraligy hokejbalu',
                ],
                5 => [
                    'header' => 'Markéta Zelenková - TK Calipso Praha',
                    'description' => '- 1 stříbrná medaile na MČR dospělých, účastní se country festivalů',
                ],
                6 => [
                    'header' => 'Hana Lee - TAEHAN Praha - klub korejských bojových umění, z.s., Taekwondo WT - Poomsae',
                    'description' => '- Mistryně ČR v poomsae 2025, Celková vítězka Extraligy poomsae 2025, členka vítězného týmu Extraligy Poomsae 2025 Taehan, 5. místo na G1 turnaji Bulgaria Open 2025, nominačním turnaji na ME , 9. místo na ME v Tallinu 2025, 34. místo z 901 ve světovém žebříčku U30 (zlepšení pozice o 300 míst), 1. mezi Češkami',
                ],
                7 => [
                    'header' => 'Michal Mikšovský - HBC Hostivař',
                    'description' => '- Řada úspěchů v týmech HBC Hostivař, včetně důležitých gólů za A-tým v extralize a role klíčového hráče v juniorských týmech (např hattricky).',
                ],
                8 => [
                    'header' => 'František Ebr - HC Hostivař, pozemní hokej',
                    'description' => '- 2. místo s dorostem, nyní s muži na 3. místě v tabulce, Dlouhodobě v reprezentaci, nyní součástí reprezentace do 21 let. Navíc napomáhá rozvoji mladších brankářů v klubu, jak svými tréninky, tak pomocí ostatním trenérům.',
                ],
                9 => [
                    'header' => 'Daniel Beneš - SKBU Hostivař',
                    'description' => '- 1. místo ME JKA kata senioři, 3. místo MS WSKA kata senioři, 1. místo MČR JKA kata senioři',
                ],
                10 => [
                    'header' => 'Šimon Lev - SKBU Hostivař',
                    'description' => '- 3. místo ME JKA kumite senioři, 1. místo MS WSKA kumite senioři, 3. místo MČR JKA kumite senioři',
                ],
                11 => [
                    'header' => 'Magdalena Anne Žůček - SKBU Hostivař',
                    'description' => '- 1. místo ME JKA kumite seniorky, 2. místo MS WSKA kumite seniorky, 1. místo MČR JKA kumite seniorky',
                ],
                12 => [
                    'header' => 'Jiří Mikula - SKBU Hostivař',
                    'description' => '- 1. místo ME JKA kumite junioři, 1. místo MS WSKA kumite junioři',
                ],
            ],
        ],
        4 => [
            'name' => 'Jednotlivec do 18 let',
            'values' => [
                1 => [
                    'header' => 'Sofie Chramostová - Golf Club Hostivař',
                    'description' => '- 2. místo na NMČR žáků a kadetů v kategorii žákyň, 1. na mládežnickém žebříčku mladších žákyň, členka vítězného družstva do 14 let, zlatá a stříbrná medaile z Národní golfové tour mládeže, stříbrná medaile na NMČR, 3. na Evropském šamionátu US Kids ve Skotsku, vítězka slovenského juniorského mistrovství',
                ],
                2 => [
                    'header' => 'David Vokřál - SkASC, plavání',
                    'description' => '- Rok 2025 Letní MČR:  10.misto v disciplíně 50vz, 10.misto 100znak, 10.misto 200znak., Krajský přebor Prahy, listopad 2025: 1.misto 50vz, 1.misto 100znak, 1.misto 200znak, 1. Místo 100poloha, 1.misto 100motylek, 2.misto 100vz, 3.misto 200vz',
                ],
                3 => [
                    'header' => 'Viktorie Mázdrová - TJ ZŠ Hostivař, moderní gymnastika',
                    'description' => '- Přebornice Prahy v kategorii naděje mladší, 2.místo na MČR v kategorii naděje mladší ve víceboji, 1.místo v sestavě bez náčiní, 2.místo na MČR se švihadlem v kategorii naděje mladší - jednotlivkyně ročník 2015',
                ],
                4 => [
                    'header' => 'David Weiner - Fighters Cheerleaders',
                    'description' => '- 2. místo na MČR 2025 v kategorii Youth Coed Median L3 s týmem Knights of Smash',
                ],
                5 => [
                    'header' => 'Matěj Havlík - HBC Hostivař, hokejbal',
                    'description' => '- Juniorský mistr světa v kategorii do 16 let',
                ],
                6 => [
                    'header' => 'František Bělohlav - VZS-vodní záchranná služba',
                    'description' => '- účast na ME 2025 v Polsku, výrazné úspěchy v republikových závodech v disciplínách vodní záchrany',
                ],
                7 => [
                    'header' => 'Marie Bělohlavová - VZS Praha 15',
                    'description' => '- úspěchy v republikových závodech včetně mistrovských',
                ],
                8 => [
                    'header' => 'Nikola Janečková - AC Sparta Praha, fotbal',
                    'description' => '- KAPITÁNKA A ZÁLOŽNÍK TÝMU WU13',
                ],
                9 => [
                    'header' => 'Radka Zelenková - TK Calipso',
                    'description' => '- 1 zlatá medaile, 1 stříbrná a 1 bronzová na MČR do 18. let, účastní se country festivalů',
                ],
                10 => [
                    'header' => 'Irena Lee - TAEHAN Praha - klub korejských bojových umění, z.s., Taekwondo WT - Poomsae',
                    'description' => '- Mistryně ČR v poomsae 2025, Celková vítězka Extraligy poomsae 2025, členka vítězného týmu Extraligy Poomsae 2025 Taehan, 5. místo na G1 turnaji Bulgaria Open 2025, nominačním turnaji na ME, 5. místo na ME v Tallinu 2025',
                ],
                11 => [
                    'header' => 'Sami Kriaa - TAEHAN Praha - klub korejských bojových umění, z.s., Taekwondo WT - Poomsae',
                    'description' => '- Mistr ČR v poomsae 2025, Celkový vítěz Extraligy poomsae za rok 2025, 1. místo v 1. kole Extraligy Poomsae 2025, 2. místo v 2. kole Extraligy 2025, 1. místo ve 4. kole Extraligy 2025, 1. místo v 6. kole Extraligy 2025, 3. místo na Yellow Sea Cup v Budapešti 2025',
                ],
                12 => [
                    'header' => 'Tereza Kovalová - TK Calipso, tanec - country tance, clogging (step)',
                    'description' => '- Mistrovství ČR - Mistr ČR, 1. místo clogging sólo, Mistr ČR, 1. místo clogging dueta, Mistr ČR, 1. místo clogging acapella sólo, 3. místo Line dance dueta',
                ],
                13 => [
                    'header' => 'Petr Svoboda - HBC Hostivař',
                    'description' => '- Petr Svoboda byl v roce 2025 nominován za své úspěchy v mládežnickém hokejbalu - starší žáci. Pravidelně sbíral body (góly, asistence). Účast v klíčových zápasech.',
                ],
                14 => [
                    'header' => 'Jonáš Schejbal - Klub amerického fotbalu Prague Lions, americký fotbal',
                    'description' => '- Juniorský mistr ČR, vítěz 1. juniorské ligy Junior Bowl XXV s týmem Prague Lions, Bronzová medaile z Mistrovství Evropy U15/U17 ve flag fotbalu v Innsbrucku v Rakousku s národním týmem ČR U17 chlapci',
                ],
                15 => [
                    'header' => 'Eliška Šestáková - HC Hostivař, pozemní hokej',
                    'description' => '- 3. místo na ME, vyhlášena nejlepší brankářkou turnaje. Dlouhodobě působí v reprezentaci a nyní je součástí týmu U18 i U21.',
                ],
                16 => [
                    'header' => 'Tomáš Kučera - SKBU Hostivař',
                    'description' => '- 3. místo MČR JKA - kumite st. Dorostenci',
                ],
                17 => [
                    'header' => 'Adam Duda',
                    'description' => '- tenis: člen Juniorské reprezentace České republiky v tenisu, vítěz čtyřhry na mezinárodním turnaji ITF v Humenném, 2. místo ve dvouhře na mezinárodním turnaji ITF Prague Open v Měcholupech, 2. místo ve čtyřhře na mezinárodním turnaji ITF Prague Open v Měcholupech, 3. místo ve dvouhře na mezinárodním turnaji ITF v Liberci, 3. místo ve čtyřhře na mezinárodním turnaji ITF v Liberci, 3. místo ve čtyřhře na mezinárodním turnaji ITF v Hradci Králové. Zcela výjimečným počinem je také skutečnost, že Adam v roce 2025 úspěšně vstoupil do soutěží ATP. V současné době je nejmladším českým hráčem, který figuruje v mezinárodním žebříčku ATP, což potvrzuje jeho mimořádný talent a perspektivu do budoucna. Je rovněž úspěšným hráčem pickleballu. Jako člen Pickleball Klubu Horní Měcholupy v roce 2025: zvítězil na Mistrovství České republiky juniorů v kategorii dvouhra, zvítězil na Mistrovství České republiky juniorů v kategorii čtyřhra.',
                ],
                18 => [
                    'header' => 'Šimon Pecháč',
                    'description' => '- Reprezentoval ČR  na následujících zahraničních závodech: Alpecimbra FIS children cup 2025 - se umístil ve slalomu na 15.místě a v  obřím slalomu na 19.místě, Abetone FIS Childern  -  se umístil na 4.místě ve slalomu, Skiinterkriterium 2025 -  v obřím slalomu 5.místo a ve slalomu 3.místo, Zimní olympiáda dětí a mládeže -  ve slalomu na 4.místě a v obřím slalomu na 4.místě, Český pohár žactva 2025 - v celkovém pořadí na 3.místě, Mistrovství České republiky 2025 -  2. místo ve slalomu, O STYLE CUP  2025  -  2.místo.',
                ],
            ],
        ],
        5 => [
            'name' => 'Trenér roku',
            'values' => [
                1 => [
                    'header' => 'Roman Chudoba - Golf Club Hostivař',
                    'description' => '- 1. místo na Mistrovství ČR družstev do 14 let',
                ],
                2 => [
                    'header' => 'Jitka Hartmannová - TJ ZŠ Hostivař, moderní gymnastika',
                    'description' => '- Viktorie Mázdrová - jednotlivkyně, 2.místo na MČR naděje mladší, 1.místo MČR finále bez náčiní, 2.místo MČR finále se švihadlem, Přebornice Prahy, kategorie naděje mladší, Krasnová Elizaveta - jednotlivkyně, naděje mladší 3.místo MČR finále bez náčiní, 3.místo MČR finále se švihadlem, Přebornice Prahy, kategorie naděje mladší, Fotevová Valerie - jednotlivkyně, seniorka, 4.místo na MČR v mistrovské třídě, 3.místo ve finále MČR s obručí, 3.místo ve finále MČR se stuhou, Společná skladba naděje mladší, skladba s obručemi, 2.místo na přeboru Prahy, 4.místo na MČR ve společných skladbách kategorii naděje mladší, Dlouholetá aktivní práce v oddíle moderní gymnastiky TJ ZŠ Hostivař.',
                ],
                3 => [
                    'header' => 'Radovan Slavík - Fighters Cheerleaders',
                    'description' => '- Hlavní trenér Fighters Cheerleaders, trenér Green Force One úspěšného na International Cheerleading Cup 2025 - světový pohár v USA 2. místo, Mistři ČR 1.místo v nejvyšší výkonnostní kategorie L6',
                ],
                4 => [
                    'header' => 'Jan Krtička - HBC Hostivař, hokejbal',
                    'description' => '- Trenér týmu mužů HBC Hostivař, mistrů ČR pro sezónu 2024/25',
                ],
                5 => [
                    'header' => 'Youn Jae Lee - TAEHAN Praha - klub korejských bojových umění, z.s., Taekwondo WT - Poomsae',
                    'description' => '- Trenér taekwondo klubu Taehan Praha, celkového vítěze Národní ligy i Extraligy Poomsae 2025, Trenér klubu, který je celkový vítěz v Národní taekwondo lize 2025 - sportovní zápas, Trenér jediného klubu v ČR, který má 3 celková vítězství za rok 2025, Coach Národního týmu taekwondo poomsae',
                ],
                6 => [
                    'header' => 'Jakub Žák - tanec - country tance, clogging (step)',
                    'description' => '- Mistrovství ČR - 6x titul Mistr ČR (Clogging skupina, Clogging acapella skupina, Tradiční country malá skupina, Clogging sólo, Clogging dueta, Clogging acapella), 5x 1. místo Clogging skupina, Clogging acapella skupina, Tradiční country malá skupina, Tradiční country, Tradiční country malá skupina), 5x 2. místo (Line dance, Line dance dueta, Clogging Acapella, Clogging sólo, Clogging Acapella sólo), 2x 3. místo (Line dance dueta, Tradiční country), Mezinárodní taneční festival Československý country salon - 3x Mistr ČR (Taneční výzva, Tradiční country tance, Tradiční country tance malá skupina), 3x 1. místo (Taneční výzva, Tradiční country tance, Tradiční country tance malá skupina), 2x 2. místo (Clogging acapella, Line dance)',
                ],
                7 => [
                    'header' => 'Lukáš Strapina - HBC Hostivař',
                    'description' => '- trenér mládeže v HBC Hostivař, dosáhl úspěchy s týmy mladších žáků, které se účastnily regionálních turnajů a dosahovaly dobrých výsledků v pardubických trojkových turnajích. Úspěchy za kombinační hru a schopnost zapojit všechny hráče.',
                ],
                8 => [
                    'header' => 'Jan Pauer - HC Hostivař, pozemní hokej',
                    'description' => '- 2. místo v ČR, nyní na 1. místě v tabulce. Dlouhodobě velmi kvalitní tým nejen po herní stránce, ale i svým nasazením při pomoci klubu.',
                ],
            ],
        ],
    ];

    public function beforeIndex() {
        return view('beforeIndex');
    }

    public function nomination() {
        $groups = self::$groups;
        $archive = true;
        return view('nomination', compact(['groups', 'archive']));
    }

    public function nominationStore() {
        $validate = [
            'nfname' => 'required',
            'nlname' => 'required',
            'nemail' => ['required', 'email'],
        ];
        if(!request()->input('group.1', 0)) {
            $validate['name.1'] = 'required';
            $validate['membership.1'] = 'required';
            $validate['success.1'] = 'required';
        }
        if(!request()->input('group.2', 0)) {
            $validate['name.2'] = 'required';
            $validate['membership.2'] = 'required';
            $validate['success.2'] = 'required';
        }
        if(!request()->input('group.3', 0)) {
            $validate['fname.3'] = 'required';
            $validate['lname.3'] = 'required';
            $validate['year.3'] = 'required';
            $validate['membership.3'] = 'required';
            $validate['success.3'] = 'required';
        }
        if(!request()->input('group.4', 0)) {
            $validate['fname.4'] = 'required';
            $validate['lname.4'] = 'required';
            $validate['year.4'] = 'required';
            $validate['membership.4'] = 'required';
            $validate['success.4'] = 'required';
        }
        if(!request()->input('group.5', 0)) {
            $validate['fname.5'] = 'required';
            $validate['lname.5'] = 'required';
            $validate['membership.5'] = 'required';
            $validate['team.5'] = 'required';
            $validate['success.5'] = 'required';
        }
        /*
        if(!request()->input('group.6', 0)) {
            $validate['fname.6'] = 'required';
            $validate['lname.6'] = 'required';
            $validate['membership.6'] = 'required';
            $validate['team.6'] = 'required';
            $validate['success.6'] = 'required';
        }
        if(!request()->input('group.7', 0)) {
            $validate['fname.7'] = 'required';
            $validate['lname.7'] = 'required';
            $validate['membership.7'] = 'required';
            $validate['team.7'] = 'required';
            $validate['success.7'] = 'required';
        }
        */
        $data = request()->validate($validate);

        Nomination::create([
            'fname' => request()->input('nfname'),
            'lname' => request()->input('nlname'),
            'email' => request()->input('nemail'),
            'group1' => request()->input('group.1', 0),
            'name1' => request()->input('name.1'),
            'membership1' => request()->input('membership.1'),
            'success1' => request()->input('success.1'),
            'group2' => request()->input('group.2', 0),
            'name2' => request()->input('name.2'),
            'membership2' => request()->input('membership.2'),
            'success2' => request()->input('success.2'),
            'group3' => request()->input('group.3', 0),
            'fname3' => request()->input('fname.3'),
            'lname3' => request()->input('lname.3'),
            'year3' => request()->input('year.3'),
            'membership3' => request()->input('membership.3'),
            'success3' => request()->input('success.3'),
            'group4' => request()->input('group.4', 0),
            'fname4' => request()->input('fname.4'),
            'lname4' => request()->input('lname.4'),
            'year4' => request()->input('year.4'),
            'membership4' => request()->input('membership.4'),
            'success4' => request()->input('success.4'),
            'group5' => request()->input('group.5', 0),
            'fname5' => request()->input('fname.5'),
            'lname5' => request()->input('lname.5'),
            'year5' => request()->input('year.5'),
            'membership5' => request()->input('membership.5'),
            'success5' => request()->input('success.5'),
/*
            'group6' => request()->input('group.6', 0),
            'fname6' => request()->input('fname.6'),
            'lname6' => request()->input('lname.6'),
            'membership6' => request()->input('membership.6'),
            'team6' => request()->input('team.6'),
            'success6' => request()->input('success.6'),
            'group7' => request()->input('group.7', 0),
            'fname7' => request()->input('fname.7'),
            'lname7' => request()->input('lname.7'),
            'membership7' => request()->input('membership.7'),
            'team7' => request()->input('team.7'),
            'success7' => request()->input('success.7'),
*/
        ]);

        return redirect('/')->with('message', 'thanks');
    }

    public function index() {
        $groups = self::$groups;
        $archive = true;
        return view('index', compact(['groups', 'archive']));
    }

    public function afterIndex() {
        return view('afterIndex');
    }

    public function results() {
        $year = 2025;
        $groups = self::$results[$year];
        $gallery = self::$gallery[$year];
        $nominations = self::$nominations;
        $archive = true;
        return view('results', compact(['groups', 'gallery', 'archive', 'year', 'nominations']));
    }

    public function archive($year) {
        $groups = self::$results[$year];
        $gallery = self::$gallery[$year];
        $archive = true;
        return view('archive', compact(['groups', 'gallery', 'year', 'archive']));
    }

    public function store() {
        $data = request()->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => ['required', 'email', 'unique:votes'],
            'group.1' => 'required',
            'group.2' => 'required',
            'group.3' => 'required',
            'group.4' => 'required',
            'group.5' => 'required',
            //'group.6' => 'required',
            'agree' => 'required',
        ]);

        $hash = hash('md5', $data['fname'].$data['lname'].$data['email'].time());

        $votes = new Votes([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'group1' => $data['group'][1],
            'group2' => $data['group'][2],
            'group3' => $data['group'][3],
            'group4' => $data['group'][4],
            'group5' => $data['group'][5],
            //'group6' => $data['group'][6],
            'hash' => $hash,
            'ip' => request()->ip(),
            'ipcheck' => session()->getId(),
        ]);
        $votes->save();

        Mail::to($data['email'])->send(new ValidationMail(['hash' => $hash]));

        return redirect('/')->with('message', 'thanks');
    }

    public function confirm($hash) {
        $vote = Votes::where(['hash' => $hash])->first();
        if($vote) {
            if($vote->status == 'new') {
                Votes::where(['hash' => $hash, 'status' => 'new'])->update(['status' => 'verified']);
                return redirect('/')->with('message', 'confirm');
            } else {
                return redirect('/')->with('message', 'old');
            }
        } else {
            return redirect('/')->with('message', 'unknown');
        }
    }

}
