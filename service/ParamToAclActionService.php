<?php 
class ParamToAclActionService {
	function getActionName($c, $a) {
		$actionName = "";
		
		switch ($c) {
			case 'delete':
				if (in_array($a, ["deleteUser"])) {
					$actionName = ACLService::DELETE_USER;
				}
				break;

			case 'listStaff':
				if (in_array($a, ["listStaff"])) {
					$actionName = ACLService::VIEW_USER;
				}
				break;

			case 'register':
				if (in_array($a, ["showRegister", "register"])) {
					$actionName = ACLService::ADD_USER;
				}
				break;

			case 'update':
				if (in_array($a, ["showDetail", "updateUser"])) {
					$actionName = ACLService::EDIT_USER;
				}
				break;
				
			default:
				break;
		}
		
		return $actionName;
	}
}
?>