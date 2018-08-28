<?php

class User{

	public function CheckName($name){
		if (R::count("users", "name = ?", array($name))>0)
			return false;
		else
			return true;
	}

	public function CheckEmail($email){
		if (R::count("users", "email = ?", array($email))>0)
			return false;
		else
			return true;
	}

	public function SignUp($name, $email, $password){
		$user = R::dispense("users");
		$user->name = $name;
		$user->email = $email;
		$user->password = password_hash($password, PASSWORD_DEFAULT);
		R::store($user);
	}

	public function LoginCheckEmail($email){
		if (R::findOne("users", "email = ?", array($email)) == true){
			$getUser = R::findOne("users", "email = ?", array($email));
			return $getUser;
		}
		else 
			return false;
	}

	public function LoginCheckPassword($password, $loginUser){
		if (password_verify($password, $loginUser->password) == true)
			return true;
		else 
			return false;
	}

	public function Auth($userId){
		$_SESSION['user'] = $userId;
	}

	public function CheckLogged(){
		if (isset($_SESSION['user']))
			return $_SESSION['user'];
		else
			header("Location: /user/login");
	}

	public function Logout(){
		unset($_SESSION['user']);
		header("Location: /");
	}

	public function Edit($name, $password){
		$password = password_hash($password, PASSWORD_DEFAULT);
		R::exec( 'UPDATE users SET name=?, password=?  WHERE name = ?', array($name, $password, $name) );
	}

	public function CheckRole($id){
		$data = R::getRow('SELECT * FROM users WHERE id='.$id);
		if($data['role']=='admin')
			return $data;
		else 
			return false;
	}
}

?>