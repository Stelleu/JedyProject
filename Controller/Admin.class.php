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
        $users = new Users();
        $users = $users->getAll();
        $view = new View("dashboard", "back");
        $view->assign("users",$users);
        $view->assign("user",$user);
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
            $this->showAll();
        }
    }
//    public function updateUser(): void
//    {
//        $user = new Users();
//        $user->selectId($_POST["id"]);
//        if(($_POST["edit"])){
//
//            $user->save();
//        }
//        $user->save();
//        $view = new View("dashboard", "back");
//        $view->assign("user",$user);
//    }

    public function deleteUser(): void
    {
        $user = new Users();
        $user->deleteId($_POST["id"]);
        $users = new Users();
        $users = $users->getAll();
        $view = new View("dashboard", "back");
        $view->assign("users",$users);
        $view->assign("user",$user);
    }
}