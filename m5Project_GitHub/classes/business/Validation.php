<?php
namespace classes\business;

use classes\entity\User;
use classes\data\UserManagerDB;

class Validation
{
    public function check_name($input, &$error)
    {
        if (!preg_match("/^[a-zA-Z ]*$/",$input))
        {
            $error = "Only letters and white space allowed";
            return false;
        }elseif (!preg_match("/^[a-zA-Z ]{1,}$/",$input))
        {
            $error = "Please fill in your name";
            return false;
        }
        return true;
    }
    
    public function check_password($input, &$error)
    {
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d\W]{6,}$/",$input))
        {
            $error = "Password must consist of at least 6 characters with at least one uppercase letter, one lowercase letter and one digit.";
            return false;
        }
        return true;
    }
    
    public function check_cpassword($input, &$input2, &$error)
    {
        if ($input != $input2)
        {
            $error = "Password doesn't match, try again?";
            return false;
        }
        return true;
    }
    
    public function check_email($input, &$error)
    {
        if (!preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,})$/i",$input))
        {
            $error = "Please fill in valid email";
            return false;
        }
        return true;
    }
    
    public function check_comments($input, &$error)
    {
        if (!preg_match("/^[a-zA-Z \d\W]{1,}$/",$input))
        {
            $error = "Please fill in comments";
            return false;
        }
        return true;
    }
    
}
?>