<?php
/**
 * we have to classes that do same process
 * but there is difference between two of how they working
 * for example
 * we have 2 charge [1=> use wire, 2=> use wifiCharger]
 * the 2 classe are do the same process but with different ways
 *  
 * *****How it work******
 * 
 * main interface that do basic process
 * first class who inherit from interface and have methods [connect, disconnect]
 * second class who have different methods [clickConnect, Disabled]
 * the solution here to make an instance that can accept the two classes with same abstract methods
 * is to make a new class implement from base interface and 
 * then pass the second class to it as a Variable
 * and update two methods from  interface with two methods from second class
 * 
 */
interface ChargerInterface
{
    public function connect();
    public function disconnect();
}
class Charger implements ChargerInterface
{
    public function connect(){
        var_dump('charge now is 40 %');
    }

    public function disconnect(){
        var_dump('phone not completely charge');
    }

}

class WifiChargerAdapter implements chargerInterface
{
    protected $wificharger;
    public function __construct(WifiCharger $wifi)
    {
        $this->wificharger = $wifi;
    }

    public function connect(){
        $this->wificharger->clickConnect();
    }

    public function disconnect(){
        $this->wificharger->disabled();
    }
}

class WifiCharger
{
    public function clickConnect()
    {
        var_dump('Wifi Charger is Working 50 % ...');
    }
    public function disabled(){
        var_dump('Wifi Charger is stopped Working  ...');
    }
}


class Trycharge
{
    public function charge(ChargerInterface $charger){
        $charger->connect();
        $charger->disconnect();
    }
}

(new TryCharge())->charge(new WifiChargerAdapter(new WifiCharger));

(new TryCharge())->charge(new Charger());

