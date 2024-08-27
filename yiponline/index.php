<?php
/**
 * Example Application
 *

 */

 include("../libs/Smarty.class.php");
 include("../yiponline/app/config/config.php");
 include("./app/libraries/Database.php");
 include("./app/repository/UserRepository.php");


$smarty = new \Smarty\Smarty;

$smarty->debugging = true;
// $smarty->caching = true;
$smarty->cache_lifetime = 120;




$status = false;
$message = "";




if($_SERVER['REQUEST_METHOD'] == "POST"){
    //// process form


   new UserRepository();



    //////// Sanitize the POST
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    ///// init data
    $data = [
        'username' => trim($_POST['username']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_err' => '',
        'password_err' => '',
        'username_err' => ''
    ];

    //// Validate Email
    if(empty($data['email'])){
        $data['email_err'] = 'please enter email';
    }else{
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $data['email_err'] = 'please enter a valid email';
        }else{
            if(UserRepository::findUserByEmail($data['email'])){
                $data['email_err'] = 'email has been registered already';
            }else{
                $data['email_err'] = '';
            }
        }
    }

    /////// Validate Password
    if(empty($data['password'])){
        $data['password_err'] = 'please enter password';
    }else{
        if(strlen($data['password']) < 6){
            $data['password_err'] = 'password must be at least 6 characters';
        }else{
            if (!preg_match('/^(?=.*[\W])(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$/', $data['password'])) {
                $data['password_err'] = 'Use mix of characters (uppercase and lowercase), numbers, and symbols.';
            }else{
                $data['password_err'] = '';
            }
        }
    }
    
    

    // ///// Validate username ///
    if(empty($data['username'])){
        $data['username_err'] = 'please enter username';
    }else{
        if(strlen($data['username']) < 3 || strlen($data['username']) > 20){
            $data['username_err'] = 'username must contain between 3-20 characters';
        }else{
            if (!preg_match('/^(?=.*[a-z])(?=.*[0-9]).{0,}$/', $data['username'])) {
                $data['username_err'] = 'username must contain alphanumeric';
            }else{
                $data['username_err'] = '';
            }
        }
    }

   
    


    ///////// Make sure errors are empty
    if(empty($data['email_err']) && empty($data['password_err']) && empty($data['username_err'])){

       /// Hash password ///
       $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

       if(UserRepository::save($data)){
        $status = true;
        $message = "You have been registered successfully";
        $data = [
            'email' => '',
            'password' => '',
            'username' => '',
            'email_err' => '',
            'password_err' => '',
            'username_err' => ''
        ];
       }
    }else{
        $message = "Validation Error";
    }


}else{
    ///// load form
    $data = [
        'email' => '',
        'password' => '',
        'username' => '',
        'email_err' => '',
        'password_err' => '',
        'username_err' => ''
    ];
}







$smarty->assign("status", $status);
$smarty->assign("message", $message);
$smarty->assign("data", $data);
$smarty->assign("URLROOT", URLROOT);


$smarty->display('index.tpl');
