<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Rozpiski;
use App\Cars;
use App\Trailers;
use App\Firms;

class RozpiskiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rozpiski = Rozpiski::where('kierowca', Auth::user()->name)->where('status', '0')->get();
        $rozpiskipop = Rozpiski::where('kierowca', Auth::user()->name)->where('status', '3')->get();
        return view('rozpiski.index')->with(compact(['rozpiski', 'rozpiskipop']));
    }

    public function admin()
    {
        $rozpiski = Rozpiski::where('status', '1')->orderBy('kierowca', 'DESC')->get();
        return view('rozpiski.admin', compact('rozpiski'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $podstawka = array("Austria", "Belgia", "Czechy", "Francja", "Holandia", "Luxembourg", "Niemcy", "Słowacja", "Szwajcaria", "Wielka Brytania", "Italia", "Polska");
        $promods = array("Andora","Austria","Belgia","Bośnia i Hercegowina","Bułgaria","Chorwacja","Cypr","Czechy","Dania","Estonia","Finlandia","Francja","Grecja","Hiszpania","Holandia","Irlandia","Islandia","Italia","Liechtenstein","Litwa","Łotwa","Macedonia","Mołdawia","Niemcy","Norwegia","Polska","Rumunia");
        $going = array("Węgry");
        $skan = array("Szwecja");
        $rus = array("Białoruś", "Rosja");

        if(Auth::user()->going == 1) {
            $podstawka = array_merge($podstawka, $going);
        }
        if(Auth::user()->skan == 1) {
            $podstawka = array_merge($podstawka, $skan);
        }
        if(Auth::user()->rusmapa == 1) {
            $podstawka = array_merge($podstawka, $rus);
        }
        if(Auth::user()->promods == 1) {
            $podstawka = array_merge($podstawka, $promods);
        }

        $kraje = array("Polska", "Niemcy", "Holandia", "Belgia");
        $losuj_kraj=array_rand($podstawka,2);
        for($i = 0; $i<5; $i++) {
            $rozpiska = new Rozpiski;
            $rozpiska->kraj1 = $podstawka[array_rand($podstawka)];
            $rozpiska->miasto1 = '';
            $rozpiska->kraj2 = $podstawka[array_rand($podstawka)];
            $rozpiska->miasto2 = '';
            $rozpiska->kmpuste = '';
            $rozpiska->kmztowarem = '';
            $rozpiska->koszty = '';
            $rozpiska->paliwo = '';
            $rozpiska->kierowca = Auth::user()->name;
            $rozpiska->status = '0';
            $rozpiska->save();
        }
        return redirect()->route('rozpiski.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rozpiski $rozpiska)
    {
        $miasta = array('Graz' =>'Graz', 
        'Innsbruck' =>'Innsbruck', 
        'Klagenfurt' =>'Klagenfurt', 
        'Linz' =>'Linz', 
        'Salzburg' =>'Salzburg', 
        'Wien' =>'Wien', 
        'Bruksela' =>'Bruksela', 
        'Liege' =>'Liege', 
        'Brno' =>'Brno', 
        'Praga' =>'Praga', 
        'Calais' =>'Calais', 
        'Dijon' =>'Dijon', 
        'Lille' =>'Lille', 
        'Lyon' =>'Lyon', 
        'Metz' =>'Metz', 
        'Paris' =>'Paris', 
        'Reims' =>'Reims', 
        'Strasbourg' =>'Strasbourg', 
        'Amsterdam' =>'Amsterdam', 
        'Europoort' =>'Europoort', 
        'Groningen' =>'Groningen', 
        'Ijmuiden' =>'Ijmuiden', 
        'Rotterdam' =>'Rotterdam', 
        'Luxembourg' =>'Luxembourg', 
        'Berlin' =>'Berlin', 
        'Bremen' =>'Bremen', 
        'Dortmund' =>'Dortmund', 
        'Dresden' =>'Dresden', 
        'Duisburg' =>'Duisburg', 
        'Düsseldorf' =>'Düsseldorf', 
        'Erfurt' =>'Erfurt', 
        'Frankfurt' =>'Frankfurt', 
        'Hamburg' =>'Hamburg', 
        'Hannover' =>'Hannover', 
        'Kassel' =>'Kassel', 
        'Kiel' =>'Kiel', 
        'Leipzig' =>'Leipzig', 
        'Koln' =>'Koln', 
        'Magdeburg' =>'Magdeburg', 
        'Mannheim' =>'Mannheim', 
        'München' =>'München', 
        'Nurnberg' =>'Nurnberg', 
        'Osnabruck' =>'Osnabruck', 
        'Rostock' =>'Rostock', 
        'Stuttgart' =>'Stuttgart', 
        'Travemunde' =>'Travemunde', 
        'Bratysława' =>'Bratysława', 
        'Bern' =>'Bern', 
        'Geneve' =>'Geneve', 
        'Zürich' =>'Zürich', 
        'Aberdeen' =>'Aberdeen', 
        'Birmingham' =>'Birmingham', 
        'Cambridge' =>'Cambridge', 
        'Cardiff' =>'Cardiff', 
        'Carlisle' =>'Carlisle', 
        'Dover' =>'Dover', 
        'Edinburgh' =>'Edinburgh', 
        'Felixstowe' =>'Felixstowe', 
        'Glasgow' =>'Glasgow', 
        'Grimsby' =>'Grimsby', 
        'Harwich' =>'Harwich', 
        'Hull' =>'Hull', 
        'Liverpool' =>'Liverpool', 
        'London' =>'London', 
        'Manchester' =>'Manchester', 
        'Newcastle' =>'Newcastle', 
        'Plymouth' =>'Plymouth', 
        'Sheffield' =>'Sheffield', 
        'Southampton' =>'Southampton', 
        'Swansea' =>'Swansea', 
        'Milano' =>'Milano', 
        'Torino' =>'Torino', 
        'Venezia' =>'Venezia', 
        'Verona' =>'Verona', 
        'Poznań' =>'Poznań', 
        'Szczecin' =>'Szczecin', 
        'Wrocław' =>'Wrocław',  
        'Andorra' =>'Andorra', 
        'Basel' =>'Basel', 
        'Grodig' =>'Grodig', 
        'Hainburg' =>'Hainburg', 
        'Obsteig' =>'Obsteig', 
        'Reutte' =>'Reutte', 
        'Antwerp' =>'Antwerp', 
        'Banja luka' =>'Banja luka', 
        'Doboj' =>'Doboj', 
        'Błagojewgrad' =>'Błagojewgrad', 
        'Edirne' =>'Edirne', 
        'Montana' =>'Montana', 
        'Widyń' =>'Widyń', 
        'Nowy Sad' =>'Nowy Sad', 
        'Osijek' =>'Osijek', 
        'Rijeka' =>'Rijeka', 
        'Slawonski Brod' =>'Slawonski Brod', 
        'Virovitica' =>'Virovitica', 
        'Zagreb' =>'Zagreb', 
        'Zrenjanin' =>'Zrenjanin', 
        'Ploce' =>'Ploce', 
        'Senj' =>'Senj', 
        'Sibenik' =>'Sibenik', 
        'Split' =>'Split', 
        'Zadar' =>'Zadar', 
        'Zuta' =>'Zuta', 
        'Larnaka' =>'Larnaka', 
        'Nikozja' =>'Nikozja', 
        'Limassol' =>'Limassol', 
        'Pafos' =>'Pafos', 
        'Jihlava' =>'Jihlava', 
        'Mlada Boleslav' =>'Mlada Boleslav', 
        'Olomouc' =>'Olomouc', 
        'Aarhus' =>'Aarhus', 
        'Herning' =>'Herning', 
        'Holstebro' =>'Holstebro', 
        'Kolding' =>'Kolding', 
        'Lellinge' =>'Lellinge', 
        'Padborg' =>'Padborg', 
        'Ronne' =>'Ronne', 
        'Viborg' =>'Viborg',  
        'Haapsalu' =>'Haapsalu', 
        'Kardla' =>'Kardla', 
        'Kuressaare' =>'Kuressaare', 
        'Ogre' =>'Ogre', 
        'Rakvere' =>'Rakvere', 
        'Saare' =>'Saare', 
        'Valga' =>'Valga', 
        'Alajarvi' =>'Alajarvi', 
        'Hameenlinna' =>'Hameenlinna', 
        'Ivalo' =>'Ivalo', 
        'Joensuu' =>'Joensuu', 
        'Jyvaskyla' =>'Jyvaskyla', 
        'Karsamaki' =>'Karsamaki', 
        'Kemi' =>'Kemi', 
        'Kemijarvi' =>'Kemijarvi', 
        'Kittila' =>'Kittila', 
        'Kokkola' =>'Kokkola', 
        'Kristiinankaupunki' =>'Kristiinankaupunki', 
        'Kuopio' =>'Kuopio', 
        'Kuusamo' =>'Kuusamo', 
        'Mikkeli' =>'Mikkeli', 
        'Oulu' =>'Oulu', 
        'Pello' =>'Pello', 
        'Porvoo' =>'Porvoo', 
        'Rovaniemi' =>'Rovaniemi', 
        'Sodankyla' =>'Sodankyla', 
        'Tornio' =>'Tornio', 
        'Utsjoki' =>'Utsjoki', 
        'Vaasa' =>'Vaasa', 
        'Vantaa' =>'Vantaa', 
        'Varkaus' =>'Varkaus', 
        'Viitasaari' =>'Viitasaari', 
        'Angers' =>'Angers', 
        'Bayonne' =>'Bayonne', 
        'Caen' =>'Caen', 
        'Cherbourg' =>'Cherbourg', 
        'Lellinge' =>'Lellinge', 
        'Liepaja' =>'Liepaja', 
        'Lorient' =>'Lorient', 
        'Narbonne' =>'Narbonne', 
        'Pau' =>'Pau', 
        'Perpignan' =>'Perpignan', 
        'Poitiers' =>'Poitiers', 
        'Renne' =>'Renne', 
        'Rouen' =>'Rouen', 
        'Tours' =>'Tours', 
        'Orleans' =>'Orleans', 
        'Aleksandropolis' =>'Aleksandropolis', 
        'Igoumenitsa' =>'Igoumenitsa', 
        'Janina' =>'Janina', 
        'Kawala' =>'Kawala', 
        'Ptolemaida' =>'Ptolemaida', 
        'Seres' =>'Seres', 
        'Saloniki' =>'Saloniki', 
        'Trikala' =>'Trikala', 
        'Barcelona' =>'Barcelona', 
        'Bilbao' =>'Bilbao', 
        'Canfranc' =>'Canfranc', 
        'Cuenca' =>'Cuenca', 
        'Donastia' =>'Donastia', 
        'Huesca' =>'Huesca', 
        'Irun' =>'Irun', 
        'Jaca' =>'Jaca', 
        'Jonquera' =>'Jonquera', 
        'Lleida' =>'Lleida', 
        'Manresa' =>'Manresa', 
        'Pamplona' =>'Pamplona', 
        'Soria' =>'Soria', 
        'Turuel' =>'Turuel', 
        'Valencia' =>'Valencia', 
        'Vinaros' =>'Vinaros', 
        'Zaragoza' =>'Zaragoza', 
        'Arnhem' =>'Arnhem', 
        'Eindhoven' =>'Eindhoven', 
        'Moerdijk' =>'Moerdijk', 
        'Zwolle' =>'Zwolle', 
        'Belfast' =>'Belfast', 
        'Dublin' =>'Dublin', 
        'Galway' =>'Galway', 
        'Larne' =>'Larne', 
        'Limerick' =>'Limerick', 
        'Lisburn' =>'Lisburn', 
        'Londonderry' =>'Londonderry', 
        'Sligo' =>'Sligo', 
        'Wexford' =>'Wexford', 
        'Akranes' =>'Akranes', 
        'Akureyri' =>'Akureyri', 
        'Alajarvi' =>'Alajarvi', 
        'Blonduos' =>'Blonduos', 
        'Bolungarvik' =>'Bolungarvik', 
        'Borganes' =>'Borganes', 
        'Fjardabyggd' =>'Fjardabyggd', 
        'Hofn' =>'Hofn', 
        'Holmavik' =>'Holmavik', 
        'Isafjordur' =>'Isafjordur', 
        'Keflavik' =>'Keflavik', 
        'Krafla' =>'Krafla', 
        'Olafsvik' =>'Olafsvik', 
        'Reykjavik' =>'Reykjavik', 
        'Reydar' =>'Reydar', 
        'Selfoss' =>'Selfoss', 
        'Seydis' =>'Seydis', 
        'Vastmannaeyjar' =>'Vastmannaeyjar', 
        'Vik' =>'Vik', 
        'Drammen' =>'Drammen', 
        'Lecco' =>'Lecco', 
        'Modena' =>'Modena', 
        'Trieste' =>'Trieste', 
        'Udine' =>'Udine', 
        'Vicenza' =>'Vicenza', 
        'Vaduz' =>'Vaduz', 
        'Marijampole' =>'Marijampole', 
        'Panevezys' =>'Panevezys', 
        'Taurage' =>'Taurage', 
        'Ukmerge' =>'Ukmerge', 
        'Balvi' =>'Balvi', 
        'Gulbene' =>'Gulbene', 
        'Jekabpils' =>'Jekabpils', 
        'Kolka' =>'Kolka', 
        'Rukums' =>'Rukums', 
        'Saldus' =>'Saldus', 
        'Valka' =>'Valka', 
        'Bitola' =>'Bitola', 
        'Ohrid' =>'Ohrid', 
        'Skopje' =>'Skopje', 
        'Prilep' =>'Prilep', 
        'Stip' =>'Stip',  
        'Balti' =>'Balti', 
        'Chisinau' =>'Chisinau', 
        'Aurach' =>'Aurach', 
        'Badoo' =>'Badoo', 
        'Bonn' =>'Bonn', 
        'Bremerhaven' =>'Bremerhaven', 
        'Burg' =>'Burg', 
        'Cuxhaven' =>'Cuxhaven', 
        'Flensburg' =>'Flensburg', 
        'Forst' =>'Forst', 
        'Furth' =>'Furth', 
        'Geisel' =>'Geisel', 
        'Halle' =>'Halle', 
        'Heilbronn' =>'Heilbronn', 
        'Koblenz' =>'Koblenz', 
        'Mainz' =>'Mainz', 
        'Oberhausen' =>'Oberhausen', 
        'Puttgarden' =>'Puttgarden', 
        'Sangerhausen' =>'Sangerhausen', 
        'Uelzen' =>'Uelzen', 
        'Ulm' =>'Ulm', 
        'Wiesbaden' =>'Wiesbaden', 
        'Dombas' =>'Dombas', 
        'Drammne' =>'Drammne', 
        'Gardermoen' =>'Gardermoen', 
        'Geilo' =>'Geilo', 
        'Grumantbyen' =>'Grumantbyen', 
        'Hamar' =>'Hamar', 
        'Hiothhamn' =>'Hiothhamn', 
        'Honefoss' =>'Honefoss', 
        'Honningsvag' =>'Honningsvag', 
        'Kirkenes' =>'Kirkenes', 
        'Lillehammer' =>'Lillehammer', 
        'Longyearbyem' =>'Longyearbyem', 
        'Longyearbyen' =>'Longyearbyen', 
        'Oppdal' =>'Oppdal', 
        'Orkanger' =>'Orkanger', 
        'Otta' =>'Otta', 
        'Svalsateast' =>'Svalsateast', 
        'Tanabru' =>'Tanabru', 
        'Trondheim' =>'Trondheim', 
        'Augustów' =>'Augustów', 
        'Belda' =>'Belda', 
        'Bielsko-Biała' =>'Bielsko-Biała', 
        'Bobolice' =>'Bobolice', 
        'Busko' =>'Busko', 
        'Bydgoszcz' =>'Bydgoszcz', 
        'Cieszyn' =>'Cieszyn', 
        'Człuchów' =>'Człuchów', 
        'Dziwnówek' =>'Dziwnówek', 
        'Elbląg' =>'Elbląg', 
        'Ełk' =>'Ełk', 
        'Gdynia' =>'Gdynia', 
        'Giżycko' =>'Giżycko', 
        'Gorzów Wielkopolski' =>'Gorzów Wielkopolski', 
        'Grudziądz' =>'Grudziądz', 
        'Iława' =>'Iława', 
        'Iłowa' =>'Iłowa', 
        'Iłża' =>'Iłża', 
        'Janów Lubelski' =>'Janów Lubelski', 
        'Jaworznia' =>'Jaworznia', 
        'Kielce' =>'Kielce', 
        'Koszalin' =>'Koszalin', 
        'Krosno' =>'Krosno', 
        'Legnica' =>'Legnica', 
        'Łeba' =>'Łeba', 
        'Łomża' =>'Łomża', 
        'Międzyzdroje' =>'Międzyzdroje', 
        'Mikołajki' =>'Mikołajki', 
        'Mrągowo' =>'Mrągowo', 
        'Nowogard' =>'Nowogard', 
        'Olszyna' =>'Olszyna', 
        'Opatów' =>'Opatów', 
        'Opole' =>'Opole', 
        'Ostrołęka' =>'Ostrołęka', 
        'Ostróda' =>'Ostróda', 
        'Ostrów Mazowiecka' =>'Ostrów Mazowiecka', 
        'Piła' =>'Piła', 
        'Piotrków Trybunalski' =>'Piotrków Trybunalski', 
        'Płock' =>'Płock', 
        'Przemyśl' =>'Przemyśl', 
        'Radmo' =>'Radmo', 
        'Reda' =>'Reda', 
        'Rumia' =>'Rumia', 
        'Rusinowo' =>'Rusinowo', 
        'Rzeszów' =>'Rzeszów', 
        'Sanok' =>'Sanok', 
        'Siedlce' =>'Siedlce', 
        'Sopot' =>'Sopot', 
        'Stargard' =>'Stargard', 
        'Strzelce Krajeńskie' =>'Strzelce Krajeńskie', 
        'Suwałki' =>'Suwałki', 
        'Szczecinek' =>'Szczecinek', 
        'Świnoujście' =>'Świnoujście', 
        'Wałcz' =>'Wałcz', 
        'Wejherowo' =>'Wejherowo', 
        'Zamość' =>'Zamość', 
        'Zgierz' =>'Zgierz', 
        'Zgorzelec' =>'Zgorzelec', 
        'Arad' =>'Arad', 
        'Baiamare' =>'Baiamare', 
        'Balvi' =>'Balvi', 
        'Nyujfalu' =>'Nyujfalu', 
        'Oradea' =>'Oradea', 
        'Piatra' =>'Piatra', 
        'Satumare' =>'Satumare', 
        'Sibu' =>'Sibu', 
        'Białystok' =>'Białystok', 
        'Gdańsk' =>'Gdańsk', 
        'Katowice' =>'Katowice', 
        'Lublin' =>'Lublin', 
        'Łódź' =>'Łódź', 
        'Olsztyn' =>'Olsztyn', 
        'Warszawa' =>'Warszawa', 
        'Banska Bystrica' =>'Banska Bystrica', 
        'Kosice' =>'Kosice', 
        'Ostrava' =>'Ostrava', 
        'Budapest' =>'Budapest', 
        'Debrecen' =>'Debrecen', 
        'Pecs' =>'Pecs', 
        'Szeged' =>'Szeged', 
        'Aalborg' =>'Aalborg', 
        'Esbjerg' =>'Esbjerg', 
        'Frederikshavn' =>'Frederikshavn', 
        'Gedser' =>'Gedser', 
        'Hirtshals' =>'Hirtshals', 
        'Kobenhavn' =>'Kobenhavn', 
        'Odense' =>'Odense', 
        'Bergen' =>'Bergen', 
        'Kristiansand' =>'Kristiansand', 
        'Oslo' =>'Oslo', 
        'Stavanger' =>'Stavanger', 
        'Goteborg' =>'Goteborg', 
        'Helsinborg' =>'Helsinborg', 
        'Jonkoping' =>'Jonkoping', 
        'Kalmar' =>'Kalmar', 
        'Kapellskar' =>'Kapellskar', 
        'Karlskrona' =>'Karlskrona', 
        'Linkoping' =>'Linkoping', 
        'Malmo' =>'Malmo', 
        'Nynashamn' =>'Nynashamn', 
        'Orebro' =>'Orebro', 
        'Stockholm' =>'Stockholm', 
        'Sodertalje' =>'Sodertalje', 
        'Trelleborg' =>'Trelleborg', 
        'Uppsala' =>'Uppsala', 
        'Vasteraas' =>'Vasteraas', 
        'Vaxjo' =>'Vaxjo', 
        'Ajaccio' =>'Ajaccio', 
        'Bastia' =>'Bastia', 
        'Bonifacio' =>'Bonifacio', 
        'Bordeaux' =>'Bordeaux', 
        'Bourges' =>'Bourges', 
        'Brest' =>'Brest', 
        'Calvi' =>'Calvi', 
        'Civaux' =>'Civaux', 
        'Clermont-Ferrand' =>'Clermont-Ferrand', 
        'Golfech' =>'Golfech', 
        'La Rochelle' =>'La Rochelle', 
        'Le Havre' =>'Le Havre', 
        'Le Mans' =>'Le Mans', 
        'Limoges' =>'Limoges', 
        'Marseille' =>'Marseille', 
        'Montpellier' =>'Montpellier', 
        'Nantes' =>'Nantes', 
        'Nice' =>'Nice', 
        'Paluel' =>'Paluel', 
        'Porto-Vecchio' =>'Porto-Vecchio', 
        'Rennes' =>'Rennes', 
        'Roscoff' =>'Roscoff', 
        'Saint-Alban' =>'Saint-Alban', 
        'Saint-Laurent' =>'Saint-Laurent', 
        'Toulouse' =>'Toulouse', 
        'Ancona' =>'Ancona', 
        'Bari' =>'Bari', 
        'Bologna' =>'Bologna', 
        'Cagliari' =>'Cagliari', 
        'Cassino' =>'Cassino', 
        'Catania' =>'Catania', 
        'Catanzaro' =>'Catanzaro', 
        'Firenze' =>'Firenze', 
        'Genova' =>'Genova', 
        'Livorno' =>'Livorno', 
        'Messina' =>'Messina', 
        'Napoli' =>'Napoli', 
        'Olbia' =>'Olbia', 
        'Palermo' =>'Palermo', 
        'Parma' =>'Parma', 
        'Pescara' =>'Pescara', 
        'Roma' =>'Roma', 
        'Sassari' =>'Sassari', 
        'Suzzara' =>'Suzzara', 
        'Taranto' =>'Taranto', 
        'Terni' =>'Terni', 
        'Villa San Giovanni' =>'Villa San Giovanni', 
        'Kaunas' =>'Kaunas', 
        'Klaipeda' =>'Klaipeda', 
        'Możejki' =>'Możejki', 
        'Panevezys' =>'Panevezys', 
        'Szawle' =>'Szawle', 
        'Utena' =>'Utena', 
        'Wilno' =>'Wilno', 
        'Daugavpils' =>'Daugavpils', 
        'Liepaja' =>'Liepaja', 
        'Rezekne' =>'Rezekne', 
        'Riga' =>'Riga', 
        'Valmiera' =>'Valmiera', 
        'Ventspils' =>'Ventspils', 
        'Kaliningrad' =>'Kaliningrad', 
        'Luga' =>'Luga', 
        'Pskov' =>'Pskov', 
        'Saint Petersburg' =>'Saint Petersburg', 
        'Sosnovy Bor' =>'Sosnovy Bor', 
        'Vyborg' =>'Vyborg', 
        'Kunda' =>'Kunda', 
        'Narva' =>'Narva', 
        'Paldiski' =>'Paldiski', 
        'Pärnu' =>'Pärnu', 
        'Tallinn' =>'Tallinn', 
        'Tartu' =>'Tartu', 
        'Helsinki' =>'Helsinki', 
        'Kotka' =>'Kotka', 
        'Kouvola' =>'Kouvola', 
        'Lahti' =>'Lahti', 
        'Loviisa' =>'Loviisa', 
        'Naantali' =>'Naantali', 
        'Olkiluoto' =>'Olkiluoto', 
        'Pori' =>'Pori', 
        'Tampere' =>'Tampere', 
        'Turku' =>'Turku', 
        'Burgas' =>'Burgas', 
        'Karlovo' =>'Karlovo', 
        'Kozloduy' =>'Kozloduy', 
        'Pernik' =>'Pernik', 
        'Pirdop' =>'Pirdop', 
        'Pleven' =>'Pleven', 
        'Plovdiv' =>'Plovdiv', 
        'Ruse' =>'Ruse', 
        'Sofia' =>'Sofia', 
        'Varna' =>'Varna', 
        'Veliko Tarnovo' =>'Veliko Tarnovo', 
        'Bacau' =>'Bacau', 
        'Brasov' =>'Brasov', 
        'Bucaresti' =>'Bucaresti', 
        'Calarasi' =>'Calarasi', 
        'Cernavoda' =>'Cernavoda', 
        'Cluj-Napoca' =>'Cluj-Napoca', 
        'Constanta' =>'Constanta', 
        'Craiova' =>'Craiova', 
        'Galati' =>'Galati', 
        'Hunedoara' =>'Hunedoara', 
        'Iasi' =>'Iasi', 
        'Mangalia' =>'Mangalia', 
        'Pitesti' =>'Pitesti', 
        'Resita' =>'Resita', 
        'Targu Mures' =>'Targu Mures', 
        'Timisoara' =>'Timisoara', 
        'Edirne' =>'Edirne', 
        'Istanbul' =>'Istanbul', 
        'Tekirdag' =>'Tekirdag', 
        'Babruysk' =>'Babruysk', 
        'Baranovichi' =>'Baranovichi', 
        'Brest' =>'Brest', 
        'Gomel' =>'Gomel', 
        'Minsk' =>'Minsk', 
        'Mogilev' =>'Mogilev', 
        'Mozir' =>'Mozir', 
        'Mstislavl' =>'Mstislavl', 
        'Orsha' =>'Orsha', 
        'Mozir' =>'Mozir', 
        'Pińsk' =>'Pińsk', 
        'Słuck' =>'Słuck', 
        'Vitebsk' =>'Vitebsk', 
        'Alakurtti' =>'Alakurtti', 
        'Arkhangelsk' =>'Arkhangelsk', 
        'Bado' =>'Bado', 
        'Borisoglebsk' =>'Borisoglebsk', 
        'Bryansk' =>'Bryansk', 
        'Chernykh' =>'Chernykh', 
        'Chisinau' =>'Chisinau', 
        'Engels' =>'Engels', 
        'Europabr' =>'Europabr', 
        'Evie' =>'Evie', 
        'Gelve' =>'Gelve', 
        'Genova' =>'Genova', 
        'Gusev' =>'Gusev', 
        'Kaluga' =>'Kaluga', 
        'Kemi' =>'Kemi', 
        'Kholm' =>'Kholm', 
        'Kirov' =>'Kirov', 
        'Klin' =>'Klin', 
        'Kolomna' =>'Kolomna', 
        'Kotlas' =>'Kotlas', 
        'Kovrov' =>'Kovrov', 
        'Krasnobog' =>'Krasnobog', 
        'Kursk' =>'Kursk', 
        'Luki' =>'Luki', 
        'Mirni' =>'Mirni', 
        'Moroz' =>'Moroz', 
        'Moscow' =>'Moscow', 
        'Muravlenko' =>'Muravlenko', 
        'Nahodka' =>'Nahodka', 
        'Nawaj Ladoga' =>'Nawaj Ladoga', 
        'Nevel' =>'Nevel', 
        'Nikiel' =>'Nikiel', 
        'Novgrod' =>'Novgrod', 
        'Novomesto' =>'Novomesto', 
        'Nowajgorod' =>'Nowajgorod', 
        'Obninsk' =>'Obninsk', 
        'Orel' =>'Orel', 
        'Ornskoldsvik' =>'Ornskoldsvik', 
        'Ostashkov' =>'Ostashkov', 
        'Pestovo' =>'Pestovo', 
        'Pleseck' =>'Pleseck', 
        'Porkhov' =>'Porkhov', 
        'Reydar' =>'Reydar', 
        'Rgev' =>'Rgev', 
        'Roslavl' =>'Roslavl', 
        'Salehard' =>'Salehard', 
        'Saratov' =>'Saratov', 
        'Seydis' =>'Seydis', 
        'Shlisselburg' =>'Shlisselburg', 
        'Smolensk' =>'Smolensk', 
        'Sthelier' =>'Sthelier', 
        'Surgut' =>'Surgut', 
        'Tambov' =>'Tambov', 
        'Tobolsk' =>'Tobolsk', 
        'Tosno' =>'Tosno', 
        'Trinity' =>'Trinity', 
        'Tula' =>'Tula', 
        'Tver' =>'Tver', 
        'Valday' =>'Valday', 
        'Velig' =>'Velig', 
        'Volgograd' =>'Volgograd', 
        'Volochyok' =>'Volochyok', 
        'Vologda' =>'Vologda', 
        'Volzhskiy' =>'Volzhskiy', 
        'Voronezh' =>'Voronezh', 
        'Vuktil' =>'Vuktil', 
        'Vyazma' =>'Vyazma', 
        'Yukhnov' =>'Yukhnov', 
        'Zelenogradsk' =>'Zelenogradsk', 
        );
        return view('rozpiski.edit')->with(compact(['rozpiska', 'miasta']));
    }
    public function reject($rozpiska)
    {
        $roz = Rozpiski::where('id', $rozpiska)->first();
        $roz->status = "3";
        $roz->save();

        return redirect()->route('rozpiski.admin');
    }
    public function accept($rozpiska)
    {
        $roz = Rozpiski::where('id', $rozpiska)->first();
        
        $roz->status = "2";

        $kmpuste = $roz->kmpuste;
        $kmztowarem = $roz->kmztowarem;
        $koszty = $roz->koszty;
        $paliwo = $roz->paliwo;
        $kierowca = $roz->kierowca;
        $kilometry = $kmpuste + $kmztowarem;

        $kiero = User::where('name', $kierowca)->first();
        $kiero->kilometry += $kilometry;
        $kiero->paliwo += $paliwo;

        $tir = Cars::where('kierowca', $kierowca)->first();
        $tir->przebieg += $kilometry;

        $naczepa = Trailers::where('kierowca', $kierowca)->first();
        $naczepa->przebieg += $kilometry;

        $firma = Firms::first();
        $stawkapusta = $firma->stawkapusta;
        $stawkaladunek = $firma->stawkaladunek;
        $stawkafirma = $firma->stawkafirma;

        $kasapuste = $kmpuste * $stawkapusta;
        $kasaladunek = $kmztowarem * $stawkaladunek;
        $kasakoniec = $kasapuste + $kasaladunek + $koszty;

        $kiero->konto += $kasakoniec;

        $fkasa = $kmztowarem * $stawkafirma;
        $fkasakoniec = $fkasa - $kasakoniec;

        $firma->konto += $fkasakoniec;
        $firma->save();

        


        $naczepa->save();
        $tir->save();
        $kiero->save();
        $roz->save();

        return redirect()->route('rozpiski.admin');
    }
    public function edytuj ()
    {
        $allroz = Rozpiski::where('status', '0')->orderBy('kierowca', 'DESC')->get();
        return view('rozpiski.edytuj', compact('allroz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rozpiski $rozpiska)
    {
        $rozpiska->update($request->all());
        return redirect()->route('rozpiski.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
