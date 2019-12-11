<?php

namespace App\Models;

class Paypal
{
    private $id, $secret;

    public function __construct($id,$secret)
    {
        $this->id = $id;
        $this->secret = $secret;
    }

    public function doSomething()
    {
        return 'Lo que se es una prubea del service Container';
    }

}
