<?php

/**
 * Adapter Allows you to translate one interface for use with another 
 */

 interface BookInterface
 {
    public function open();
    public function turnPage();
 }

 interface eReaderInterface
 {
    public function turnOn();
    public function pressNextPage();
 }

 

 class Person
 {
     public function read(BookInterface $book){
         $book->open();
         $book->turnPage();
     }
 }

 class eReaderAdapter implements BookInterface
 {
     private $reader;

     public function __construct(eReaderInterface $reader)
     {
         $this->reader = $reader;
     }

     public function open()
     {
         return $this->reader->turnOn();
     }
     public function turnPage()
     {
        return $this->reader->pressNextPage();
     }
 }

 class Kindle implements eReaderInterface
 {
    public function turnOn()
    {
        var_dump('TurnOn kindle');
    }
    public function pressNextPage()
    {
        var_dump('Press Next Page');
    }
 }

 class Nock implements eReaderInterface
 {
    public function turnOn()
    {
        var_dump('TurnOn Nock');
    }
    public function pressNextPage()
    {
        var_dump('Press Next Page Nock');
    }   
 }
 

class Book implements BookInterface
{
    public function open()
    {
        var_dump('Open');
    }
    public function turnPage()
    {
        var_dump('Turn');
    }
}

(new Person())->read(new Book);

(new Person())->read(new eReaderAdapter(new Nock));