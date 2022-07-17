<?php
class RoleRepository {
	protected function fetchAll($condition = null)
	{
		global $conn;
		$categories = array();
		$sql = "SELECT * FROM role";
		if ($condition) 
		{
			$sql .= " WHERE $condition";
		}

		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			while ($row = $result->fetch_assoc()) 
			{
				$role = new Role($row["id"], $row["name"]);
				$categories[] = $role;
			}
		}

		return $categories;
	}

	function getAll() {
		return $this->fetchAll();
	}

	function find($id) {
		global $conn; 
		$condition = "id = $id";
		$roles = $this->fetchAll($condition);
		$role = current($roles);
		return $role;
	}

}