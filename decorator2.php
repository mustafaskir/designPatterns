<?php 
/**
 * We have a basic value say product
 * then we go to make new update from basic product
 * for example
 * we have a small sweet = 50
 * then the company make it bigger twice and call it product sweet2 an it equal 50 + 20
 * so if we change the samll sweet value ,then we need to change sweet2 value
 * for this we use decorator
 * because at all base product is comming from base
 * so any change inside base
 * will make other products effects
 */
interface Bitcoin
{
    public function price();
    public function getTotal();
    public function getMoney();
}

class BaseBank implements Bitcoin
{

    public function price()
    {
        return 1050;
    }
    public function getTotal()
    {
        return $this->price() + 50;
    }

    public function getMoney()
    {
        return $this->price() - 50;
    }
}

class CGGBank implements Bitcoin
{
    protected $coin;

    public function __construct(BaseBank $bankCoin)
    {
        $this->coin = $bankCoin;
    }

    public function price()
    {
        return $this->coin->price() + 100;
    }

    public function getTotal()
    {
        return $this->coin->getTotal() + 5000;
    }
    public function getMoney()
    {
        return $this->coin->getMoney() - 1000;
    }
}

echo(new CGGBank(new BaseBank())) ->getTotal();