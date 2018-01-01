<?php

/**
 * Design Patterns * Decroator
 * we hava a basic service that can inherit by another service
 * every child have a new cost of service + basic service
 * so we decorate :)
 */

interface CarService
{
    /**
     * notes in interface
     * every method must be public
     * every method must be abstract ,that mean method dosn't has body
     */
    public function getCost();
    public function getDescription();
}

class BasicInsepction implements CarService
{
    public function getCost(){
        return 25;
    }

    public function getDescription(){
        return "Basic Inspection";
    }
}

class OilChange implements CarService
{
    protected $carService;
    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }
    public function getCost()
    {
        return 29 + $this->carService->getCost();
    }
    public function getDescription(){
        return $this->carService->getDescription() . ', And Oil Change';
    }
}

class TireRotation implements CarService
{
    protected $carService;
    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }
    public function getCost()
    {
        return 15 + $this->carService->getCost();
    }
    public function getDescription(){
        return $this->carService->getDescription() . ', And Tire Rotation';
    }
}


$service = new TireRotation(new OilChange(new BasicInsepction()));
echo $service->getCost();
echo '<br />';
echo $service->getDescription();