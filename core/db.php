<?php
class db{
    public $conn;
 
function __construct($host,$user,$pass,$dbname,$port,$charset){
    try{
    $this->conn=new PDO("mysql:".$host.":".$port."=;dbname=".$dbname.";charset=".$charset,$user,$pass);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Connection failed : ".$e;
    }

}

function sql($sql,$data=[]){
    $res=$this->conn->prepare($sql);
    $res->execute($data);
    return $res;
}

function all($sql,$data=[],$type=NULL){
    $res=$this->conn->prepare($sql);
    $res->execute($data);
    $fetch=$res->fetchAll($type);
    return $fetch;
}

function row($sql,$data=[],$type=NULL){
    $res=$this->conn->prepare($sql);
    $res->execute($data);
    $row=$res->fetch($type);
    return $row;
}
}
?>