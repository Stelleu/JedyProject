<?php
namespace App\Controller;
use App\Core;

class Admin
{
    public function showAll()
    {
        $firstname = "Yves";
        $lastname = "SKRZYPCZYK";

        $view = new Core\View("dashboard", "back");
        $view->assign("firstname", $firstname);
        $view->assign("lastname", $lastname);

    }
    public function addUser()
    {
        $firstname = "Yves";
        $lastname = "SKRZYPCZYK";

        $view = new Core\View("dashboard", "back");
        $view->assign("firstname", $firstname);
        $view->assign("lastname", $lastname);

    }
}