<?php
define("SSL","http://localhost"); //url ของเว็บ
define("WEB","Nargor"); //ชื่อเว็บ
define("CON","ระบบพร้อมใช้งาน"); //คำอธิบายเว็บสั้นๆ
define("WEB_SECRET","fdfdfdf"); //jwt secret
$config=[
"web_secret"=>WEB_SECRET,
"website"=>WEB,
"base_url"=>SSL,
"auth_page"=>["/profile","/admin"], //ตั้งค่าว่าให้หน้าไหนบ้างต้องทำการล็อคอิน
"mysql"=>[ //ตั้งค่าฐานข้อมูล
    "host"=>"localhost",
    "user"=>"root",
    "pass"=>"",
    "dbname"=>"framwork",
    "port"=>"3306",
    "charset"=>"utf8"
]
];
$config=(object)$config;
$config->mysql=(object)$config->mysql;
?>