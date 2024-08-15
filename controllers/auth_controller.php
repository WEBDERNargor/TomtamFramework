<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$auth_controller=(object)[];




$auth_controller->register_api=function(){
    
    header("Content-type: application/json; charset=utf-8");
    $arr=[];
    if(
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['password']) && !empty($_POST['password']) &&
        isset($_POST['re-pass']) && !empty($_POST['re-pass']) &&
        isset($_POST['fname']) && !empty($_POST['fname']) &&
        isset($_POST['lname']) && !empty($_POST['lname']) 
    ){
    if($_POST['password']==$_POST['re-pass']){
    $res_check_email=mysql()->sql("SELECT * FROM member WHERE m_email=?",[$_POST['email']]);
    if($res_check_email->rowCount()<=0){ 
    $sult=rand(100000,999999);
    $password=password_hash($_POST['password']."@".$sult, PASSWORD_DEFAULT);
    $res=mysql()->sql("INSERT INTO member (
    m_email,
    m_password,
    m_sult,
    m_fname,
    m_lname,
    m_login_by
    )VALUES(
    ?,
    ?,
    ?,
    ?,
    ?,
    ?
    );",
    [
    $_POST['email'],
    $password,
    $sult,
    $_POST['fname'],
    $_POST['lname'],
    "web"
    ]);
    if($res){
        $arr['status']="success";
        $arr['code']="00";
        $arr['msg']="ลงทะเบียนสำเร็จ";
    }else{
        $arr['status']="error";
        $arr['code']="02";
        $arr['msg']="ผิดพลาดที่ query";
    }
}else{
    $arr['status']="error";
    $arr['code']="03";
    $arr['msg']="อีเมล์นี้ถูกใช้ไปแล้ว";
} 
}else{
    $arr['status']="error";
    $arr['code']="04";
    $arr['msg']="รหัสผ่านไม่ตรงกัน";
}
}else{
    $arr['status']="error";
    $arr['code']="05";
    $arr['msg']="รอกข้อมูลไม่ครบถ้วน";
}
echo json_encode($arr, JSON_UNESCAPED_UNICODE);
};


$auth_controller->login_api=function(){
    header("Content-type: application/json; charset=utf-8");
    $arr=[];
    if(
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['password']) && !empty($_POST['password'])
    ){

        $res=mysql()->sql("SELECT * FROM member WHERE m_email=?",[$_POST['email']]);
        if($res->rowCount()>=1){
        $row=$res->fetch(PDO::FETCH_ASSOC);
        if(password_verify($_POST['password']."@".$row['m_sult'], $row['m_password'])){



            $secret_key = WEB_SECRET;
            $issuer_claim = SSL; // this can be the servername
            $audience_claim = SSL;
            $issuedat_claim = time(); // issued at
            $notbefore_claim = $issuedat_claim ; //not before in seconds
            $expire_claim = $issuedat_claim + ((3600*24)*7); // expire time in seconds 7 day
            $playload = array(
                "iss" => $issuer_claim,
                "aud" => $audience_claim,
                "iat" => $issuedat_claim,
                "nbf" => $notbefore_claim,
                "exp" => $expire_claim,
                "data" => array(
                    "id" => $row['m_id'],
                    "ip"=>get_IP_address()
            ));
            $jwt = JWT::encode($playload, $secret_key,'HS256');
            $arr['status']="success";
            $arr['msg']="เข้าสู่ระบบสำเร็จ";
            $arr['code']="00";
            $arr['token']=$jwt;
        }else{
            $arr['status']="error";
            $arr['code']="04";
            $arr['msg']="รหัสผ่านไม่ถูกต้อง";    
        }
    
        }else{
            $arr['status']="error";
            $arr['code']="06";
            $arr['msg']="ไม่พบบัญชีผู้ใช้";    
        }
}else{
    $arr['status']="error";
    $arr['code']="05";
    $arr['msg']="รอกข้อมูลไม่ครบถ้วน";
}
echo json_encode($arr, JSON_UNESCAPED_UNICODE);

};





?>