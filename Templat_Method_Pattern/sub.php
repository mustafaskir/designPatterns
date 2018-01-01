<?php 


abstract class Sub
{
    public function make()
    {
        return $this
                    ->layBred()
                    ->addLettuce()
                    ->addPrimaryToppings()
                    ->addSauces();
    }

    protected function layBred()
    {
        var_dump('Lay Bred');
        return $this;
    }

    protected function addLettuce()
    {
        var_dump('Lettuce');
        return $this;
    }

    protected function addSauces()
    {
        var_dump('Add Sauces');
        return $this;
    }

    protected abstract function addPrimaryToppings();
}