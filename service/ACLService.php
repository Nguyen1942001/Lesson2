<?php 
class ACLService {
	protected $message;

	const VIEW_USER = 'view_user';
	const ADD_USER = 'add_user';
	const EDIT_USER = 'edit_user';
	const DELETE_USER = 'delete_user';

	
	function hasPermission(Staff $staff, $c, $a) {
		$paramToAclActionService = new ParamToAclActionService();
		$execActionName = $paramToAclActionService->getActionName($c, $a);

		// Không có quyền
		if (empty($execActionName)) {
			return true;
		}
		$actionNames = $this->getActionNames($staff);

		if (!in_array($execActionName, $actionNames)) {
			$actionRepository = new ActionRepository();
			$action = $actionRepository->findByName($execActionName);
			$actionDescription = lcfirst($action->getDescription());
			$this->message = "Error: Bạn không có quyền $actionDescription";
			return false;
		}
		return true;
		
	}

	// Trả về danh sách tên action của nhân viên
	function getActionNames(Staff $staff) {
		$staffRepository = new StaffRepository();
		$actionNames = $staffRepository->getActionNames($staff);
		return $actionNames;
	}

	function getMessage() {
		return $this->message;
	}
}

?>
