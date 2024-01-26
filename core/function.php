<?php
function pre_r($a){
echo "<pre>";
print_r($a);
echo "</pre>";
}

function getaud(){
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $url = "https://";   
        }else{  
        $url = "http://";  
     } 
     // Append the host(domain name, ip) to the URL.   
     $url.= $_SERVER['HTTP_HOST'];   
     
     // Append the requested resource location to the URL       
     
     return $url;  
}



function assets(){
  return SSL."/assets";
}

function dateformate($arr=['datetime'=>'','formate'=>'']){
  if($arr['datetime']!=''){
  $date=$arr['datetime'];
  }else{
  $date=date('Y-m-d H:i:s');
  }
  
  if($arr['formate']!=''){
    $formate=$arr['formate'];
  }else{
    $formate='Y-m-d H:i:s';
  }
  return date($formate, strtotime($date));
}

function get_type(){

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => SSL.'/api/type/all',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
));

$response = curl_exec($curl);
$data=json_decode($response,true);
curl_close($curl);
return $data;
}

?>