<?php


Flight::route('GET /cources',function(){
    FLight::json(Flight::cource_service()->get_all());
});

Flight::route('GET /cources/@id',function($id){
    FLight::json(Flight::cource_service()->get_by_id($id));
});

Flight::route('DELETE /cources/@id',function($id){
    FLight::json(Flight::cource_service()->delete($id));
});

Flight::route('POST /cources',function(){
    $data = Flight::request()->data->getData();
    FLight::json(Flight::cource_service()->add($data));
});

