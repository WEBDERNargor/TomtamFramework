<?php
require(__DIR__."/../vendor/autoload.php");
require(__DIR__."/../core/config.php");
require(__DIR__."/../core/tom.php");
require(__DIR__."/../core/db.php");
require(__DIR__."/../core/function.php");
$db = new db ($config->mysql->host,$config->mysql->user, $config->mysql->pass,$config->mysql->dbname,$config->mysql->port,$config->mysql->charset);
$res=$db->sql("SELECT * FROM `post`");
$fetch=$res->fetchAll(PDO::FETCH_ASSOC);
foreach($fetch as $key=>$row){
$file_name = basename(parse_url($row['p_image'], PHP_URL_PATH));
$res2=$db->sql("UPDATE `post` SET `p_image`=? WHERE `p_id`=?",[SSL."/uploads/".$file_name,$row['p_id']]);
if($res2){
    echo "<p><b style='color:green;'>Update ".$row['p_id']."-".$file_name." Success</b></p>";
}else{
    echo "<p><b style='color:red;'>Update ".$row['p_id']."-".$file_name." ERROR</b></p>";
}

$arr=json_decode($row['p_detail'],true);
foreach($arr['blocks'] as $kim=>$rim){
    if($rim['type']=='image'){
        
$file_name2 = basename(parse_url($rim['data']['file']['url'], PHP_URL_PATH));
$arr['blocks'][$kim]['data']['file']['url']=SSL."/uploads/".$file_name2;
$json=json_encode( $arr, JSON_UNESCAPED_UNICODE );
$res3=$db->sql("UPDATE `post` SET `p_detail`=? WHERE `p_id`=?",[$json,$row['p_id']]);
if($res3){
    echo "<p><b style='color:green;'>Update detail ".$row['p_id']."-".$file_name2." Success</b></p>";
}else{
    echo "<p><b style='color:red;'>Update detail ".$row['p_id']."-".$file_name2." ERROR</b></p>";
}
    }
}
}
?>