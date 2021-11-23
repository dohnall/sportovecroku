<?php

namespace App\Http\Controllers;

use App\Mail\ValidationMail;
use App\Nomination;
use App\Votes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VotesController extends Controller
{

    public static $groups = [
        1 => [
            'name' => 'Nejoblíbenější sport Prahy 15',
            'values' => [
                1 => [
                    'header' => 'Florbal',
                    'description' => '',
                ],
                2 => [
                    'header' => 'Fotbal',
                    'description' => '',
                ],
                3 => [
                    'header' => 'Hokejbal',
                    'description' => '',
                ],
                4 => [
                    'header' => 'Karate',
                    'description' => '',
                ],
                5 => [
                    'header' => 'Moderní gymnastika',
                    'description' => '',
                ],
                6 => [
                    'header' => 'Pozemní hokej',
                    'description' => '',
                ],
                7 => [
                    'header' => 'Taekwondo',
                    'description' => '',
                ],
                8 => [
                    'header' => 'Tenis',
                    'description' => '',
                ],
                9 => [
                    'header' => 'Terenní cyklistika',
                    'description' => '',
                ],
                10 => [
                    'header' => 'Vodní záchranná služba',
                    'description' => '',
                ],
            ],
        ],
/*
        2 => [
            'name' => 'Sportovní tým do 18 let',
            'values' => [
                1 => [
                    'header' => 'HBC Hostivař "Dorost"',
                    'description' => '<small>Hokejbal</small>',
                ],
                2 => [
                    'header' => 'SK Hostivař "2012 - Mladší přípravka"',
                    'description' => '<small>Fotbal</small>',
                ],
                3 => [
                    'header' => 'SK Hostivař "Mladší dorost"',
                    'description' => '<small>Fotbal</small>',
                ],
                4 => [
                    'header' => 'HC Hostivař "Dorostenky"',
                    'description' => '<small>Pozemní hokej</small>',
                ],
            ],
        ],
        3 => [
            'name' => 'Jednotlivec nad 18 let',
            'values' => [
                1 => [
                    'header' => 'Sklenář Vladimír',
                    'description' => '(XCT sport - Hospůdka Karolína)<small>Terénní triatlon</small>',
                ],
                2 => [
                    'header' => 'Vaniš Jiří ml.',
                    'description' => '(HBC Hostivař)<small>Hokejbal</small>',
                ],
                3 => [
                    'header' => 'Brza Martin',
                    'description' => '(JCBike Racing)<small>Horská kola</small>',
                ],
                4 => [
                    'header' => 'Podhola Melita',
                    'description' => '<small>Běh</small>',
                ],
                5 => [
                    'header' => 'Hubínek Jiří',
                    'description' => '(Val di Botič)<small>Horská kola - sjezd</small>',
                ],
                6 => [
                    'header' => 'Přeslička Martin',
                    'description' => '(HBC Hostivař)<small>Hokejbal</small>',
                ],
                7 => [
                    'header' => 'Čejka Jan',
                    'description' => '(HBC Hostivař)<small>Hokejbal</small>',
                ],
                8 => [
                    'header' => 'Lupoměský Roman',
                    'description' => '(TJ Sokol Na Křečku)<small>Tenis</small>',
                ],
                9 => [
                    'header' => 'Růžička Josef',
                    'description' => '(Rugby Klub Petrovice – Old boys)<small>Rugby</small>',
                ],
            ],
        ],
        4 => [
            'name' => 'Jednotlivec do 18 let',
            'values' => [
                1 => [
                    'header' => 'Kolář Vít',
                    'description' => '(KZ Bohemians Praha)<small>Zápas - volný styl</small>',
                ],
                2 => [
                    'header' => 'Šafaříková Kristýna',
                    'description' => '(HC Hostivař)<small>Pozemní hokej</small>',
                ],
                3 => [
                    'header' => 'Hradil Filip',
                    'description' => '(HBC Hostivař)<small>Hokejbal</small>',
                ],
                4 => [
                    'header' => 'Maredová Lucie',
                    'description' => '(Atletika Hostivař)<small>Atletický víceboj</small>',
                ],
                5 => [
                    'header' => 'Omáčková Amálie',
                    'description' => '(Judo academy Praha)<small>Judo</small>',
                ],
                6 => [
                    'header' => 'Černý Karel',
                    'description' => '(SK Hostivař)<small>Fotbal</small>',
                ],
                7 => [
                    'header' => 'Švec Patrik',
                    'description' => '(HBC Hostivař)<small>Hokejbal</small>',
                ],
                8 => [
                    'header' => 'Vaniš Mikuláš',
                    'description' => '(HBC Hostivař)<small>Hokejbal</small>',
                ],
                9 => [
                    'header' => 'Rýdl Jakub',
                    'description' => '(TJ Sokol Petrovice)<small>Tenis</small>',
                ],
                10 => [
                    'header' => 'Stříbrská Zuzana',
                    'description' => '(TJ Sokol Petrovice - Mažoretky Bailar Praha)<small>Mažoretka - twirlerka</small>',
                ],
                11 => [
                    'header' => 'Bitterman Pavel',
                    'description' => '(Rugby Klub Petrovice)<small>Rugby</small>',
                ],
            ],
        ],
        5 => [
            'name' => 'Sportovec 60+',
            'values' => [
                1 => [
                    'header' => 'Vltavský Zdeněk',
                    'description' => '(TJ Sokol Na Křečku)<small>Tenis</small>',
                ],
                2 => [
                    'header' => 'Boukal František',
                    'description' => '(Aktivní senioři Praha 15, SČR z.s.)<small>Šipky</small>',
                ],
            ],
        ],
*/
        6 => [
            'name' => 'Trenér roku',
            'values' => [
                1 => [
                    'header' => 'Blanka Chuchlerová',
                    'description' => '(TJ ZŠ Hostivař, juniorky)<small>Moderní gymnastika</small>',
                ],
                2 => [
                    'header' => 'Libor Hlaváč',
                    'description' => '(HC Hostivař, dorostenky)<small>Pozemní hokej</small>',
                ],
                3 => [
                    'header' => 'Petra Brabcová',
                    'description' => '(HC Hostivař, minibenjamínci, benjamínci U6+U8)<small>Pozemní hokej</small>',
                ],
                4 => [
                    'header' => 'Lucie Gabrielová',
                    'description' => '(TJ Vodní stavby Praha, svěřenkyně Tereza Pupíková)<small>Moderní gymnastika</small>',
                ],
                5 => [
                    'header' => 'Dominika Kasnerová',
                    'description' => '(HC Hostivař, minbenjamínci, benjamínci U6+U8)<small>Pozemní hokej</small>',
                ],
                6 => [
                    'header' => 'Jiří Vaniš',
                    'description' => '(HBC Hostivař, mladší žáci)<small>Hokejbal</small>',
                ],
                7 => [
                    'header' => 'Petr Behenský',
                    'description' => '(ATHOS Atletika Hostivař, dorost a starší)<small>Atletika</small>',
                ],
                8 => [
                    'header' => 'Ctibor Coufal',
                    'description' => '(HBC Hostivař, přípravka, svěřenec Jakub Veselý)<small>Hokejbal</small>',
                ],
                9 => [
                    'header' => 'Marek Škácha',
                    'description' => '(Vodní záchranná služba Praha 15, do 14 let)<small>Vodní záchranná služba</small>',
                ],
                10 => [
                    'header' => 'Ondřej Novák',
                    'description' => '(HBC Hostivař, minipřípravka, starší žáci)<small>Hokejbal</small>',
                ],
                11 => [
                    'header' => 'Lee Youn Jae',
                    'description' => '(TAEHAN Praha, trenér národní reprezentace České republiky)<small>Taekwondo</small>',
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
            //$validate['membership.1'] = 'required';
        }
        /*
        if(!request()->input('group.2', 0)) {
            $validate['name.2'] = 'required';
            $validate['membership.2'] = 'required';
        }
        if(!request()->input('group.3', 0)) {
            $validate['fname.3'] = 'required';
            $validate['lname.3'] = 'required';
            $validate['year.3'] = 'required';
            $validate['membership.3'] = 'required';
        }
        if(!request()->input('group.4', 0)) {
            $validate['fname.4'] = 'required';
            $validate['lname.4'] = 'required';
            $validate['year.4'] = 'required';
            $validate['membership.4'] = 'required';
        }
        if(!request()->input('group.5', 0)) {
            $validate['fname.5'] = 'required';
            $validate['lname.5'] = 'required';
            $validate['year.5'] = 'required';
            $validate['membership.5'] = 'required';
        }
        */
        if(!request()->input('group.6', 0)) {
            $validate['fname.6'] = 'required';
            $validate['lname.6'] = 'required';
            $validate['membership.6'] = 'required';
            $validate['team.6'] = 'required';
        }

        $data = request()->validate($validate);

        $nomination = new Nomination([
            'fname' => request()->input('nfname'),
            'lname' => request()->input('nlname'),
            'email' => request()->input('nemail'),
            'group1' => request()->input('group.1', 0),
            'name1' => request()->input('name.1'),
            'membership1' => request()->input('membership.1'),
            'group2' => request()->input('group.2', 0),
            'name2' => request()->input('name.2'),
            'membership2' => request()->input('membership.2'),
            'group3' => request()->input('group.3', 0),
            'fname3' => request()->input('fname.3'),
            'lname3' => request()->input('lname.3'),
            'year3' => request()->input('year.3'),
            'membership3' => request()->input('membership.3'),
            'group4' => request()->input('group.4', 0),
            'fname4' => request()->input('fname.4'),
            'lname4' => request()->input('lname.4'),
            'year4' => request()->input('year.4'),
            'membership4' => request()->input('membership.4'),
            'group5' => request()->input('group.5', 0),
            'fname5' => request()->input('fname.5'),
            'lname5' => request()->input('lname.5'),
            'year5' => request()->input('year.5'),
            'membership5' => request()->input('membership.5'),
            'group6' => request()->input('group.6', 0),
            'fname6' => request()->input('fname.6'),
            'lname6' => request()->input('lname.6'),
            'membership6' => request()->input('membership.6'),
            'team6' => request()->input('team.6'),
        ]);
        $nomination->save();

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
        $groups = self::$results[2020];
        $gallery = self::$gallery[2020];
        $archive = true;
        return view('results', compact(['groups', 'gallery', 'archive']));
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
            //'group.2' => 'required',
            //'group.3' => 'required',
            //'group.4' => 'required',
            //'group.5' => 'required',
            'group.6' => 'required',
            'agree' => 'required',
        ]);

        $hash = hash('md5', $data['fname'].$data['lname'].$data['email'].time());

        $votes = new Votes([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'group1' => $data['group'][1],
            //'group2' => $data['group'][2],
            //'group3' => $data['group'][3],
            //'group4' => $data['group'][4],
            //'group5' => $data['group'][5],
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
