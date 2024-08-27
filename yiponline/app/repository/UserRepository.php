
<?php

    class UserRepository{

        private static $db;
        private static $user_table = "users";

        public function __construct(){
            UserRepository::$db = new Database;
        }


        public static function save($data){
            UserRepository::$db->query('INSERT INTO '. UserRepository::$user_table .' (username, email, password) VALUES
            (:username, :email, :password)');

            ////// bind values /////
            UserRepository::$db->bind(':username', $data['username']); 
            UserRepository::$db->bind(':email', $data['email']); 
            UserRepository::$db->bind(':password', $data['password']);

            if(UserRepository::$db->execute()){
                return true;
            }else{
                return false;
            }

        }

        /////// Check user by email
        public static function findUserByEmail($email){
            UserRepository::$db->query("SELECT * FROM ". UserRepository::$user_table ." WHERE email = :email");
            UserRepository::$db->bind(':email', $email);

            UserRepository::$db->single();

            //// Check row
            if(UserRepository::$db->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }


    }