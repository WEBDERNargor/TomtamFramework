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

function get_IP_address()
{
    foreach (array('HTTP_CLIENT_IP',
                   'HTTP_X_FORWARDED_FOR',
                   'HTTP_X_FORWARDED',
                   'HTTP_X_CLUSTER_CLIENT_IP',
                   'HTTP_FORWARDED_FOR',
                   'HTTP_FORWARDED',
                   'REMOTE_ADDR') as $key){
        if (array_key_exists($key, $_SERVER) === true){
            foreach (explode(',', $_SERVER[$key]) as $IPaddress){
                $IPaddress = trim($IPaddress); // Just to be safe

                if (filter_var($IPaddress,
                               FILTER_VALIDATE_IP,
                               FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)
                    !== false) {

                    return $IPaddress;
                }
            }
        }
    }
}


function setSecureCookiePHP($name, $value, $days) {
  $expire = time() + ($days * 24 * 60 * 60);
  setcookie($name, $value, $expire, "/", "", true, true);
}

function getSecureCookiePHP($name) {
  return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
}


function deleteSecureCookiePHP($name) {
  setcookie($name, "", time() - 3600, "/", "", true, true);
}


function assets(){
  return SSL."/assets";
}

function images(){
  return SSL."/images";
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




function config(){
  return $GLOBALS['config'];
}

function VIEW($name,$var=[]){
  echo $GLOBALS['view']->render($name, $var);
}

function mysql(){
  return $GLOBALS['db'];
}
function router(){
  return $GLOBALS['tom']->router;
}

?>