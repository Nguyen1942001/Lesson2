<?php 
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthenticationController extends AuthenticaionAbstract {
    public function login() {
        $email = $_POST["email"];
		$password = md5($_POST["password"]);
		$staffRepository = new StaffRepository();
		$staff = $staffRepository->findEmailAndPassword($email, $password);
		
		if (!empty($staff)) {

			// Đã login thành công - Lưu vào session
			$_SESSION["email"] = $email;

			// Lưu thêm trong cookie - nếu tick vào Remember me
			if (!empty($_POST["remember-me"])) {
				$key = 'REMEMBER_ME_KEY';
				$payload = array(
				    "email" => $email
				);
				$token = JWT::encode($payload, $key, 'HS256');
				setcookie("token", $token, time() + 60 * 60 * 6 );
			}

			header("location: index.php");
		}
		else {
			// Login thất bại. Về login.php
			// $_SESSION["error"] = "Nhập sai email hoặc mật khẩu";
			header("location: /");
		}
    }

    public function logout() {
        session_destroy();
		setcookie("token", "", time() - 60);
		header("location: login.php");
    }
}
?>