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
        print_r($users);
        $view = new View("dashboard", "back");
        $view->assign("user",$user);
        $view->assign("users",$users);



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
    public function updateUser(): void
    {
        $user = new Users();
        $user->setId($_GET["id"]);
        $user->save();
        $view = new View("dashboard", "back");
        $view->assign("user",$user);
    }

    public function deleteUser(): void
    {
        $user = new Users();
        $user->setId($_GET["id"]);
        $user->deleteId($user->getId());
        $view = new View("dashboard", "back");
        $view->assign("user",$user);
    }
}