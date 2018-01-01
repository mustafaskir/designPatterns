<?php 

require_once './Templat_Method_Pattern/sub.php';

class VeggieSub extends Sub
{
    public function addPrimaryToppings()
    {
        var_dump('Add Veggies');
        return $this;
    }



}

