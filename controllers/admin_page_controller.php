<?php
$admin_page_controller=(object)[];

$admin_page_controller->home=function(){
    VIEW('admin.home',[]);
};

$admin_page_controller->users=function(){
    $fetch=mysql()->all("SELECT * FROM member");
    VIEW('admin.users',["fetch"=>$fetch]);
};