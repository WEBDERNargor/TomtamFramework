<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
function checklogin(){
$currentRoute = $_SERVER['REQUEST_URI'];
$auth=false;
foreach(config()->auth_page as $val){
    if(str_contains($currentRoute, $val)){
        $auth=true;
        break;
    }
}
if(getSecureCookiePHP("login_cookie")==null){
    if($auth===true){
        header("location:".SSL."/login");
        exit();
        }else{
        return [];
        }
   }
   $login_cookie=getSecureCookiePHP("login_cookie");
   try{
    $playload = JWT::decode($login_cookie, new Key(WEB_SECRET, 'HS256'));
    $column="m_id,m_email,m_fname,m_lname,CONCAT(m_fname,' ',m_lname) as m_fullname,m_auth,m_login_by,m_socail_id,m_create_at";
    $res=mysql()->sql("SELECT ".$column." FROM member WHERE m_id=?",[$playload->data->id]);
    if($res->rowCount()>=1){
    $row=$res->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user_data']=$row;
    return $row;
    }else{

        if($auth===true){
            header("location:".SSL."/login");
            exit();
            }else{
            return [];
            }
    }
}catch(Exception $e)
{   //กรณี Token ไม่ถูกต้องจะ return false
    if($auth===true){
    header("location:".SSL."/login");
    exit();
    }else{
    return [];
    }
}  
}
?>