<?php
 
 
function storee(  $username1,$password1,$firstname1,$lastname1,$email1,$phone11){
    
    $token = 'c73f6ebf9b58955f64f6f2afa510961a';
$domainname = 'http://alburhan.tech/moodle';
$functionname = 'ys_user_account_creation';
// REST RETURNED VALUES FORMAT
$restformat = 'xml';
    $user1 = new stdClass();
$user1->username = $username1;
$user1->password = $password1;
$user1->firstname = $firstname1;
$user1->lastname = $lastname1;
$user1->email =$email1;  
$user1->auth = 'manual';
 
     $user1->phone1 = $phone11;
 $users = array($user1);
$params = array('users' => $users);
header('Content-Type: text/plain');
$serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
require_once('curl.php');
$curl = new curl;
//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
$resp = $curl->get($serverurl . $restformat, $params);
return $resp;
 
}
function password_update(  $username1,$password1 ){
    
    $token = 'c73f6ebf9b58955f64f6f2afa510961a';
$domainname = 'http://alburhan.tech/moodle';
$functionname = 'ys_user_password_update';
// REST RETURNED VALUES FORMAT
$restformat = 'xml';
    $user1 = new stdClass();
$user1->username = $username1;
$user1->password = $password1;

 
 
 
 
 
 $users = array($user1);
$params = array('users' => $users);
header('Content-Type: text/plain');
$serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
require_once('curl.php');
$curl = new curl;
//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
$resp = $curl->get($serverurl . $restformat, $params);
return $resp;
 
}