<?php
class TOM{
    public $router;
    function __construct(){
        $this->router=new \Bramus\Router\Router();
    }
    function send_to($a){
        echo $a;
    }

}

?>