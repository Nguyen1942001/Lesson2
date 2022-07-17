<?php
class RoleActionRepository {
	protected function fetchAll($condition = null)
	{
		global $conn;
		$roleActions = array();
		$sql = "SELECT * FROM role_action";
		if ($condition) 
		{
			$sql .= " WHERE $condition";
		}

		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			while ($row = $result->fetch_assoc()) 
			{
				$roleAction = new RoleAction($row["role_id"], $row["action_id"]);
				$roleActions[] = $roleAction;
			}
		}

		return $roleActions;
	}

	function getAll() {
		return $this->fetchAll();
	}
}