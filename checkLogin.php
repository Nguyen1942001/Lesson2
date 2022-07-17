<?php 
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if (empty($_SESSION["email"])) {
	if (!empty($_COOKIE["token"])) {
		//giải mã
		$key = 'REMEMBER_ME_KEY';
		try {
			$payload = JWT::decode($_COOKIE["token"], new Key($key, 'HS256'));
			$_SESSION["email"] = $payload->email;

		} catch(Exception $e) {
			echo "You try to hack!!!";
			exit;
		}
	}
	else {
		header("location: login.php");
		exit;
	}
}
?>