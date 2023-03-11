<?php
namespace App\Controller;
use App\Core\BaseSQL;
use App\Core\View;
use App\Model\Users;
use App\Core\Validator;

class Admin
{
    public function showAll(): void
    {

        $user = new Users();
        $firstname = "Yves";
        $lastname = "SKRZYPCZYK";
        print_r($_POST);
        if( !empty($_POST)){
            $result = Validator::run($user->getFormRegister(), $_POST);
            print_r($result);
        $user->setEmail($_POST["email"]);
        $user->setName($_POST["name"]);
        $user->setPassword($_POST["password"]);
        $user->save();
        }
        $view = new View("dashboard", "back");
        $view->assign("user",$user);
        $view->assign("firstname", $firstname);
        $view->assign("lastname", $lastname);


    }
    public function addUser(): void
    {
        $user = new Users();
        if(!empty($_POST)){
            $result = Validator::run($user->getFormRegister(), $_POST);
            $user->setEmail($_POST["email"]);
            $user->setName($_POST["name"]);
            $user->setPassword($_POST["password"]);
            $user->save();
        }
        $view = new View("dashboard", "back");
        $view->assign("user",$user);
    }
}