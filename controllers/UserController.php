<?php
include ROOT.'/models/User.php';

class UserController{

	public function actionRegister(){
		$user = new User();
if (isset ($_POST["sign_up"])){
		$data = $_POST;
		$error = false;
		if(trim($data["name"]) == ''){?>  	
			<script type="text/javascript"> alert("Введите имя");</script>
<?php
			$error = true;
		}

		if( (trim($data["email"]) == '') && !preg_match("/@/", $data["email"])){?>
			<script type="text/javascript"> alert("Введите ваш Email");</script>
<?php
			$error = true;
		}	
		if($data["password"] == ''){?>
			<script type="text/javascript"> alert("Введите ваш пароль");</script>
<?php
			$error = true;
		}
		if($data["password"]!=$data["password_2"]){?>
			<script type="text/javascript"> alert("Повторный пароль введен не верно");</script>
<?php	
			$error = true;
		}
		if ($user->CheckName($data["name"]) == false){?>
			<script type="text/javascript"> alert("Пользователь с таким именем уже существует");</script>
<?php	
			$error = true;
		}
		if ($user->CheckEmail($data["email"]) == false){?>
			<script type="text/javascript"> alert("Пользователь с таким email уже существует");</script>
<?php	
			$error = true;
		}			
		if($error == false)
		{
			$user->SignUp($data["name"], $data["email"], $data["password"]);?>
			<script type="text/javascript"> alert("Вы успешно зарегистрировались");</script>
<?php
		}
	} 

		require ROOT.'/views/user/register.php';
		return true;
	}

	public function actionLogin(){
		$user = new User();
		$data["email"] = "";
		if(isset($_POST["sign_in"])){
				$data = $_POST;
				$loginUser = $user->LoginCheckEmail($data["email"]);
				if($loginUser == true){
					if($user->LoginCheckPassword($data["password"],$loginUser) == true){
						//$_SESSION["logged_user"] = $loginUser->name; 
						$user->Auth($loginUser->id);?>
						<script type="text/javascript">
							alert("Вы успешно авторизировались");
							location.replace("http://online-store/cabinet"); 
						</script>
			<?php
					}
					else{?>
						<script type="text/javascript"> alert("Неправильно введен пароль");</script>
			<?php
					}
				}
				else{?>
					<script type="text/javascript">alert("Пользователь с таким email адресом не найден");</script>
			<?php
				}
		}

		require ROOT.'/views/user/login.php';
		return true;
	} 
	public function actionLogout(){
		$user = new User();
		$user->Logout();
	}
}
?>