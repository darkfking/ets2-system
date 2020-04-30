<?php

use Illuminate\Database\Seeder;
use App\Firms;

class FirmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firm = new Firms();
        $firm->regulamin = 'Brak regulaminu';
        $firm->mody = 'Brak wymaganych modów';
        $firm->poradniki = 'Brak poradników';
        $firm->konto = 0;
        $firm->stawkapusta = 0.1;
        $firm->stawkaladunek = 0.5;
        $firm->stawkafirma = 3;
        $firm->save();
    }
}
