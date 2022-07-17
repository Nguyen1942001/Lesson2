<?php
class StaffRepository{
	protected function fetchAll($condition = null, $limit = null)
	{
		global $conn;
		$staffs = array();
		$sql = "SELECT * FROM staff";

		if ($condition) 
		{
			$sql .= " WHERE $condition";
		}

		if ($limit) 
		{	
			$sql .= " $limit";
		}

		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			while ($row = $result->fetch_assoc()) 
			{
				$staff = new Staff($row["id"], $row["fullname"], $row["email"], $row["password"], $row["role_id"]);
				$staffs[] = $staff;
			}
		}

		return $staffs;
	}

	function getAll() {
		return $this->getBy();
	}

	function getBy($array_conds = array(), $page = null, $qty_per_page = null) {
		if ($page) {
			$page_index = $page - 1;
		}
		
		$temp = array();
		foreach($array_conds as $column => $cond) {  
			$type = $cond['type'];
			$val = $cond['val'];
			$str = "$column $type ";
			if (in_array($type, array("BETWEEN", "LIKE"))) {
				$str .= "$val"; //name LIKE '%abc%'
			}
			else {
				$str .= "'$val'";
			}
			$temp[] = $str;
		}
		$condition = null;

		if (count($array_conds)) {
			// name LIKE '%abc%' 
			// email LIKE '%abc%' 
			// => name LIKE '%abc%' OR email LIKE '%abc%'
			$condition = implode(" OR ", $temp);
		}


		$limit = null;
		//Trang 3, lấy 10 phần tử
		//LIMIT 20, 10
		if ($qty_per_page) {
			$start = $page_index * $qty_per_page;
			$limit = "LIMIT $start, $qty_per_page";
		}

		return $this->fetchAll($condition, $limit);
	}

	function find($id) {
		global $conn; 
		$condition = "id = $id";
		$staffs = $this->fetchAll($condition);
		$staff = current($staffs);
		return $staff;
	}

	function save($data) {
		global $conn;
		$fullname = $data["fullname"];
		$email = $data["email"];
		$password = $data["password"];
		$role_id = $data["role_id"];

		$sql = "INSERT INTO staff (fullname, email, password, role_id) VALUES ('$fullname', '$email', '$password', $role_id)";
		if ($conn->query($sql) === TRUE) {
			$last_id = $conn->insert_id;//chỉ cho auto increment
		    return $last_id;
		} 
		echo "Error: " . $sql . PHP_EOL . $conn->error;
		return false;
	}

	function update($staff) {
		global $conn;
		$id = $staff->getId();
		$fullname = $staff->getFullName();
		$email = $staff->getEmail();
		$password = $staff->getPassword();
		$role_id = $staff->getRoleId();

		$sql = "UPDATE staff SET fullname = '$fullname', email = '$email', password= '$password', role_id= '$role_id' WHERE id = $id";
			
		if ($conn->query($sql) === TRUE) {
		    return true;
		} 
		$this->error = "Error: " . $sql . PHP_EOL . $conn->error;
		return false;
	}

	function delete($staff) {
		global $conn;
		$id = $staff->getId();
		$sql = "DELETE FROM staff WHERE id = $id";
		if ($conn->query($sql) === TRUE) {
		    return true;
		} 
		$this->error = "Error: " . $sql . PHP_EOL . $conn->error;
		return false;
	}	

	function getActionNames($staff) {
		global $conn;
		$actionNames = [];
		$role_id = $staff->getRoleId();
		$sql = "SELECT action.name FROM role_action JOIN action ON role_action.action_id = action.id WHERE role_action.role_id = $role_id";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			while ($row = $result->fetch_assoc()) 
			{
				$actionNames[] = $row["name"];
			}
		}
		return $actionNames;
	}

	function findEmailAndPassword($email, $password) {
		global $conn; 
		$condition = "email = '$email' AND password = '$password'";
		$staffs = $this->fetchAll($condition);
		$staff = current($staffs);
		return $staff;
	}

	function findEmail($email) {
		global $conn; 
		$condition = "email = '$email'";
		$staffs = $this->fetchAll($condition);
		$staff = current($staffs);
		return $staff;
	}
}