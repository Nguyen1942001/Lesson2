<?php 
class UpdateController extends UpdateAbstract {
    public function showDetail()
    {
        $staff_id = $_GET['id'];
        $staffRepostiory = new StaffRepository();
        $staff = $staffRepostiory->find($staff_id);
        $loginStaff = $staffRepostiory->findEmail($_SESSION["email"]);

        if ($staff->getRoleId() == 1 && $staff->getId() != $loginStaff->getId()) {
            $_SESSION["error"] = "Không được phép chỉnh sửa tài khoản admin khác";
            header('location: index.php');
            exit;
        }
        require 'view/detail.php';
    }

    public function updateUser()
    {
        $staff_id = $_POST["id"];
        $staffRepository = new StaffRepository();
        $staff = $staffRepository->find($staff_id);

        $staff->setFullName($_POST["fullname"]);

        if (!empty($_POST["old_password"])) {
            if ($staff->getPassword() != md5($_POST["old_password"])) {
                $_SESSION["error"] = "Nhập sai mật khẩu cũ. Vui lòng nhập lại";
                header("location: index.php");
                exit;
            }
            $staff->setPassword(md5($_POST['new_password']));
        }
        $staff->setEmail($_POST["email"]);

        if (!empty($_POST["role_id"])) {
            $staff->setRoleId($_POST["role_id"]);
        }

        if ($staffRepository->update($staff)) {
            $_SESSION["success"] = "Cập nhật thông tin user thành công";
            header("location: index.php");
            exit;
        }
    }
}
?>