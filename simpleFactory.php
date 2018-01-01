<?php 

// simple Factory Technique
class GenerateCar
{
    const Audi = 1;
    const Bmw = 2;
    const Merc = 3;

    public static function Gen($type){
        switch($type){
            case self::Audi :
                return new AudiCar();
            case self::Bmw :
                return new BMWCar();
            case self::Merc :
                return new MercCar();        
        }
    }
}

interface Car{
    function speed();
    function color();
}

class BMWCar implements Car
{
    public function speed(){}
    public function color(){}
}
class MercCar implements Car
{
    public function speed(){}
    public function color(){}
}
class AudiCar implements Car
{
    public function speed(){}
    public function color(){}
}


$Bmw = GenerateCar::Gen(GenerateCar::Merc);
var_dump($Bmw);


?>