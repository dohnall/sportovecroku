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
                    'header' => 'HOCKEY CLUB HOSTIVAŘ',
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
                    'description' => '<small>Doplnejch Powerlifting, silový trojboj</small><br>Úspěchy: 5. na MS (dřep), 7. na MS (trojboj) a 7. na ME (trojboj) mladších juniorek do 57 kg v silovém trojboji',
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
        $year = 2022;
        $groups = self::$results[$year];
        $gallery = self::$gallery[$year];
        $archive = true;
        return view('results', compact(['groups', 'gallery', 'archive', 'year']));
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
