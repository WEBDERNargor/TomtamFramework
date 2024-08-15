<?php
$page_controller=(object)[];



$page_controller->home=function() {
    VIEW('user.home',[]);
};

$page_controller->login_page=function() {
    $name="50";
    VIEW('user.login',["name"=>$name]);
};


$page_controller->profile=function() {
   
    VIEW('user.profile',[]);
   
};

$page_controller->logout=function() {
deleteSecureCookiePHP("login_cookie");
if(isset($_SESSION['user_data'])){
unset($_SESSION['user_data']);
}
header("location:".SSL."/login");
   
};



?>