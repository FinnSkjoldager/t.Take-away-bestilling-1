<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function create($name)
    {
        Customer::create([
            'Name' => $name
        ]);
    }
    public function run()
    {
        Customer::truncate();
        //https://www.stm.dk/statsministeren/statsministre-siden-1848/
        $this->create('Mette Frederiksen, 2019 -   f. 1977 Socialdemokratiet');
        $this->create('Lars Løkke Rasmussen, 2015-2019 f. 1964 Venstre');
        $this->create('Helle Thorning-Schmidt, 2011 - 2015 f. 1966 Socialdemokraterne');
        $this->create('Lars Løkke Rasmussen, 2009-2011 f. 1964 Venstre');
        $this->create('Anders Fogh Rasmussen, 2001-2009 f. 1953 Venstre');
        $this->create('Poul Nyrup Rasmussen, 1993-2001 f. 1943 Socialdemokratiet');
        $this->create('Poul Schlüter, 1982-93 f.1929-2021 Det Konservative Folkeparti');
        $this->create('Anker Jørgensen, 1975-82 f.1922-2016 Socialdemokratiet');
        $this->create('Poul Hartling, 1973-75 f.1914-2000 Venstre');
        $this->create('Anker Jørgensen, 1972-73 f.1922-2016 Socialdemokratiet');
        $this->create('Jens Otto Krag, 1971-72 f.1914-1978 Socialdemokratiet');
        $this->create('Hilmar Baunsgaard, 1968-71 f.1920-1989 Det Radikale Venstre');
        $this->create('Jens Otto Krag, 1962-68 f.1914-1978 Socialdemokratiet');
        $this->create('Viggo Kampmann, 1960-62 f.1910-1976 Socialdemokratiet');
        $this->create('Hans Christian Svane Hansen, 1955-60 f.1906-1960 Socialdemokratiet');
        $this->create('Hans Hedtoft, 1953-55 f.1903-1955 Socialdemokratiet');
    }
}
