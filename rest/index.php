<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS, PATCH');
require '../vendor/autoload.php';

require_once 'services/StudentServices.php';
require_once 'routes/StudentRoutes.php';
require_once 'dao/StudentDao.class.php';
Flight::register('student_service', "StudentServices");
Flight::register('student_dao',"StudentDao");

require_once 'services/CourcesServices.php';
require_once 'routes/CourcesRoutes.php';
require_once 'dao/CourcesDao.class.php';
Flight::register('cource_service', "CourcesServices");
Flight::register('cource_dao',"CoursesDao");

Flight::route('/',function(){
    echo 'welcome!';
});

Flight::start();
