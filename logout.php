<?php 
	include("config/configure.php");
	session_start();
	session_unset();
	session_destroy();
	echo "<script type='text/javascript'>window.top.location='".s_url."';</script>";
?>