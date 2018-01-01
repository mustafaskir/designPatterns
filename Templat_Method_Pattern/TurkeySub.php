<?php 

require_once './Templat_Method_Pattern/sub.php';

class TurkeySub extends Sub
{
    public function addPrimaryToppings()
    {
        var_dump('Add Turkey');
        return $this;
    }

}

