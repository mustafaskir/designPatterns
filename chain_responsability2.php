<?php

/**
 * we have a 2 class from serve and client
 * we should check if request and response does without any issues
 * if so, you can go next
 * if else you will get error :(
 */
abstract class Checker{
    protected $checker;
    public abstract function check(Client $client);

    public function next(Client $client){
        if($this->checker){
            $this->checker->check($client);
        }
    }

    public function success(Checker $checker){
        $this->checker = $checker;
    }

}
 class Request extends Checker{
     public function check(Client $client){
         if( ! $client->req ){
             throw new Exception('An Error ,No Requests From Server ... ');
         }
         $this->next($client);
     }
 }
 class Response extends Checker{
    public function check(Client $client){
        if( ! $client->res ){
            throw new Exception('An Error ,No Response  ... ');
        }
        $this->next($client);
    }
 }
 class client{
     public $req = true;
     public $res = false;
 }

 $req = new Request;
 $res = new Response;
 
$req->success($res);
$req->check( new Client );
?>