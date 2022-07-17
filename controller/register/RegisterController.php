<?php 
class RegisterController extends RegisterAbstract {

    public function showRegister()
    {
        require 'view/register.php';
    }

    public function register()
    {
        $data = [];
        $data["fullname"] = $_POST["fullname"];
        $data["password"] = md5($_POST["password"]);
        $data["email"] = $_POST["email"];
        $data["role_id"] = $_POST["role_id"];

        $staffRepository = new StaffRepository();
        if ($staffRepository->save($data)) {
            $_SESSION["success"] = "Tạo tài khoản user mới thành công";
            header("location: index.php");
            exit;
        }
    }

    // Check email đã tồn tại trong database chưa
    public function notExistingEmail () {
        $email = $_GET["email"];
        $staffRepository = new StaffRepository();
        $staff = $staffRepository->findEmail($email);
        if (!$staff) {
            echo "true";
            return;
        } else {
            echo "false";
            return;
        }
    }
}

?>
