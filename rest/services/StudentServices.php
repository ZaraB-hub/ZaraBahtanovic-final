<?php
require_once 'Services.php';
class StudentServices extends Services
{
    public function __construct()
    {
        parent::__construct(Flight::student_dao());
    }
    
}
