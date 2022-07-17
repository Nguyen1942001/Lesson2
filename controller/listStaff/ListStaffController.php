<?php 
class ListStaffController extends ListStaffAbstract {
    public function listStaff()
    {
        $item_per_page = ITEM_PER_PAGE;
        $page = $_GET["page"] ?? 1;
        $conds = [];

        $staffRepostiory = new StaffRepository();
        $staff = $staffRepostiory->findEmail($_SESSION['email']);

        if ($staff->getRoleId() == 2) {
            $staffs = array();
            $staffs[] = $staff;

            $search = null;

            $totalStaffs = [];
            $totalStaffs[] = $staff;

            $pageNumber = 1;
            
            require 'view/listUser.php';
            exit;
        }

        // Ô search tài khoản (ô tìm kiếm)
        $search = $_GET["search"] ?? null;
        if ($search) {
            $conds = [
                "fullname" => [
                    "type" => "LIKE",
                    "val" => "'%$search%'"
                ],

                "email" => [
                    "type" => "LIKE",
                    "val" => "'%$search%'"
                ]
            ]; // SELECT * FROM staff WHERE name LIKE '%$search%' OR email LIKE '%$search%'
        }

        $staffs = $staffRepostiory->getBy($conds, $page, $item_per_page);

        $totalStaffs = $staffRepostiory->getBy($conds);
        $pageNumber = ceil(count($totalStaffs) / $item_per_page);
        require 'view/listUser.php';
    }
}
?>