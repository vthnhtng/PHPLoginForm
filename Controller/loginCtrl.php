<?php
session_start();
require_once('../Model/loginModel.php');
class loginCtrl
{
    private $loginModel;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }

    public function loginProcess()
    {
        $result = $this->loginModel->getLogin();

        if (str_contains($result, 'error')) {
            header("Location: ../login.php?error='$result'");
            exit();
        } else {
            header ("Location: ../home.php");
            exit();   
        }
    }
}

$login = new loginCtrl();

$login->loginProcess();
