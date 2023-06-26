<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
Flight::route('GET /final/connection-check', function(){
    new MidtermDao;
    
});

Flight::route('GET /final/login', function(){
    /** TODO
    * This endpoint is used to login user to system
    * you can use email: demo.user@gmail.com and password: 123 to login
    * Output should be array containing success message and JWT for this user
    * Sample output is given in figure 7
    * This endpoint should return output in JSON format
    */
    $login = Flight::request()->data->getData();
    $user = Flight::users_service()->getUserByEmail($login['email']);
    if (isset($user['UsersID'])){
      if($user['Password'] == ($login['password'])){
        unset($user['Password']);
        $jwt = JWT::encode($user,"secret", 'HS256');
        Flight::json(['token' => $jwt, 'message'=>"login good"]);
      } else {
        Flight::json(["message" => "Wrong credentials"], 404);
      }
    } else {
      Flight::json(["message" => "User doesn't exist"], 404);
    }
});

Flight::route('POST /final/investor', function(){
    /** TODO
    * This endpoint is used to add new record to investors and cap-table database tables.
    * Investor contains: first_name, last_name, email and company
    * Cap table fields are share_class_id, share_class_category_id, investor_id and diluted_shares
    * RULE 1: Sum of diluted shares of all investors within given class cannot be higher than authorized assets field
    * for share class given in share_classes table
    * Example: If share_class_id = 1, sum of diluted_shares = 310 and authorized_assets for this share_class = 500
    * It means that investor added to cap table with share_class_id = 1 cannot have more than 190 diluted_shares
    * RULE 2: Email address has to be unique, meaning that two investors cannot have same email address
    * If added successfully output should be the message that investor has been created successfully
    * If error detected appropriate error message should be given as output
    * This endpoint should return output in JSON format
    * Sample output is given in figure 2 (message should be updated according to the result)
    */
    $data = Flight::request()->data->getData();
    Flight::json(Flight::users_service()->investors($data));
});


Flight::route('GET /final/share_classes', function(){
    /** TODO
    * This endpoint is used to list all share classes from share_classes table
    * This endpoint should return output in JSON format
    */
    Flight::json(Flight::finalService()->share_classes());

});

Flight::route('GET /final/share_class_categories', function(){
    /** TODO
    * This endpoint is used to list all share class categories from share_class_categories table
    * This endpoint should return output in JSON format
    */
    Flight::json(Flight::finalService()->share_class_categories());

});
?>
