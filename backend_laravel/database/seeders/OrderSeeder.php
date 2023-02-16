<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
}
/*
    function createPersonSko($person_id, $sko_id){
        PersonSko::create([
            'person_id' => $person_id,
            'sko_id' => $sko_id
        ]);
    }
    public function run()
    {  
	    $this->createPersonSko(1,1);
	    $this->createPersonSko(1,3);
	    $this->createPersonSko(2,2);
    }
    public function run()
    {

        $skonavne = [
            'Air forces',
            'Ballet shoe.',
            'Bast shoe.',
            'Blucher shoe.',
            'Boat shoe.',
            'Brogan (shoes)',
            'Brogue shoe.',
            'Brothel creeper.'
        ];  
        $skofarve = [
            'Rød',
            'Grøn',
            'Blå',
            'Sort',
            'Hvid',
            'Lilla',
            'Brun',
            'Grå'
        ];  
        for ($i=0; $i < count($skonavne); $i++) { 
	    	Sko::create([
                'beskrivelse' => $skonavne[$i],
                'storrelse' => fake()->numberBetween(34, 52),
                'farve' => $skofarve[$i],
                'pris' => fake()->numberBetween(500, 2000),
                'antal' => fake()->numberBetween(0, 30),
	        ]);
    	}
    }
*/