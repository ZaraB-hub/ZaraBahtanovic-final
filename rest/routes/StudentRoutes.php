<?php

Flight::route('GET /students',function(){
    FLight::json(Flight::student_service()->get_all());
});

Flight::route('GET /students/@id',function($id){
    FLight::json(Flight::student_service()->get_by_id($id));
});

Flight::route('DELETE /students/@id',function($id){
    FLight::json(Flight::student_service()->delete($id));
});

Flight::route('POST /students',function(){
    $data = Flight::request();
    print_r($data);
    die;
    FLight::json(Flight::student_service()->add($data));
});