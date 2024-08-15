<?php
$user_manager_controller=(object)[];

$user_manager_controller->single=function() {
    header("Content-type: application/json; charset=utf-8");
    $arr=[];
    $id=null;
    if(isset($_POST['id'])){
        $id=$_POST['id'];
    }
    $row=mysql()->row("SELECT * FROM member WHERE m_id=?",[$id]);
    if(isset($row["m_id"])){
        $arr['status']="success";
        $arr['code']="00";
        $arr['msg']="fetch successfully";
        $arr['data']=$row;
    }else{
     $arr['status']="error";
     $arr['code']="01";
     $arr['msg']="user not found";
    }
echo json_encode($arr, JSON_UNESCAPED_UNICODE);
};



$user_manager_controller->user_edit=function() {
    header("Content-type: application/json; charset=utf-8");
    $arr=[];
    if(isset($_POST['id']) && $_POST['id']!='' && isset($_POST['fname']) && $_POST['fname']!=''){
        $sql="";
        $obj=[$_POST['fname'],$_POST['lname'],$_POST['id']];
        if(isset($_POST['password']) && $_POST['password']!='' && isset($_POST['repass']) && $_POST['repass']!=''){
            if($_POST['password']!=$_POST['repass']){
         
                exit(json_encode([
                    "status"=>"error",
                    "code"=>"04",
                    "msg"=>"รหัสผ่านไม่ตรงกัน"
                ], JSON_UNESCAPED_UNICODE));
            }
        $sult=rand(100000,999999);
        $password=password_hash($_POST['password']."@".$sult, PASSWORD_DEFAULT);
        $sql=",m_password=?,m_sult=?";
        $obj=[$_POST['fname'],$_POST['lname'],$password,$sult,$_POST['id']];
        }
    $res=mysql()->sql("UPDATE member SET m_fname=?,m_lname=?".$sql." WHERE m_id=?;",$obj);
    if($res){
        $arr['status']="success";
        $arr['code']="00";
        $arr['msg']="fetch successfully";
        $arr['update_id']=$_POST['id'];
    }else{
     $arr['status']="error";
     $arr['code']="02";
     $arr['msg']="error in query";
    }
}else{
    $arr['status']="error";
    $arr['code']="05";
    $arr['msg']="รอกข้อมูลไม่ครบถ้วน";
}
echo json_encode($arr, JSON_UNESCAPED_UNICODE);
};







?>