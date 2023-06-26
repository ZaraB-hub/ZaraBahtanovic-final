<?php
require_once 'Dao.class.php';

class StudentDao extends Dao {

    function __construct() {
        parent::__construct("students");

    }


}

