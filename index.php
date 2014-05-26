<?php
if (file_exists('.debug')) {
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
}
if (file_exists('.mt') && '77.93.126.84' != $_SERVER['REMOTE_ADDR']) {
	require_once 'mt.php';
}
else{
	require_once 'application/bootstrap.php';
}
