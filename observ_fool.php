<?php 
/**
 * we can use in notfy
 * so if any comment in a post or something like this
 * we can do an action like send an email or notify
 * 
 */


interface Subject{ //publisher
    public function attach($observer);
    public function deattach($observer);
    public function notify();
}

 interface Observer{ //subscriber
    public function handle();
}

// ---------------------------------------------------------
class Login implements Subject{
    protected $observers;
    public function attach($observerable){
        if(is_array($observerable)){
            return $this->attachObserver($observerable);
        }
        $this->observers[] = $observerable;
    }
    private function attachObserver($observerable){
        foreach($observerable as $observer){
            if( ! $observer instanceof Observer )
                throw new Exception("N");
            $this->attach($observer);
        }
        return;
    }
    public function deattach($index){
        unset($this->observers[$index]);
    }
    public function notify(){
        foreach($this->observers as $observer){
            $observer->handle();
        }
    }
    public function fire(){
        $this->notify();
    }
}

class LoginHandler implements Observer{
    public function handle(){
        var_dump('Log some thing important');
    }
}

class EmailNotifier implements Observer{
    public function handle(){
        var_dump('fire off an email');
    }
}

class LoginReporter implements Observer{
    public function handle(){
        var_dump('Do some form of report');
    }
}

// ---------------------------------------------------------
$login = new Login;
$login->attach([
    new LoginHandler,
    new EmailNotifier,
    new LoginReporter
]);

$login->fire();