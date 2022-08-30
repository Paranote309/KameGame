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

class AccountController
{

    private $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function Login() {
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');


        if (isset($username, $password)) {

            $_SESSION['user'] = $this->database->getOne(
                tablename: "User",
                column: "username",
                value: $username
            );
            if($_SESSION['user'] != false ){

                if (password_verify($password,  $_SESSION['user']->getPassword())) {
                    header("location:/?action=home");

                }
                else{
                    echo "<script>
                    alert(' Incorrect password'); 
               </script>";
                }

            }
            else{
                echo "<script>
                    alert('Incorrect username'); 
               </script>";
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
        $is_seller = filter_input(INPUT_POST,'is_seller');

        if(isset($username,$password,$email,$age,$location,$is_seller)){
            $new_user = array(
                "username" => $_POST['username'],
                "password" => password_hash($_POST['password'],PASSWORD_DEFAULT),
                "email" => $_POST['email'],
                "age" => $_POST['age'],
                "location" => $_POST['location'],
                "is_seller" => $_POST['is_seller']
            );
            $user = $this->database->addOne(
                tablename: "User",
                values: $new_user
            );

        }

        require '../src/View/register.php';

    }

    public function Logout(){
        session_destroy(); /* Destroy started session */

        header("location:/?action=home");  /* Redirect to home page */
        exit;

    }
}