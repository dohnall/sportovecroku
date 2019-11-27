<?php

namespace App\Http\Controllers;

use App\Mail\ValidationMail;
use App\Votes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VotesController extends Controller
{

    public static $groups = [
        1 => [
            'name' => 'Sportovní tým nad 18 let',
            'values' => [
                1 => [
                    'header' => 'SK Hostivař "A Tým"',
                    'description' => '<small>Účastník Pražského přeboru<br>Účastník čtvrtfinále poháru</small>',
                ],
                2 => [
                    'header' => 'HBC Hostivař "Muži"',
                    'description' => '<small>2. místo v První hokejbalové lize ČR 2018/2019</small>',
                ],
                3 => [
                    'header' => 'Sportovní družstvo SDH Horní Měcholupy "Muži"',
                    'description' => '<small>1. místo Podlipanská liga požárního sportu, vítěz městského kola</small>',
                ],
                4 => [
                    'header' => 'SKBU Hostivař "Kata tým - muži"',
                    'description' => '(D. Beneš, T. Novák, D. Matoušek)<small>1. místo Národní pohár karate ČR<br>1. místo Mistrovství Evropy karate JKA<br>1. místo Mistrovství ČR karate SKIF<br>5. místo  Mistrovství světa karate SKIF</small>',
                ],
            ],
        ],
        2 => [
            'name' => 'Sportovní tým do 18 let',
            'values' => [
                1 => [
                    'header' => 'HBC Hostivař "Dorost"',
                    'description' => '<small>Mistr ČR 2018/2019 Dorostenecká hokejbalová liga</small>',
                ],
                2 => [
                    'header' => 'SK Hostivař "Mladší přípravka"',
                    'description' => '<small>Účastník Pražského přeboru</small>',
                ],
                3 => [
                    'header' => 'SK Hostivař "Dorost"',
                    'description' => '<small>Účastník Pražského přeboru</small>',
                ],
                4 => [
                    'header' => 'SKBU Hostivař "Kata Tým - dívky"',
                    'description' => '(A. Matoušková, K. Heřmanová, A. Franková)<small>1. místo Mistrovství ČR karate SKIF<br>1. místo Mistrovství Evropy karate JKA</small>',
                ],
                5 => [
                    'header' => 'TJ ZŠ Hostivař "Moderní gymnastika"',
                    'description' => '(A. Vobořilová, L. Ščepánková, A. Štěpánková, D. Mirošničenko)<small>Mistryně ČR 2019 ve společných skladbách</small>',
                ],
                6 => [
                    'header' => 'HC Hostivař "Dorostenky"',
                    'description' => '<small>Mistryně extraligy 2018/2019</small>',
                ],
                7 => [
                    'header' => 'Sportovní družstvo SDH Horní Měcholupy "Smíšené družstvo dorostu"',
                    'description' => '<small>1. místo Podlipanská liga požárního sportu</small>',
                ],
            ],
        ],
        3 => [
            'name' => 'Jednotlivec nad 18 let',
            'values' => [
                1 => [
                    'header' => 'Vladimír Sklenář',
                    'description' => '(XCT sport - Hospůdka Karolína)<small>8. místo Mistrovství ČR XTERRA<br>12. místo Mistrovství Evropy XTERRA</small>',
                ],
                2 => [
                    'header' => 'Daniel Beneš',
                    'description' => '(SKBU Hostivař)<small>1. místo Národní pohár karate ČR<br>1. místo Mistrovství Evropy karate JKA<br>1. místo Mistrovství ČR karate SKIF<br>6. místo Mistrovství světa karate SKIF<br>3. místo Mistrovství světa karate WSKA</small>',
                ],
                3 => [
                    'header' => 'Pavel Michalík',
                    'description' => '(SK Hříbata Praha)<small>1. místo atletika Czech open 2019<br>2. místo plavání Czech open 2019</small>',
                ],
                4 => [
                    'header' => 'Martina Irglová',
                    'description' => '(Hard Dog Race)<small>Mnohonásobná účastnice  závodů Hard Dog Race tour</small>',
                ],
                5 => [
                    'header' => 'Julie Drahorádová',
                    'description' => '(RC Slavia Praha)<small>Hráčka ženského rugby</small>',
                ],
                6 => [
                    'header' => 'Jiří Vaniš ml.',
                    'description' => '(HBC Hostivař)<small>2. místo v První hokejbalové lize ČR 2018/2019<br>3. místo Mistrovství ČR v hokejbalu kategorie junioři<br>Nejproduktivnější hráč První hokejbalové ligy ČR</small>',
                ],
            ],
        ],
        4 => [
            'name' => 'Jednotlivec do 18 let',
            'values' => [
                1 => [
                    'header' => 'David Zikmund',
                    'description' => '(SK Hostivař - mladší přípravka)<small>Jeden z nejlepších hráčů mužstva</small>',
                ],
                2 => [
                    'header' => 'Filip Tuček',
                    'description' => '(BK Havlíčkův Brod)<small>1. místo Výběr Prahy, Mládežnické Místrovství ČR krajů 2019</small>',
                ],
                3 => [
                    'header' => 'Oliver Simon',
                    'description' => '(SKBU Hostivař)<small>2. místo Národní pohár karate ČR<br>2. místo Mistrovství ČR karate SKIF<br>2. místo Mistrovství Evropy Karate JKA<br>2. místo Mistrovství světa karate SKIF<br>3. místo Mistrovství světa karate WSKA</small>',
                ],
                4 => [
                    'header' => 'Lucie Maredová',
                    'description' => '(Atletika Hostivař)<small>1. místo Atletický víceboj Praha a Středočeský kraj</small>',
                ],
                5 => [
                    'header' => 'Diana Avtová',
                    'description' => '(TJ ZŠ Hostivař)<small>Mistryně ČR v kategorii starší kadetky - víceboj<br>Mistryně ČR v kategorii kadetky starší - míč<br>Mistryně ČR kadetky starší kategorie - stuha</small>',
                ],
                6 => [
                    'header' => 'Tereza Sirová',
                    'description' => '(HZP karate)<small>Účastnice Mistrovství světa karate 2019</small>',
                ],
                7 => [
                    'header' => 'Amálie Omáčková',
                    'description' => '(Judo academy Praha)<small>1. místo Mezinárodní turnaj judo<br>2. místo Turnaj judo<br>2. místo Samurajská katana</small>',
                ],
                8 => [
                    'header' => 'Kateřina Aulická',
                    'description' => '(Sbor dobrovolných hasičů Horní Měcholupy)<small>Vítězka městského kola Mistrovství ČR v požárních disciplínách</small>',
                ],
                9 => [
                    'header' => 'Jan Čejka',
                    'description' => '(HBC Hostivař)<small>Mistr ČR 2018/2019 Dorostenecká hokejbalová liga<br>Juniorský reprezentant ČR</small>',
                ],
                10 => [
                    'header' => 'Vojtěch Eremiáš',
                    'description' => '(Eugen Link Football Academy)<small>1. místo halový turnaj Praha<br>Nejlepší hráč halového turnaje Praha - Koloděje</small>',
                ],
            ],
        ],
        5 => [
            'name' => 'Trenér roku',
            'values' => [
                1 => [
                    'header' => 'Ondřej Novák',
                    'description' => '(HBC Hostivař)<small>2. místo v První hokejbalové lize ČR 2018/2019</small>',
                ],
                2 => [
                    'header' => 'Karel Strnad',
                    'description' => '(SKBU Hostivař)<small>1. místo, 2. místo Mistrovství Evropy karate JKA kategorie junioři a senioři<br>1. místo, 2. místo, 3. místo Mistrovství Evropy karate JKA kategorie mládež<br>1. místo Mistrovství světa karate SKIF<br>1. místo a 3. místo Mistrovství světa karate WSKA</small>',
                ],
                3 => [
                    'header' => 'Antonín Eis',
                    'description' => '(SK ZŠ Hostivař)<small>Dlouholetý trenér reprezentantů ČR v cyklistice</small>',
                ],
                4 => [
                    'header' => 'Blanka Chuchlerová',
                    'description' => '(TJ Vodní stavby Praha, TJ ZŠ Hostivař Praha)<small>Mistryně ČR ve společných skladbách, kategorie naděje starší</small>',
                ],
                5 => [
                    'header' => 'Zdeňka Michalíková',
                    'description' => '(SK Hříbata Praha)<small>Trenérka Pavla Michalíka<br>1. místo atletika Czech open 2019<br>2. místo plavání Czech open 2019</small>',
                ],
                6 => [
                    'header' => 'David Sirový',
                    'description' => '(HPZ karate)<small>Trenér účastníků Mistrovství světa v karate 2019</small>',
                ],
                7 => [
                    'header' => 'Lenka Oulehlová Hyblerová',
                    'description' => '(SK Triumf Praha)<small>Sedminásobná mistryně České republiky v moderní gymnastice<br>Trojnásobná účastnice Letních olympijských her (Soul 1988, Barcelona 1992, Altanta 1996)</small>',
                ],
                8 => [
                    'header' => 'Ondřej Vejsada',
                    'description' => '(TJ Bohemians)<small>Trenér mistrů ČR v zápase v kategoriích senioři a mladší žáci</small>',
                ],
                9 => [
                    'header' => 'Miroslav Neštický',
                    'description' => '(HC Hostivař)<small>1. místo Přebor Prahy v halovém hokeji kategorie U10<br>1. místo Přebor Prahy kategorie U10<br>1. místo Přebor Prahy dětí kategorie U10</small>',
                ],
                10 => [
                    'header' => 'Luboš Došek',
                    'description' => '(Celebrity boxing place)<small>Dlouholetý  trenér boxu a člen širšího výběru účastníků Letních olympijských her Sydney 2000</small>',
                ],
                11 => [
                    'header' => 'Jiří Vaniš',
                    'description' => '(HBC Hostivař)<small>Mistr ČR 2018/2019 Dorostenecká hokejbalová liga</small>',
                ],
            ],
        ],
    ];

    public function beforeIndex() {
        return view('beforeIndex');
    }

    public function index() {
        $groups = self::$groups;
        return view('index', compact(['groups']));
    }

    public function afterIndex() {
        return view('afterIndex');
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
