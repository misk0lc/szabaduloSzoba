<?php

namespace Database\Seeders;

use App\Models\Hint;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        // 5 pálya × 20 kérdés = 100 kérdés
        // 5 pálya × 20 hint (1/kérdés) = 100 hint

        $levelQuestions = [

            // ─── 1. PÁLYA: A Könyvtárszoba (LevelID = 1) ──────────────────
            1 => [
                ['text' => 'Melyik évben jelent meg Shakespeare első szonettje?',        'answer' => '1609', 'digit' => 3, 'money' => 50,  'x' => 1,  'y' => 2,
                 'hint' => 'A szonetteket egy kvartóban adták ki, II. Jakab uralkodása alatt.', 'cost' => 30],

                ['text' => 'Hány fejezetre oszlik Dante Isteni Színjátéka?',             'answer' => '100',  'digit' => 1, 'money' => 40,  'x' => 2,  'y' => 1,
                 'hint' => 'Pokol, Purgatórium és Paradicsom – mindegyikből 33 ének, plusz egy bevezető.', 'cost' => 25],

                ['text' => 'Melyik betű hiányzik: "K_nyvtár"?',                         'answer' => 'ö',    'digit' => 4, 'money' => 30,  'x' => 3,  'y' => 3,
                 'hint' => 'Ez egy két pontos magánhangzó.', 'cost' => 15],

                ['text' => 'Mi a Bibliában az első könyv neve?',                         'answer' => 'Genezis', 'digit' => 7, 'money' => 45, 'x' => 4, 'y' => 2,
                 'hint' => 'A világ teremtéséről szól, latinul "keletkezés" a jelentése.', 'cost' => 20],

                ['text' => 'Hány betű van a magyar ábécében?',                           'answer' => '44',   'digit' => 2, 'money' => 35,  'x' => 5,  'y' => 4,
                 'hint' => 'Több mint az angolban, mert a digráfok (cs, dz...) is beleszámítanak.', 'cost' => 20],

                ['text' => 'Ki írta a "Pál utcai fiúk" regényt?',                        'answer' => 'Molnár Ferenc', 'digit' => 8, 'money' => 40, 'x' => 6, 'y' => 1,
                 'hint' => 'Magyar szerző, a 20. század elején élt.', 'cost' => 25],

                ['text' => 'Melyik számrendszert használják a számítógépek?',            'answer' => 'bináris', 'digit' => 5, 'money' => 50, 'x' => 7, 'y' => 3,
                 'hint' => 'Csak 0 és 1 számjegyeket tartalmaz.', 'cost' => 30],

                ['text' => 'Hány oldala van egy könyvnek, ha 200 lapja van?',            'answer' => '400',  'digit' => 9, 'money' => 30,  'x' => 8,  'y' => 2,
                 'hint' => 'Minden lapnak két oldala van.', 'cost' => 15],

                ['text' => 'Mi az olvasás könyv latin neve?',                            'answer' => 'liber', 'digit' => 6, 'money' => 45, 'x' => 9, 'y' => 4,
                 'hint' => 'Ebből ered a "könyvtár" szó latinban: bibliotheca... de a könyv maga...', 'cost' => 25],

                ['text' => 'Hány betű van a "KÖNYVESPOLC" szóban?',                     'answer' => '10',   'digit' => 0, 'money' => 25,  'x' => 10, 'y' => 1,
                 'hint' => 'Számold meg egyenként a betűket!', 'cost' => 10],

                ['text' => 'Mi a Gutenberg-galaxis kifejezés jelentése?',                'answer' => 'nyomtatott kultúra', 'digit' => 3, 'money' => 55, 'x' => 11, 'y' => 3,
                 'hint' => 'Marshall McLuhan alkotta a kifejezést.', 'cost' => 30],

                ['text' => 'Melyik évben nyomtatta Gutenberg az első Bibliát?',          'answer' => '1455', 'digit' => 1, 'money' => 50, 'x' => 12, 'y' => 2,
                 'hint' => 'A 15. század közepén, Mainzban történt.', 'cost' => 25],

                ['text' => 'Hány kötetből áll Tolsztoj "Háború és béke" regénye?',       'answer' => '4',    'digit' => 4, 'money' => 40, 'x' => 13, 'y' => 4,
                 'hint' => 'Az eredeti orosz kiadás kötetszámára gondolj.', 'cost' => 20],

                ['text' => 'Mi az ISBN rövidítés teljes neve?',                          'answer' => 'International Standard Book Number', 'digit' => 7, 'money' => 60, 'x' => 14, 'y' => 1,
                 'hint' => 'Minden könyvnek egyedi ilyen azonosítója van.', 'cost' => 35],

                ['text' => 'Hány fejezet van a Harry Potter első kötetében?',            'answer' => '17',   'digit' => 2, 'money' => 35, 'x' => 15, 'y' => 3,
                 'hint' => 'A Bölcsek Köve 17 fejezetre tagolódik.', 'cost' => 20],

                ['text' => 'Ki volt az első magyar Nobel-díjas irodalomban?',            'answer' => 'Kertész Imre', 'digit' => 8, 'money' => 55, 'x' => 16, 'y' => 2,
                 'hint' => '2002-ben kapta, a Sorstalanság c. regényéért.', 'cost' => 30],

                ['text' => 'Melyik betű a leggyakoribb az angol nyelvben?',              'answer' => 'e',    'digit' => 5, 'money' => 30, 'x' => 17, 'y' => 4,
                 'hint' => 'A Scrabble-ben is a legtöbb ilyen betűlap van.', 'cost' => 15],

                ['text' => 'Hány novellából áll Maupassant életműve hozzávetőleg?',      'answer' => '300',  'digit' => 9, 'money' => 45, 'x' => 18, 'y' => 1,
                 'hint' => 'A francia mester több száz rövid elbeszélést írt.', 'cost' => 25],

                ['text' => 'Mi a könyvtári jelzet angol neve?',                          'answer' => 'call number', 'digit' => 6, 'money' => 40, 'x' => 19, 'y' => 3,
                 'hint' => 'Ezzel hívják elő a katalógusban a könyvet.', 'cost' => 20],

                ['text' => 'Melyik városban található az Alexandriai Könyvtár?',         'answer' => 'Alexandria', 'digit' => 0, 'money' => 50, 'x' => 20, 'y' => 2,
                 'hint' => 'Egyiptomban van, az ókor leghíresebb könyvtára volt.', 'cost' => 25],
            ],

            // ─── 2. PÁLYA: A Laboratorium (LevelID = 2) ───────────────────
            2 => [
                ['text' => 'Mi a víz kémiai képlete?',                                   'answer' => 'H2O',  'digit' => 5, 'money' => 30, 'x' => 1,  'y' => 1,
                 'hint' => 'Hidrogén és oxigén alkotja.', 'cost' => 15],

                ['text' => 'Hány proton van a szén atomban?',                            'answer' => '6',    'digit' => 2, 'money' => 35, 'x' => 2,  'y' => 3,
                 'hint' => 'A periódusos rendszer 6. eleme.', 'cost' => 20],

                ['text' => 'Mi az Avogadro-szám értéke (×10^23)?',                      'answer' => '6.022', 'digit' => 7, 'money' => 60, 'x' => 3, 'y' => 2,
                 'hint' => 'Egy mól anyagban ennyi részecske van.', 'cost' => 35],

                ['text' => 'Melyik gáz alkotja a levegő ~78%-át?',                       'answer' => 'nitrogén', 'digit' => 1, 'money' => 40, 'x' => 4, 'y' => 4,
                 'hint' => 'N2 képletű, szagtalan és színtelen.', 'cost' => 20],

                ['text' => 'Mi a pH-ja a tiszta víznek?',                               'answer' => '7',    'digit' => 4, 'money' => 30, 'x' => 5,  'y' => 1,
                 'hint' => 'Sem savas, sem lúgos – semleges.', 'cost' => 15],

                ['text' => 'Melyik elem vegyjele Au?',                                   'answer' => 'arany', 'digit' => 8, 'money' => 45, 'x' => 6, 'y' => 3,
                 'hint' => 'A latin "aurum" szóból ered.', 'cost' => 25],

                ['text' => 'Hány elektron fér az első elektronhéjra?',                   'answer' => '2',    'digit' => 3, 'money' => 35, 'x' => 7,  'y' => 2,
                 'hint' => 'A legbelső héj befogadóképessége korlátozott.', 'cost' => 20],

                ['text' => 'Mi az abszolút nulla fok Celsiusban?',                       'answer' => '-273.15', 'digit' => 6, 'money' => 55, 'x' => 8, 'y' => 4,
                 'hint' => '0 Kelvin egyenértékű ezzel.', 'cost' => 30],

                ['text' => 'Melyik a legnehezebb természetes elem?',                     'answer' => 'urán', 'digit' => 9, 'money' => 50, 'x' => 9,  'y' => 1,
                 'hint' => 'Radioaktív, atomszáma 92.', 'cost' => 25],

                ['text' => 'Mi az ozon képlete?',                                        'answer' => 'O3',   'digit' => 0, 'money' => 30, 'x' => 10, 'y' => 3,
                 'hint' => 'Három oxigénatom alkotja.', 'cost' => 15],

                ['text' => 'Hány atomból áll egy vízimolekula?',                         'answer' => '3',    'digit' => 5, 'money' => 25, 'x' => 11, 'y' => 2,
                 'hint' => '2 hidrogén + 1 oxigén.', 'cost' => 10],

                ['text' => 'Mi a fény sebessége vákuumban (km/s)?',                      'answer' => '299792', 'digit' => 2, 'money' => 65, 'x' => 12, 'y' => 4,
                 'hint' => 'Kb. 300 000 km/s, de a pontos érték...', 'cost' => 40],

                ['text' => 'Melyik elem a periódusos rendszer 1. eleme?',               'answer' => 'hidrogén', 'digit' => 7, 'money' => 30, 'x' => 13, 'y' => 1,
                 'hint' => 'A legkönnyebb és leggyakoribb elem az univerzumban.', 'cost' => 15],

                ['text' => 'Mi a DNS rövidítés teljes neve magyarul?',                   'answer' => 'dezoxiribonukleinsav', 'digit' => 1, 'money' => 60, 'x' => 14, 'y' => 3,
                 'hint' => 'Az örökítő anyag neve.', 'cost' => 35],

                ['text' => 'Hány bázispár van az emberi genomban kb. (milliárd)?',       'answer' => '3',    'digit' => 4, 'money' => 55, 'x' => 15, 'y' => 2,
                 'hint' => 'Kb. 3 milliárd bázispár alkotja.', 'cost' => 30],

                ['text' => 'Mi az Einstein legismertebb képlete?',                       'answer' => 'E=mc2', 'digit' => 8, 'money' => 45, 'x' => 16, 'y' => 4,
                 'hint' => 'Energia, tömeg és fénysebesség kapcsolata.', 'cost' => 25],

                ['text' => 'Melyik részecskének nincs töltése?',                         'answer' => 'neutron', 'digit' => 3, 'money' => 40, 'x' => 17, 'y' => 1,
                 'hint' => 'Az atommag egyik alkotója, neve is a semlegességre utal.', 'cost' => 20],

                ['text' => 'Mi a konyhasó kémiai neve?',                                 'answer' => 'nátrium-klorid', 'digit' => 6, 'money' => 35, 'x' => 18, 'y' => 3,
                 'hint' => 'NaCl képletű vegyület.', 'cost' => 20],

                ['text' => 'Hány gramm egy mól víz?',                                   'answer' => '18',   'digit' => 9, 'money' => 40, 'x' => 19, 'y' => 2,
                 'hint' => '2×1 (H) + 16 (O) = ?', 'cost' => 20],

                ['text' => 'Melyik állat neve szerepel a "petri" szóban (petricska)?',   'answer' => 'egér', 'digit' => 0, 'money' => 30, 'x' => 20, 'y' => 4,
                 'hint' => 'A laborban is gyakori kísérleti állat.', 'cost' => 15],
            ],

            // ─── 3. PÁLYA: A Kastély Pincéje (LevelID = 3) ────────────────
            3 => [
                ['text' => 'Melyik évben épült a Buda vár?',                             'answer' => '1265', 'digit' => 6, 'money' => 55, 'x' => 1,  'y' => 2,
                 'hint' => 'IV. Béla idejében, a tatárjárás után.', 'cost' => 30],

                ['text' => 'Hány méter mélyen van egy tipikus várárok?',                 'answer' => '5',    'digit' => 3, 'money' => 30, 'x' => 2,  'y' => 1,
                 'hint' => 'Általában 3-7 méter mélységű szokott lenni.', 'cost' => 15],

                ['text' => 'Mi a neve a várak bejárati kapujának?',                      'answer' => 'kapu', 'digit' => 8, 'money' => 25, 'x' => 3,  'y' => 3,
                 'hint' => 'Ez egy nagyon egyszerű szó!', 'cost' => 10],

                ['text' => 'Melyik fegyver volt a középkor legfélelmetesebb ostromgépe?', 'answer' => 'trebuchet', 'digit' => 1, 'money' => 60, 'x' => 4, 'y' => 4,
                 'hint' => 'Ellenegyensúlyos katapult, franciáktól ered a neve.', 'cost' => 35],

                ['text' => 'Hány év a Száz Éves Háború?',                                'answer' => '116',  'digit' => 4, 'money' => 50, 'x' => 5,  'y' => 1,
                 'hint' => 'A neve ellenére nem pont 100 évig tartott (1337-1453).', 'cost' => 25],

                ['text' => 'Mi a neve a várban lakó úrnak?',                             'answer' => 'castellan', 'digit' => 7, 'money' => 45, 'x' => 6, 'y' => 3,
                 'hint' => 'A latin "castellum" szóból ered.', 'cost' => 25],

                ['text' => 'Hány lépcsőfok vezet általában egy középkori torony tetejére?', 'answer' => '100', 'digit' => 2, 'money' => 35, 'x' => 7, 'y' => 2,
                 'hint' => 'Általában 80-120 lépcsőfok szokott lenni.', 'cost' => 20],

                ['text' => 'Milyen anyagból készültek a középkori zárak?',               'answer' => 'vas',  'digit' => 5, 'money' => 30, 'x' => 8,  'y' => 4,
                 'hint' => 'Fémes, erős anyag, rozsdásodik.', 'cost' => 15],

                ['text' => 'Mi a neve a vár legbelső, legerősebb tornyának?',            'answer' => 'donjon', 'digit' => 9, 'money' => 55, 'x' => 9, 'y' => 1,
                 'hint' => 'Angolul "keep"-nek hívják.', 'cost' => 30],

                ['text' => 'Hány esztendős volt Mátyás király, amikor trónra lépett?',   'answer' => '15',   'digit' => 0, 'money' => 50, 'x' => 10, 'y' => 3,
                 'hint' => '1458-ban koronázták meg, 1443-ban született.', 'cost' => 25],

                ['text' => 'Mi a neve a középkori páncélnak?',                           'answer' => 'páncélzat', 'digit' => 6, 'money' => 35, 'x' => 11, 'y' => 2,
                 'hint' => 'Acélból készült, lovagok viselték.', 'cost' => 20],

                ['text' => 'Melyik városban található a Hohenzollern-kastély?',          'answer' => 'Hechingen', 'digit' => 3, 'money' => 65, 'x' => 12, 'y' => 4,
                 'hint' => 'Baden-Württemberg tartományban, Németországban.', 'cost' => 40],

                ['text' => 'Hány évig tartott a keresztes hadjáratok kora nagyjából?',   'answer' => '200',  'digit' => 8, 'money' => 55, 'x' => 13, 'y' => 1,
                 'hint' => '1095-től kb. 1291-ig tartott.', 'cost' => 30],

                ['text' => 'Mi az íjász másik neve?',                                   'answer' => 'nyilas', 'digit' => 1, 'money' => 30, 'x' => 14, 'y' => 3,
                 'hint' => 'A Nyilas csillagkép neve is ebből ered.', 'cost' => 15],

                ['text' => 'Hány vár található Magyarországon hozzávetőleg?',            'answer' => '1000', 'digit' => 4, 'money' => 50, 'x' => 15, 'y' => 2,
                 'hint' => 'Romokban is számítanak, kb. ezernyi van.', 'cost' => 25],

                ['text' => 'Mi a neve a kőből épített védőfal tetején lévő fogaknak?',  'answer' => 'pártázat', 'digit' => 7, 'money' => 60, 'x' => 16, 'y' => 4,
                 'hint' => 'Alternáló magasabb és alacsonyabb részek.', 'cost' => 35],

                ['text' => 'Melyik királyunk építtette a visegrádi palotát?',            'answer' => 'Mátyás', 'digit' => 2, 'money' => 45, 'x' => 17, 'y' => 1,
                 'hint' => 'A Hollós melléknéven is ismert királyunk.', 'cost' => 25],

                ['text' => 'Mi a neve a várárok vizének?',                               'answer' => 'vizesárok', 'digit' => 5, 'money' => 30, 'x' => 18, 'y' => 3,
                 'hint' => 'A várat víz veszi körül ebben az esetben.', 'cost' => 15],

                ['text' => 'Hány tonna követ mozgattak a Notre-Dame építésekor kb.?',    'answer' => '5000', 'digit' => 9, 'money' => 65, 'x' => 19, 'y' => 2,
                 'hint' => 'Több ezer tonna kő kellett hozzá.', 'cost' => 35],

                ['text' => 'Mi a neve a középkori mesterségek szervezetének?',           'answer' => 'céh',  'digit' => 0, 'money' => 35, 'x' => 20, 'y' => 4,
                 'hint' => 'Rövid, egyszerű szó, kézművesek alkották.', 'cost' => 20],
            ],

            // ─── 4. PÁLYA: A Kapitány Kabinja (LevelID = 4) ───────────────
            4 => [
                ['text' => 'Mi a neve az iránytű magnetikus északi irányának?',          'answer' => 'mágneses észak', 'digit' => 4, 'money' => 50, 'x' => 1, 'y' => 2,
                 'hint' => 'Nem egyezik meg a földrajzi északi pólussal.', 'cost' => 25],

                ['text' => 'Hány fok egy teljes szélrózsa?',                             'answer' => '360',  'digit' => 9, 'money' => 30, 'x' => 2,  'y' => 1,
                 'hint' => 'Ugyanannyi, mint egy teljes kör.', 'cost' => 15],

                ['text' => 'Mi a neve a hajó legfőbb kormányzójának?',                   'answer' => 'kapitány', 'digit' => 2, 'money' => 25, 'x' => 3, 'y' => 3,
                 'hint' => 'Ez a szoba is az övé!', 'cost' => 10],

                ['text' => 'Melyik óceán a legnagyobb?',                                 'answer' => 'Csendes-óceán', 'digit' => 7, 'money' => 40, 'x' => 4, 'y' => 4,
                 'hint' => 'A Föld felszínének majdnem felét lefedi.', 'cost' => 20],

                ['text' => 'Hány csomó = 1 tengeri mérföld/óra?',                        'answer' => '1',    'digit' => 5, 'money' => 30, 'x' => 5,  'y' => 1,
                 'hint' => 'A csomó és a tengeri mérföld/óra ugyanaz!', 'cost' => 15],

                ['text' => 'Mi a neve a hajó hátsó részének?',                           'answer' => 'far',  'digit' => 3, 'money' => 30, 'x' => 6,  'y' => 3,
                 'hint' => 'Az orrral ellentétes rész.', 'cost' => 15],

                ['text' => 'Melyik évben süllyedt el a Titanic?',                        'answer' => '1912', 'digit' => 8, 'money' => 45, 'x' => 7,  'y' => 2,
                 'hint' => 'Az első és egyben utolsó útján, április 15-én.', 'cost' => 25],

                ['text' => 'Hány méter a Titanic hossza?',                               'answer' => '269',  'digit' => 1, 'money' => 55, 'x' => 8,  'y' => 4,
                 'hint' => 'Kb. 270 méter, majdnem három futballpálya.', 'cost' => 30],

                ['text' => 'Mi a neve a kalózok zászlajának?',                           'answer' => 'Jolly Roger', 'digit' => 6, 'money' => 40, 'x' => 9, 'y' => 1,
                 'hint' => 'Koponyás-keresztcsontú fekete zászló.', 'cost' => 20],

                ['text' => 'Hány tengerész mérföld = 1 km?',                             'answer' => '0.54', 'digit' => 0, 'money' => 60, 'x' => 10, 'y' => 3,
                 'hint' => '1 tengeri mérföld = 1.852 km, tehát fordítva...', 'cost' => 35],

                ['text' => 'Mi a neve a hajótest alján lévő gerincnek?',                 'answer' => 'gerinc', 'digit' => 4, 'money' => 45, 'x' => 11, 'y' => 2,
                 'hint' => 'Az emberi testben is van ilyen!', 'cost' => 25],

                ['text' => 'Melyik navigator találta fel a szextánst?',                  'answer' => 'John Hadley', 'digit' => 9, 'money' => 65, 'x' => 12, 'y' => 4,
                 'hint' => '1731-ben alkotta meg az eszközt.', 'cost' => 40],

                ['text' => 'Mi a neve a hajón az ivóvíz tárolójának?',                   'answer' => 'víztartály', 'digit' => 2, 'money' => 35, 'x' => 13, 'y' => 1,
                 'hint' => 'Hosszú utakon elengedhetetlen.', 'cost' => 20],

                ['text' => 'Hány szélesség fok adja meg az egyenlítőt?',                 'answer' => '0',    'digit' => 7, 'money' => 30, 'x' => 14, 'y' => 3,
                 'hint' => 'Ez az alapvonal, ahonnan az északi és déli szélességet mérik.', 'cost' => 15],

                ['text' => 'Mi a neve a viharjelző vörös égboltnak?',                    'answer' => 'piros ég', 'digit' => 5, 'money' => 35, 'x' => 15, 'y' => 2,
                 'hint' => '"Red sky at night, sailors delight..."', 'cost' => 20],

                ['text' => 'Hány fokos a tájolás észak-keletre?',                        'answer' => '45',   'digit' => 3, 'money' => 40, 'x' => 16, 'y' => 4,
                 'hint' => 'Az észak (0°) és a kelet (90°) között félúton.', 'cost' => 20],

                ['text' => 'Mi a SOS kód Morse-ban?',                                    'answer' => '... --- ...', 'digit' => 8, 'money' => 55, 'x' => 17, 'y' => 1,
                 'hint' => '3 pont, 3 vonal, 3 pont.', 'cost' => 30],

                ['text' => 'Melyik tenger a legsósabb a világon?',                       'answer' => 'Holt-tenger', 'digit' => 1, 'money' => 45, 'x' => 18, 'y' => 3,
                 'hint' => 'Ide nem lehet elsüllyedni úszás közben.', 'cost' => 25],

                ['text' => 'Hány millió km² a Csendes-óceán területe?',                  'answer' => '165',  'digit' => 6, 'money' => 60, 'x' => 19, 'y' => 2,
                 'hint' => 'Kb. 165 millió km², a Föld felszínének ~33%-a.', 'cost' => 35],

                ['text' => 'Mi a neve a hajó orr-vitorlájának?',                         'answer' => 'fok',  'digit' => 0, 'money' => 40, 'x' => 20, 'y' => 4,
                 'hint' => 'A hajó első, hegyes végéhez kapcsolódik.', 'cost' => 20],
            ],

            // ─── 5. PÁLYA: Az Űrállomás (LevelID = 5) ─────────────────────
            5 => [
                ['text' => 'Melyik bolygó a legnagyobb a Naprendszerben?',               'answer' => 'Jupiter', 'digit' => 7, 'money' => 40, 'x' => 1, 'y' => 2,
                 'hint' => 'Nagy Vörös Folt nevű vihar tombol rajta.', 'cost' => 20],

                ['text' => 'Hány perc alatt ér a fény a Napból a Földre?',               'answer' => '8',    'digit' => 3, 'money' => 35, 'x' => 2,  'y' => 1,
                 'hint' => 'Kb. 8 perc, pontosan 8 perc 20 másodperc.', 'cost' => 20],

                ['text' => 'Mi a neve az ISS-nek magyarul?',                             'answer' => 'Nemzetközi Űrállomás', 'digit' => 9, 'money' => 30, 'x' => 3, 'y' => 3,
                 'hint' => 'International Space Station – magyarul...', 'cost' => 15],

                ['text' => 'Hány éve tart az univerzum kora hozzávetőleg (milliárd)?',   'answer' => '13.8', 'digit' => 1, 'money' => 65, 'x' => 4,  'y' => 4,
                 'hint' => 'A Nagy Bumm óta telt el ennyi idő.', 'cost' => 40],

                ['text' => 'Melyik bolygónak van gyűrűje?',                              'answer' => 'Szaturnusz', 'digit' => 5, 'money' => 35, 'x' => 5, 'y' => 1,
                 'hint' => 'Jégből és kőzetből álló gyűrűi vannak.', 'cost' => 20],

                ['text' => 'Mi a neve a Föld egyetlen természetes holdjának?',           'answer' => 'Hold', 'digit' => 2, 'money' => 25, 'x' => 6,  'y' => 3,
                 'hint' => 'Minden este látható az égbolton (ha tiszta).', 'cost' => 10],

                ['text' => 'Hány km/s az első kozmikus sebesség?',                       'answer' => '7.9',  'digit' => 8, 'money' => 60, 'x' => 7,  'y' => 2,
                 'hint' => 'Ez a Föld körüli keringéshez szükséges sebesség.', 'cost' => 35],

                ['text' => 'Melyik ûrhajós volt az első ember a Holdon?',                'answer' => 'Neil Armstrong', 'digit' => 4, 'money' => 45, 'x' => 8, 'y' => 4,
                 'hint' => '1969. július 20-án lépett a Hold felszínére.', 'cost' => 25],

                ['text' => 'Mi a neve a Mars két holdjának egyike?',                     'answer' => 'Phobos', 'digit' => 6, 'money' => 55, 'x' => 9, 'y' => 1,
                 'hint' => 'A másik Deimos. Ez a görög "félelem" szó.', 'cost' => 30],

                ['text' => 'Hány bolygó van a Naprendszerben?',                          'answer' => '8',    'digit' => 0, 'money' => 25, 'x' => 10, 'y' => 3,
                 'hint' => 'Plútót 2006-ban törölték a listáról.', 'cost' => 10],

                ['text' => 'Mi a neve a fekete lyuk körüli határnak?',                   'answer' => 'eseményhorizont', 'digit' => 7, 'money' => 70, 'x' => 11, 'y' => 2,
                 'hint' => 'Ezen belülről már semmi sem tud kijutni.', 'cost' => 45],

                ['text' => 'Melyik évben jutott először ember a Holdra?',                'answer' => '1969', 'digit' => 3, 'money' => 40, 'x' => 12, 'y' => 4,
                 'hint' => 'Az Apollo 11 küldetés éve.', 'cost' => 20],

                ['text' => 'Mi az oxigén vegyjele?',                                     'answer' => 'O',    'digit' => 9, 'money' => 20, 'x' => 13, 'y' => 1,
                 'hint' => 'Az ábécé 15. betűje.', 'cost' => 10],

                ['text' => 'Hány Kelvin a Nap felszíni hőmérséklete?',                   'answer' => '5778', 'digit' => 1, 'money' => 65, 'x' => 14, 'y' => 3,
                 'hint' => 'Kb. 5500 Celsius fok, ami kb. ennyi Kelvin.', 'cost' => 40],

                ['text' => 'Mi a neve a Tejútrendszer középpontja körüli fekete lyuknak?', 'answer' => 'Sagittarius A*', 'digit' => 5, 'money' => 75, 'x' => 15, 'y' => 2,
                 'hint' => 'A Nyilas csillagkép irányában található.', 'cost' => 45],

                ['text' => 'Hány évig tart a Halley-üstökös keringési ideje?',           'answer' => '75',   'digit' => 2, 'money' => 55, 'x' => 16, 'y' => 4,
                 'hint' => 'Kb. 75-76 évenként látható a Földről.', 'cost' => 30],

                ['text' => 'Melyik bolygón vannak az Olimposz-hegyek (legmagasabb a Naprendszerben)?', 'answer' => 'Mars', 'digit' => 8, 'money' => 50, 'x' => 17, 'y' => 1,
                 'hint' => 'A vörös bolygón, ~22 km magas.', 'cost' => 25],

                ['text' => 'Mi a neve az űrruha levegőellátó rendszerének rövidítve?',   'answer' => 'PLSS', 'digit' => 4, 'money' => 60, 'x' => 18, 'y' => 3,
                 'hint' => 'Portable Life Support System.', 'cost' => 35],

                ['text' => 'Hány napja van a Mars évének (sol)?',                        'answer' => '687',  'digit' => 6, 'money' => 55, 'x' => 19, 'y' => 2,
                 'hint' => 'A Mars lassabban kering a Nap körül, mint a Föld.', 'cost' => 30],

                ['text' => 'Mi a neve az űrben való mozgáshoz szükséges egyenletnek?',   'answer' => 'Tsiolkovsky-egyenlet', 'digit' => 0, 'money' => 70, 'x' => 20, 'y' => 4,
                 'hint' => 'Orosz rakétatudós nevét viseli.', 'cost' => 45],
            ],
        ];

        foreach ($levelQuestions as $levelId => $questions) {
            foreach ($questions as $q) {
                $question = Question::create([
                    'LevelID'       => $levelId,
                    'QuestionText'  => $q['text'],
                    'CorrectAnswer' => $q['answer'],
                    'RewardDigit'   => $q['digit'],
                    'MoneyReward'   => $q['money'],
                    'PositionX'     => $q['x'],
                    'PositionY'     => $q['y'],
                ]);

                Hint::create([
                    'QuestionID' => $question->QuestionID,
                    'HintText'   => $q['hint'],
                    'Cost'       => $q['cost'],
                    'HintOrder'  => 1,
                ]);
            }
        }
    }
}
