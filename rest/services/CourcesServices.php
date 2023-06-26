<?php
class CourcesServices extends Services
{

    public function __construct()
    {
        parent::__construct(Flight::cource_dao());
    }
    
}
