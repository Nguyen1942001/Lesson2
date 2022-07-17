<?php 
// Khai báo model
require_once "model/action/Action.php";
require_once "model/action/ActionRepository.php";

require_once "model/role/Role.php";
require_once "model/role/RoleRepository.php";

require_once "model/roleAction/RoleAction.php";
require_once "model/roleAction/RoleActionRepository.php";

require_once "model/staff/Staff.php";
require_once "model/staff/StaffRepository.php";

require_once "service/ACLService.php";
require_once "service/ParamToAclActionService.php";

// Khai báo abstract
require_once "controller/authentication/AuthenticaionAbstract.php";
require_once "controller/delete/DeleteAbstract.php";
require_once "controller/listStaff/ListStaffAbstract.php";
require_once "controller/register/RegisterAbstract.php";
require_once "controller/update/UpdateAbstract.php";

?>