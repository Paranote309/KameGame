<?php
//
//require_once ('src/DBconnect.php'); // This is where the username and password are currently stored (hardcoded in variables)
//
//
///* Check if login form has been submitted */
///* isset — Determine if a variable is declared and is different than NULL*/
///*put this into a function */
//if(isset($_POST['submit']))
//{
//    echo 'Success';
//
//    /* Check if the form's username and password matches */
//    /* these currently check against variable values stored in config.php but later we will see how these can be checked against information in a database*/
//    if( (isset($_POST['username']) && isset($_POST['password'])) )
//    {
//        echo 'Success';
//
//        /* Success: Set session variables and redirect to protected page */
//        $_SESSION['username'] = $username; //store Username to the session
//        $_SESSION['Active'] = true;
//
//        header("location: home.php"); /* 'header() is used to redirect the browser */
//        exit; //we’ve just used header() to redirect to another page but we must terminate all current code so that it doesn’t run when we redirect
//    }
//    else
//        echo 'Incorrect Username or Password';
//}

namespace KameGame;

use http\Header;

class LoginController
{

    private $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function Login() {
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');


        if (isset($username, $password)) {
            $user = $this->database->getOne(
                tablename: "User",
                column: "username",
                value: $username
            );

            if (password_verify($password, $user->password)) {
                header("location:/?action=home");
            }
        }

         require '../src/View/login.php';

    }

    public function Register(){
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $email = filter_input(INPUT_POST, 'email');
        $age = filter_input(INPUT_POST, 'age');
        $location = filter_input(INPUT_POST, 'location');

        if(isset($username,$password,$email,$age,$location)){
            $new_user = array(
                "username" => $_POST['username'],
                "password" => $_POST['password'],
                "email" => $_POST['email'],
                "age" => $_POST['age'],
                "location" => $_POST['location']
            );
            $user = $this->database->addOne(
                tablename: "User",
                values: $new_user
            );

            require '../src/View/sign.php';
        }

    }
}