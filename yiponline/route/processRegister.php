
<?php


print("hello we are on register page");



include("../../libs/Smarty.class.php");
include("../app/config/config.php");


$smarty = new \Smarty\Smarty;

$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;




$data = [];
$status = false;
$message = '';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    //// process form

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
        $data['email_err'] = 'Please enter email';
    }else{
        if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Email has been taken';
        }
    }

    /////// Validate Password
    if(empty($data['password'])){
        $data['password_err'] = 'Please enter password';
    }elseif(strlen($data['password']) < 6){
        $data['password_err'] = 'Password must be at least 6 characters';
    }

    ///// Validate username ///
    if(empty($data['username'])){
        $data['username_err'] = 'Please enter confirm password';
    }
    


    ///////// Make sure errors are empty
    if(empty($data['email_err']) && empty($data['password_err']) && empty($data['username_err'])){
        ////// Validated

       /// Hash password
       $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

       if($this->userModel->register($data)){
        $status = true;
        $message = "You have been registered successfully";
          ///  flash('register_success', 'You are registered and can log in');
          ///  redirect('users/login');
       }else{
           die('Something went wrong');
       }

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


$smarty->display('../index.tpl');


