<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    function create($name, $price){
        Item::create([
            'Name' => $name,
            'Price' => $price
        ]);
    }
    public function run()
    {  
        Item::truncate();
        /*
        $this->create('Chicken Tenders',3.50);
        $this->create('Chicken Tenders w/ Fries',4.99);
        $this->create('Chicken Tenders w/ Onion',5.99);
        $this->create('Grilled Cheese Sandwich',2.50);
        $this->create('Grilled Cheese Sandwich w/ Fries',3.99);
        $this->create('Grilled Cheese Sandwich w/ Onion',4.99);
        $this->create('Lettuce and Tomato Burger',1.99);
        $this->create('Soup',2.50);
        $this->create('Onion Rings',2.99);
        $this->create('Fries',1.99);
        $this->create('Sweet Potato Fries',2.49);
        $this->create('Sweet Tea',1.79);
        $this->create('Botttle Water',1.00);
        $this->create('Canned Drinks',1.00);
        */
//https://ribhouse.dk/takeaway-menu/
//TAKEAWAY MENU
//Alle retter er inkl. valgfri sauce og kartoffel.
//ORIGINALE RIB HOUSE SPARERIBS
$this->create('Alm. spareribs',179);
//Serveres med barbecue og coleslaw
$this->create('Stor spareribs',209);
//Serveres med barbecue og coleslaw
//FJERKRÆ OG VEGETAR
$this->create('Rib House Vegetarburger',159);
$this->create('Saftigt og lækkert stegt dansk kyllingebryst',149);
//RIB HOUSE BURGER
$this->create('Rib House Classic burger',159);
//m. bacon og ost, ca. 220 g.
$this->create('Rib House Pulled pork burger',159);
//med coleslaw
$this->create('Rib House Crispy Chicken burger',159);
//med ost
$this->create('Rib House Steak burger',159);
//med bløde løg
//Ekstra tilbehør Kartofler
//$this->create('Bagt kartoffel',l20);
$this->create('Smørstegte kartofler',20);
$this->create('Kartoffelbåde',20);
$this->create('Pommes frites',20);
//Ekstra tilbehør Sauser
$this->create('Bearnaisesauce (lun)',10);
$this->create('Hollandaise',10);
$this->create('Spareribssauce',10);
$this->create('Pebersauce',10);
$this->create('Champignonsauce',10);
//STEAK FRA GRILL
$this->create('Lakse steak',169);
//Ca. 200 g med citron og dampet asparges
$this->create('Medaljoner af svinemørbrad',159);
/*
Ca. 2 x 100 g. med ristede champignoner
Hakkebøf159,-
med bløde løg og rødbeder,
ca. 220 g
Lidt men godt169,-
Ca. 160 g. oksefilet
Tilpas stor239,-
Ca. 250 g, oksefilet
Rib Eye199,-
Ca. 200 g
Rib Eye289,-
Ca. 350 g
T-bone steak395,-
Ca. 600 g
Rib House bedste259,-
2 x ca. 125 g. oksemørbrad
Rib House grillmix319,-
med grillspyd, spareribs og svinemedaljon
Marinerede grillspyd179,-
2 stk.
VALGFRI TIL ALLE HOVEDRETTER
Bagt kartoffel med creme fraiche og purløg
Bagt kartoffel m. smør
Smørstegte kartofler
Kartoffelbåde
Pommes frites
Champignonsauce
Bearnaisesauce (lun)
Hollandaise
Spareribssauce
Pebersauce
TILBEHØR
Hvidløgssmør15,-
Lun flute15,-
Hvidløgsbrød25,-
Stegte løgringe25,-
5 stk.
Ristet bacon29,-
5 stk.
Lun majskolbe29,-
Hotwings35,-
4 stk. kyllingevinger
Ristet bacon, 5 stk29,-
Hvidløgsbrød m. ost30,-
DIP
Ketchup5,-
Chilimayo5,-
Remoulade5,-
Salatmayo5,-
Aioli5,-
Chilisauce5,-
Trøffelmayo5,-
Bernaisemayo5,-
RIB HOUSE SALATBAR
Salatbar 500 ml
*/
    }
}
