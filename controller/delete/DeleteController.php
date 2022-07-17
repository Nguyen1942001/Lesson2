<?php 
class DeleteController extends DeleteAbstract {
    public function deleteUser()
    {
        $staff_id = $_GET['id'];
        $staffRepostiory = new StaffRepository();
        $staff = $staffRepostiory->find($staff_id);

        if ($staff->getRoleId() == 1) {
            $_SESSION["error"] = "Không thể xóa tài khoản Admin";
            header('location: index.php');
            exit;
        }

        if ($staffRepostiory->delete($staff)) {
            $_SESSION["success"] = "Xóa user thành công";
            header('location: index.php');
            exit;
        }
    }
}

?>