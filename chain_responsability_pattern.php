<?php 
/**
 * this pattern we can use it to handle requests
 * for example we can use it to check if all is right
 * so if true => go next :)
 * very simple logic
 * 
 */
abstract class HomeChecker
{
    protected $successor;
    public abstract function check(HomeStatus $home);

    public function next(HomeStatus $home){
        if( $this->successor ){
            $this->successor->check($home);
        }
    }

    public function succeedWith(HomeChecker $successor){
        $this->successor = $successor;
    }
}

class Locks extends HomeChecker{
    public function check( HomeStatus $home){
        if( ! $home->locks){
            throw new Exception('Locks');
        }
        $this->next($home);
    }
}

class Lights extends HomeChecker{
    public function check( HomeStatus $home){
        if( ! $home->lights){
            throw new Exception('Lights');
        }
        $this->next($home);
    }
}

class Alarm extends HomeChecker{
    public function check( HomeStatus $home){
        if( ! $home->alarm){
            throw new Exception('Alarm');
        }
        $this->next($home);
    }
}

class HomeStatus{
    public $locks = true;
    public $lights = true;
    public $alarm = true;

}

$locks = new Locks;
$lights = new Lights;
$alarm = new Alarm;

$locks->succeedWith($lights);
$lights->succeedWith($alarm);

$locks->check(new HomeStatus);