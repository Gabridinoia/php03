<?php

abstract class Automobile
{
    public $marchio;
    public $modello;
    public $numporte;
    public $prezzo;



    //* Public -> un attributo public può essere visto e MODIFICATO in qualsiasi parte del programma
    //* Private -> un attributo private può essere visto e modificato SOLO all'interno della classe stessa, NEMMENO AI FIGLI
    //* Protected -> un attributo protected può essere visto e modificato SOLO all'interno della classe stessa E ai suoi figli


    public function __construct($_marchio, $_modello, $_numporte, $_prezzo)
    {
        $this->marchio = $_marchio;
        $this->modello = $_modello;
        $this->numporte = $_numporte;
        $this->prezzo = $_prezzo;
    }

    abstract public function caratteristica();
}

//? CONCETTO di Eredità -> Posso creare una Sottoclasse, che eredità tutti gli attributi e metodi del Padre, ma che si specializza in qualcosa
//? Eredità singola -> una sottoclasse può avere UN SOLO PADRE
//? Eredità multipla -> una sottoclasse può avere più di un padre

class Suv extends Automobile
{
    private $codiceseriale = '12345678';
    public $grandezza;

    use Cambia;

    public function __construct($_marchio, $_modello, $_numporte, $_prezzo, $_grandezza)
    {

        parent::__construct($_marchio, $_modello, $_numporte, $_prezzo);
        $this->grandezza = $_grandezza;
    }

    public function caratteristica()
    {
        echo "Suv con la marca di $this->marchio con il modello di $this->modello con $this->numporte porte con il prezzo di $this->prezzo e  con la grandezza di  $this->grandezza";
    }
}

$suv1 = new Suv('Bmw', 'X5', 5, 45000, 400);
$suv1->caratteristica();

class Utilitaria extends Automobile
{
    private $codiceseriale = '87654321';
    public $luci;

    use Cambia;

    public function __construct($_marchio, $_modello, $_numporte, $_prezzo, $_luci)
    {

        parent::__construct($_marchio, $_modello, $_numporte, $_prezzo);
        $this->luci = $_luci;
    }

    public function caratteristica()
    {
        echo "\nUtilitaria con la marca di $this->marchio con il modello di $this->modello con $this->numporte porte con il prezzo di $this->prezzo e  con le luci di  $this->luci";
    }
}

$utilitaria1 = new Utilitaria('Bmw', 'c479', 4, 35000, 'xeno');
$utilitaria1->caratteristica();

class Sportiva extends Automobile
{
    private $codiceseriale = '9089786756';
    public $cavalli;

    use Cambia;

    public function __construct($_marchio, $_modello, $_numporte, $_prezzo, $_cavalli)
    {

        parent::__construct($_marchio, $_modello, $_numporte, $_prezzo);
        $this->cavalli = $_cavalli;
    }

    public function caratteristica()
    {
        echo "\nSportiva con la marca di $this->marchio con il modello di $this->modello con $this->numporte porte con il prezzo di $this->prezzo e  con la grandezza di  $this->cavalli";
    }
}

$sportiva1 = new Sportiva('Bmw', 'm2', 3, 75000, 650);
$sportiva1->caratteristica();


class Moto
{
    public $modello;

    use Cambia;

    public function __construct($_modello)
    {
        $this->modello = $_modello;
    }
}

$moto1 = new Moto('Ducati');
$moto1->cambiare('olio');
$suv1->cambiare('ruote');
$utilitaria1->cambiare('luci');
$sportiva1->cambiare('freni');

trait Cambia
{
    public function cambiare($cosa)
    {
        echo "\nCambiare o riparare $cosa";
    }
}
