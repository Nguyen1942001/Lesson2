<?php 
class Staff
{
	protected $id;
	protected $fullname;
	protected $email;
	protected $password;
	protected $role_id;
	
	function __construct($id, $fullname, $email, $password, $role_id){
		$this->id = $id;
        $this->fullname = $fullname;
		$this->email = $email;
		$this->password = $password;
		$this->role_id = $role_id;
	}

	function getId(){
		return $this->id;
	}

	function getFullName(){
		return $this->fullname;
	}

    function getEmail() {
		return $this->email;
	}

	function getPassword() {
		return $this->password;
	}

	
	function getRoleId() {
		return $this->role_id;
	}

	function setFullName($fullname){
		$this->fullname = $fullname;
		return $this;
	}

    function setEmail($email) {
		$this->email = $email;
		return $this;
	}

	function setPassword($password) {
		$this->password = $password;
		return $this;
	}

	function setRoleId($role_id) {
		$this->role_id = $role_id;
		return $this;
	}

	function getRole() {
		$roleRepository = new RoleRepository();
		$role = $roleRepository->find($this->role_id);
		return $role;
	}
}