<?php 
//error_reporting(0);

$url=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$url_r=$_SERVER['REQUEST_URI'];


define("s_url", 		"https://".$_SERVER['SERVER_NAME']."/"); // Site URL
define("s_name", 		"MenuLarge - Restaurant&Cafe Online Menu"); // Site Name

define("s_url_api", 		"https://apitest.bemolmedya.com/"); // Site API URL
##
##	Phpmyadmin bağlantısı 
##

try {	 
	$db = new PDO(
		 "mysql:host=localhost;dbname=bemolmed_menularge", 
		 "bemolmed_menularge", 
		 "Aart_t4m3"
	);
} catch ( PDOException $e ){
    print $e->getMessage();
}

##
##	Türkçe karakter kodlaması 
##
$db->query("SET CHARACTER SET utf8");




##
##	Zaman 'İstanbul için'  
##
date_default_timezone_set('Etc/GMT-3');
$yil   = date('Y');
$ay    = date('m');
$gun   = date('d');
$saat  = date('H:i');
$date=date("Y-m-d H:i:s");

##
##	Session (Oturum) 
##
session_start();

##
##	Ayar ve tema fonksiyonları 
##
include("functions.php");







?>