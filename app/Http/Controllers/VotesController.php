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
                    'header' => 'Taneční klub Calipso',
                    'description' => '<small>Country tanec</small><br>Úspěchy: 1.místo v kategorii tradiční country tance na Mistrovství České republiky v country tancích a cloggingu, 1. místo Mistrovství České republiky v kategorie Line dance dueta',
                ],
                2 => [
                    'header' => 'HBC Hostivař - muži A',
                    'description' => '<small>Hokejbal</small><br>Úspěchy: Premiérový postup do play-off hokejbalové extraligy České republiky',
                ],
                3 => [
                    'header' => 'Gymnastika Vodní Stavby',
                    'description' => '<small>Gymnastika</small><br>Úspěchy: 3. místo Mistrovství České republiky',
                ],
                4 => [
                    'header' => 'Rugby klub Petrovice',
                    'description' => '<small>Rugby</small><br>Úspěchy: 3. místo 1. Liga Ragby XV a 6. místo Mistrovství České republiky 7s',
                ],
            ],
        ],
        2 => [
            'name' => 'Sportovní tým do 18 let',
            'values' => [
                1 => [
                    'header' => 'HBC Hostivař - junioři',
                    'description' => '<small>Hokejbal</small><br>Úspěchy: Mistři České republiky pro sezónu 2021/2022',
                ],
                2 => [
                    'header' => 'Hana Lee/Michaela Baštecká/Julie Šlesingerová (Taehan Praha)',
                    'description' => '<small>Taekwondo</small><br>Úspěchy: 13. místo Mistrovství světa v taekwondo WT poomsae – Gyoang, Jižní Korea 2022 ',
                ],
                3 => [
                    'header' => 'Rugby klub Petrovice U16',
                    'description' => '<small>Rugby</small><br>Úspěchy: 3. místo v celostátní lize Rugby XV; 3. místo v mistrovství České republiky Rugby 7\'s',
                ],
                4 => [
                    'header' => 'Tomáš Markov/Michaela Baštecká (Taehan Praha)',
                    'description' => '<small>Taekwondo</small><br>Úspěchy: 1. místo Czech Open 2022',
                ],
            ],
        ],
        3 => [
            'name' => 'Jednotlivec nad 18 let',
            'values' => [
                1 => [
                    'header' => 'Hubínek Jiří',
                    'description' => '<small>Cyklistika</small><br>Úspěchy: 1. místo Mistrovství České republiky v downhill (kategorie masters)',
                ],
                2 => [
                    'header' => 'Čejka Jan',
                    'description' => '(HBC Hostivař, hokejbal)<small>Holejbal</small><br>Úspěchy: 2. místo na Mistrovství světa v hokejbalu mužů. 1. místo Mistrovství České republiky v hokejbalu juniorů',
                ],
                3 => [
                    'header' => 'Hájková Judita',
                    'description' => '(Taehan Praha)<small>Taekwondo</small><br>Úspěchy: 3. místo MČR 2022 -2. vicemistryně ČR pro rok 2022 v kategorii seniorky do 30 A, 3. místo Albania President´s Cup 2022 – turnaje G - kategorie senior female under 30',
                ],
            ],
        ],
        4 => [
            'name' => 'Jednotlivec do 18 let',
            'values' => [
                1 => [
                    'header' => 'Maredová Lucie',
                    'description' => '(Atletika Jižní město)<small>Atletika</small><br>Úspěchy: Skok vysoký 154cm - 2x Přebornice Prahy, 2. místo neoficiální Mistrovství Evropy, reprezentace Prahy na Olympiádě dětí a mládeže, sportovní chůze 2km - nejlepší výkon v České republice',
                ],
                2 => [
                    'header' => 'Lee Irena',
                    'description' => '(Taehan Praha)<small>Taekwondo</small><br>Úspěchy: 1. místo MČR 2022 - mistryně ČR pro rok 2022 v kategorii kadetky A, 1. místo - vítězka Taekwondo extraligy poomsae za rok 2022 – kategorie kadetky, 8. místo ve skupině – World Taekwondo Poomsae Championship 2022 – Goyang, Jižní Korea – cadet female',
                ],
                3 => [
                    'header' => 'Omáčková Amálie',
                    'description' => '(Judo Academy)<small>Judo</small><br>Úspěchy: ČP Ostrava 3.misto, Dánsko 3.misto, Maďarsko 2.misto, Slovinsko 1.misto, ČP Bydžov 2. Místo, ČP Jablonec 2.misto, Polsko 1. a 2.misto, přebory Prahy 1. a 2.misto, Přebor ČR 3.misto',
                ],
                4 => [
                    'header' => 'Lee Hana',
                    'description' => '(Taehan Praha)<small>Taekwondo</small><br>Úspěchy: 1. místo MČR 2022 - mistryně ČR pro rok 2022 v kategorii juniorky A,  1. místo - vítězka Taekwondo extraligy poomsae za rok 2022 – kategorie juniorky A, E6513. místo v týmech junior female na Mistrovství světa 2022 v Jižní Koreji',
                ],
                5 => [
                    'header' => 'Karásková Linda',
                    'description' => '(JNS Cheerleading)<small>Sportovní cheerleanding</small><br>Úspěchy: 1. místo Mistrovství světa Orlando 2022, 1.místo group stunty německý Bottrop-otevřené ME, 1.místo mistrovství České republiky, 1.místo mistrovství České republiky malé divize',
                ],
                6 => [
                    'header' => 'Bittermann Jaroslav',
                    'description' => '(Rugby Petrovice)<small>Rugby</small><br>Úspěchy: 3. místo Mistrovství České republiky',
                ],
                7 => [
                    'header' => 'Jeřábek Tomáš Josef',
                    'description' => '(HBC Hostivař)<small>Hokejbal</small><br>Úspěchy: Nejlepší hráč  turnaj Světlá nad Sázavou',
                ],
                8 => [
                    'header' => 'Semerád Jan',
                    'description' => '(Taneční klub Calipso)<small>Clogging a country tanec</small><br>Úspěchy: Mistr ČR, 1. místo kategorie B2S - clogging sólo starší, 2. místo B1S clogging freestyle, 4. místo B5S - clogging acapella na Mistrovství ČR v country',
                ],
                9 => [
                    'header' => 'Stříbrská Zuzana',
                    'description' => '(TJ Sokol Petrovice)<small>Mažoretky a twirling</small><br>Úspěchy: 3.misto Mistrovství české republiky 2 baron, 3.místo MČR flag, 7.misto MČR baron, 4.misto MS flag, 5.misto MS baton,6.misto MS 2bat, TWIRLING 1.misto NTP 2bat + další',
                ],
                10 => [
                    'header' => 'Šimonek Ondřej',
                    'description' => '(Vodní Záchranná Služba ČČK Praha 15, pobočný spolek)<small>Vodní záchranná služba</small><br>Úspěchy: 1. místo Mistrovství světa - disciplína Line Throw, 1. místo Mistrovství republiky VZS v plážových disciplínách, 4. místo Mistrovství republiky VZS v bazénových disciplínách',
                ],
                11 => [
                    'header' => 'Markov Tomáš',
                    'description' => '(Taehan Praha)<small>Taekwondo</small><br>Úspěchy: 1. místo MČR 2022 – mistr ČR pro rok 2022 v kategorii junioři A, 1. místo – vítěz Taekwondo extraligy poomsae za rok 2022 – kategorie junior A, 7. místo European Open Poomsae 2022 – junior male A',
                ],
                12 => [
                    'header' => 'Volf Richard',
                    'description' => '(TK Sparta Praha, taneční sport)<small>Tanec</small><br>Úspěchy: Člen reprezentace ČR v tanečním sportu, II. vícemistr ČR v tanečním sportu, Reprezentant Hl. m. Prahy na OH mládeže ',
                ],
            ],
        ],
        5 => [
            'name' => 'Trenér roku kolektivních sportů',
            'values' => [
                1 => [
                    'header' => 'Kemr Antonín',
                    'description' => '(HC Hostivař)',
                ],
                2 => [
                    'header' => 'Brabcová Petra',
                    'description' => '(HC Hostivař)',
                ],
                3 => [
                    'header' => 'Žák Jakub',
                    'description' => '(Taneční klub Calipso)',
                ],
                4 => [
                    'header' => 'Gabrielová Lucie',
                    'description' => '(TJ Gymnastika Vodní stavby - Vajány)',
                ],
                5 => [
                    'header' => 'Grepl Tomáš',
                    'description' => '(HBC Hostivař)',
                ],
            ],
        ],
        6 => [
            'name' => 'Trenér roku individuálních sportů',
            'values' => [
                1 => [
                    'header' => 'Václav Duda',
                    'description' => '(TK Horní Měcholupy)',
                ],
                2 => [
                    'header' => 'David Sirový',
                    'description' => '(HPZ Karate)',
                ],
                3 => [
                    'header' => 'Youjae Lee',
                    'description' => '(Taehan Praha)',
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
            $validate['year.5'] = 'required';
            $validate['membership.5'] = 'required';
            $validate['success.5'] = 'required';
        }
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
            'group.6' => 'required',
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
            'group6' => $data['group'][6],
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
