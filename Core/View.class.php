<?php
namespace App\Core;

class View
{
    private $view;
    private $template;
    private $data = [];

    public function __construct($view, $template)
    {
        $this->setView($view);
        $this->setTemplate($template);
    }

    public function setView($view):void
    {

        $this->view = strtolower($view);
    }
    public function setTemplate($template):void
    {
        $this->template = strtolower($template);
    }

    public function assign($key, $value):void
    {
        $this->data[$key]=$value;
    }

    public function includePartial($partial, $config): void
    {
        if(!file_exists("View/Partial/".$partial.".partial.php")){
            die("Le partial ".$partial." n'existe pas");
        }
        include "View/Partial/".$partial.".partial.php";
    }

    public function __toString():string
    {
        return "La vue c'est : ".$this->view. " et le template c'est : ".$this->template;
    }

    public function __destruct()
    {
        echo"oui";

        extract($this->data);
        include "View/".$this->template.".tpl.php";
    }


}